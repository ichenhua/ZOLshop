<?php namespace Hdphp\Model;

use ArrayAccess;
use ReflectionClass;

class Model implements ArrayAccess
{

    //有字段时验证
    const EXISTS_VALIDATE = 1;

    //值不为空时验证
    const VALUE_VALIDATE = 2;

    //必须验证
    const MUST_VALIDATE = 3;

    //值是空时处理
    const VALUE_NULL = 4;

    //插入时处理
    const MODEL_INSERT = 1;

    //更新时处理
    const MODEL_UPDATE = 2;

    //全部情况下处理
    const MODEL_BOTH = 3;

    //表名
    protected $table;

    //完整表名
    protected $full = false;

    //验证错误
    protected $error;

    //主键
    protected $pk;

    //字段信息
    protected $field = array();

    //数据
    protected $data = array();

    //自动验证
    protected $validate = array();

    //自动完成
    protected $auto = array();

    //时间操作
    protected $timestamps = false;

    //允许插入的字段
    protected $insertFields = array();

    //允许更新的字段
    protected $updateFields = array();

    //驱动
    protected $db;

    public function __construct()
    {
        if (method_exists($this, '__init'))
        {
            $this->__init();
        }
        //设置模型操作表
        $this->table = $this->getTableName();

        //数据驱动
        $this->db = Db::table($this->table, $this->full);

        //缓存字段
        $this->getTableInfo();
    }

    /**
     * 获取表名
     *
     * @return string 表名
     */
    final protected function getTableName()
    {
        if (empty($this->table))
        {
            $reflection = new ReflectionClass($this);
            $model      = $reflection->getShortName();

            //将大写字母前加下划线
            $table = preg_replace('/([A-Z])/', '_\1', $model);

            //转为小写表名
            return substr(strtolower($table), 1);
        }
        else
        {
            return $this->table;
        }
    }

    /**
     * 获取表信息
     */
    protected function getTableInfo()
    {
        $this->field = array_keys($this->db->getTableField($this->table));

        $this->pk = $this->db->getTablePrimaryKey($this->table);
    }

    /**
     * 获取主键名称
     *
     * @return [type] [description]
     */
    public function getPk()
    {
        return $this->pk;
    }

    /**
     * 获取模型错误
     *
     * @return [type] [description]
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * 设置data 记录信息属性
     *
     * @param [type] $data [description]
     */
    public function data($data)
    {
        $this->data = $data;
    }

    /**
     * 根据主键取出一条数据
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function find($id = '')
    {
        if (is_numeric($id))
        {
            $data = $this->db->where($this->getPk(), $id)->first();
            if ($data)
            {
                $this->data = $data;

                return $data;
            }
        }

        return $this->db->first();
    }

    /**
     * 查询结果集
     *
     * @param $ids
     */
    public function all($ids)
    {
        //按主键查找
        $this->db->whereIn($this->getPk(), explode(',', $ids))->get();
    }

    //自动验证字段值唯一
    private function unique($field, $value, $param, $data)
    {
        //主键
        $pk = $this->getPk();
        if (isset($data[$pk]))
        {
            $this->db->where($pk, '<>', $data[$pk]);
        }
        if ( ! $this->db->where($field, $value)->first())
        {
            return true;
        }
    }

    /**
     * 自动验证
     *
     * @return [type] [description]
     */
    private function autoValidate($data, $type)
    {
        //验证库
        $VaAction = new \Hdphp\Validate\VaAction;

        $data = $data ? $data : $_POST;

        if (empty($this->validate))
        {
            return true;
        }

        foreach ($this->validate as $validate)
        {
            //验证条件
            $validate[3] = isset($validate[3]) ? $validate[3] : self::EXISTS_VALIDATE;

            //有这个字段验证
            if ($validate[3] == self::EXISTS_VALIDATE && ! isset($data[$validate[0]]))
            {
                continue;
            }
            else if ($validate[3] == self::VALUE_VALIDATE && empty($data[$validate[0]]))
            {
                //不为空时验证
                continue;
            }
            else if ($validate[3] == self::MUST_VALIDATE)
            {
                //必须验证
            }

            $validate[4] = isset($validate[4]) ? $validate[4] : self::MODEL_BOTH;

            //验证时间判断
            if ($validate[4] != $type && $validate[4] != self::MODEL_BOTH)
            {
                continue;
            }

            //字段名
            $field = $validate[0];

            //验证规则
            $actions = explode('|', $validate[1]);

            //错误信息
            $error = $validate[2];

            //表单值
            $value = isset($data[$field]) ? $data[$field] : '';

            foreach ($actions as $action)
            {
                $info   = explode(':', $action);
                $method = $info[0];
                $params = isset($info[1]) ? $info[1] : '';
                if (method_exists($this, $method))
                {
                    //类方法验证
                    if ($this->$method($field, $value, $params, $data) !== true)
                    {
                        $_SESSION['_validate'] = $this->error = $error;

                        return false;
                    }
                }
                else if (method_exists($VaAction, $method))
                {
                    if ($VaAction->$method($field, $value, $params, $data) !== true)
                    {
                        $_SESSION['_validate'] = $this->error = $error;

                        return false;
                    }
                }
                else if (substr($method, 0, 1) == '/')
                {
                    //正则表达式
                    if ( ! preg_match($method, $value))
                    {
                        $_SESSION['_validate'] = $this->error = $error;

                        return false;
                    }
                }
            }
        }

        return true;
    }


    /**
     * 自动完成处理
     *
     * @param  array $data 数据
     * @param  int   $type 时间
     *
     * @return array
     */
    private function autoOperation($data, $type)
    {
        //不存在自动完成规则
        if (empty($this->auto))
        {
            return $data;
        }

        foreach ($this->auto as $name => $auto)
        {
            //处理类型
            $auto[2] = isset($auto[2]) ? $auto[2] : 'string';

            //验证条件
            $auto[3] = isset($auto[3]) ? $auto[3] : self::EXISTS_VALIDATE;

            //验证时间
            $auto[4] = isset($auto[4]) ? $auto[4] : self::MODEL_BOTH;

            //有这个字段处理
            if ($auto[3] == self::EXISTS_VALIDATE && ! isset($data[$auto[0]]))
            {
                continue;
            }
            else if ($auto[3] == self::VALUE_VALIDATE && empty($data[$auto[0]]))
            {
                //不为空时处理
                continue;
            }
            else if ($auto[3] == self::VALUE_NULL && ! empty($data[$auto[0]]))
            {
                //值为空时处理
                continue;
            }
            else if ($auto[3] == self::MUST_VALIDATE)
            {
                //必须处理
            }

            if ($auto[4] == $type || $auto[4] == self::MODEL_BOTH)
            {
                //为字段设置默认值
                if (empty($data[$auto[0]]))
                {
                    $data[$auto[0]] = '';
                }

                if ($auto[2] == 'method')
                {
                    $data[$auto[0]] = $this->$auto[1]($data[$auto[0]]);
                }
                else if ($auto[2] == 'function')
                {
                    $data[$auto[0]] = $auto[1]($data[$auto[0]]);
                }
                else if ($auto[2] == 'string')
                {
                    $data[$auto[0]] = $auto[1];
                }
            }
        }

        return $data;
    }

    /**
     * 创建数据对象
     *
     * @param  array $data 生成对象数据
     *
     * @return array    执行时间  写入|更新
     */
    public function create($data = array(), $type = '')
    {
        //如果数据不存在时使用$_POST
        if (empty($data))
        {
            $data = $_POST;
        }
        else if (is_object($data))
        {
            //对象时获取对象属性
            $data = get_object_vars($data);
        }

        if (empty($data))
        {
            $this->error = '数据不存在';

            return false;
        }

        //动作类型  1 插入 2 更新
        $type = $type ?: (empty($data[$this->getPk()]) ? self::MODEL_INSERT : self::MODEL_UPDATE);

        //自动验证
        if ( ! $this->autoValidate($data, $type))
        {
            return false;
        }

        //自动完成
        $data = $this->autoOperation($data, $type);

        //验证令牌
        if ($this->autoCheckToken($data))
        {
            $this->error = '表单令牌错误';

            return false;
        }

        //字段映射
        $data = $this->parseFieldsMap($data, $type);

        //移除表中不存在的字段
        $data = $this->FilterIllegalData($data);

        $this->data = $data;

        return $data;
    }

    /**
     * 自动验证令牌
     *
     * @param  [type] $data [description]
     *
     * @return [type]       [description]
     */
    private function autoCheckToken($data)
    {
        if (C('app.token_on'))
        {
            $name = C('app.token_name');
            if ( ! isset($data[$name]) || ! isset($_SESSION[$name]))
            {
                return false;
            }

            list($key, $value) = explode('_', $data[$name]);
            if (isset($_SESSION[$name][$key]) && $value && $_SESSION[$name][$key] == $value)
            {
                unset($_SESSION[$name][$key]);

                return true;
            }

            //令牌重置
            if (C('app.token_reset'))
            {
                unset($_SESSION[$name][$key]);
            }

            return false;
        }

        return true;
    }

    /**
     * 处理字段映射
     *
     * @param  array $data 数据
     * @param  int   $type 时间 1 写入  2 读取
     *
     * @return array
     */
    public function parseFieldsMap($data, $type = 2)
    {
        if ( ! empty($this->map))
        {
            foreach ($this->map as $key => $value)
            {
                if ($type == 1)
                {
                    if (isset($data[$key]))
                    {
                        $data[$value] = $data[$key];
                        unset($data[$key]);
                    }
                }
                else
                {
                    if (isset($data[$value]))
                    {
                        $data[$key] = $data[$value];
                        unset($data[$value]);
                    }
                }
            }
        }

        return $data;
    }

    /**
     * 添加数据并返回实例
     *
     * @return [type] [description]
     */
    public function add(array $data = array())
    {
        //如果数据不存在时使用$_POST
        if (empty($data))
        {
            $data       = $this->data;
            $this->data = array();
        }

        if (empty($data))
        {
            $this->error = '没有数据用于添加';

            return false;
        }

        //更新时间
        if ($this->timestamps === true)
        {
            $data['created_at'] = NOW;
        }

        //添加前操作
        if (method_exists($this, '_before_add'))
        {
            $this->_before_add($data);
        }

        if ($this->db->insert($data))
        {
            if (method_exists($this, '_after_add'))
            {
                $this->_after_add();
            }

            return $this->db->getInsertId() ?: true;
        }

        return false;
    }

    /**
     * 添加到数据表
     *
     * @return [type] [description]
     */
    public function save(array $data = array())
    {
        //如果数据不存在使用使用$this->data > $_POST
        if (empty($data))
        {
            $data       = $this->data;
            $this->data = array();
        }

        if (empty($data))
        {
            $this->error = '没有更新数据';

            return false;
        }

        //更新时间
        if ($this->timestamps === true)
        {
            $data['updated_at'] = NOW;
        }

        //更新条件检测
        if (empty($this->db->option['where']))
        {
            if (isset($data[$this->getPk()]) && ! empty($data[$this->getPk()]))
            {
                $this->db->where($this->getPk(), $data[$this->getPk()]);
            }
            else
            {
                $this->error = '更新没有条件';

                return false;
            }
        }

        //更新前操作
        if (method_exists($this, '_before_save'))
        {
            $this->_before_save($data);
        }

        $result = $this->db->update($data);
        //更新后操作
        if (method_exists($this, '_after_save'))
        {
            $this->_after_save();
        }

        return $result;
    }

    /**
     * 移除表中不存在的字段
     *
     * @param [type] $data [description]
     */
    private function FilterIllegalData($data)
    {
        $new = array();
        foreach ($data as $name => $value)
        {
            if (in_array($name, $this->field))
            {
                $new[$name] = $value;
            }
        }

        return $new;
    }

    /**
     * 更新模型的时间戳
     *
     * @return [type] [description]
     */
    public function touch()
    {
        $this->updated_at = time();

        return $this->save();
    }

    /**
     * 删除模型
     *
     * @return [type] [description]
     */
    public function delete($id = '')
    {
        if (empty($id))
        {
            if (isset($this->data[$this->getPk()]))
            {
                $this->db->where($this->getPk(), $this->data[$this->getPk()]);
            }
        }
        else
        {
            $this->db->whereIn($this->getPk(), explode(',', $id));
        }

        if (empty($this->db->option['where']))
        {
            $this->error = '没有设置删除条件';

            return false;
        }

        //删除前操作
        if (method_exists($this, '_before_delete'))
        {
            $this->_before_delete();
        }

        if ($status = $this->db->delete())
        {
            //删除后操作
            if (method_exists($this, '_after_delete'))
            {
                $this->_after_delete();
            }
        }

        return $status;
    }

    /**
     * 以属性找用户，若没有则新增
     *
     * @param  [type] $param [description]
     *
     * @return [type]        [description]
     */
    public function firstOrCreate($param, $data)
    {
        if ( ! $this->db->where(key($param), current($param))->first())
        {
            if ($this->create($data))
            {
                return $this->add();
            }
        }
        else
        {
            return false;
        }
    }

    /**
     * 获取模型值
     *
     * @param  [type] $name [description]
     *
     * @return [type]       [description]
     */
    public function __get($name)
    {
        if (isset($this->data[$name]))
        {
            return $this->data[$name];
        }
    }

    /**
     * 设置模型值
     *
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * 魔术方法
     *
     * @param  [type] $method [description]
     * @param  [type] $params [description]
     *
     * @return [type]         [description]
     */
    public function __call($method, $params)
    {
        $result = call_user_func_array(array($this->db, $method), $params);

        if (substr($method, 0, 5) == 'getBy')
        {
            $this->data = $result;
        }

        if (is_object($result))
        {
            return $this;
        }

        return $result;
    }

    public function offsetSet($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function offsetGet($key)
    {
        return $this->data[$key];
    }

    public function offsetExists($key)
    {
        return isset($this->data[$key]);
    }

    public function offsetUnset($key)
    {
        unset($this->data[$key]);
    }

    function rewind()
    {
        reset($this->data);
    }
}