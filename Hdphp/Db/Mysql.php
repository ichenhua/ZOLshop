<?php namespace Hdphp\Db;

use Pdo;
use Exception;
use Closure;

class Mysql
{

    //读取资源
    private static $readLink;

    //写入资源
    private static $writeLink;

    //最后一次的受影响条数
    private static $affectedRow;

    //数据表
    private $table;

    //查询语句log
    private static $queryLog = array();

    //查询参数
    public $option
        = array(
            'table' => '', 'field' => '*', 'where' => '', 'group' => '', 'having' => '', 'limit' => '', 'order' => array(), 'params' => array('where' => array(), 'having' => array())
        );

    //数据库连接
    public function __construct()
    {
        $this->getReadLink();
        $this->getWriteLink();
    }

    /**
     * 重置option属性
     */
    private function resetOption()
    {
        $this->option = array(
            'table' => $this->table, 'field' => '*', 'where' => '', 'group' => '', 'having' => '', 'limit' => '', 'order' => '', 'params' => array('where' => array(), 'having' => array())
        );
    }

    /**
     * 获取读链接
     *
     * @return \Pdo
     */
    private function getReadLink()
    {
        if ( ! self::$readLink)
        {
            $dns = 'mysql:host=' . Config::get('database.read.host') . ';dbname=' . Config::get('database.read.database');

            self::$readLink = new Pdo(
                $dns, Config::get('database.read.user'), Config::get('database.read.password'),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")
            );

            self::$readLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$readLink;
    }

    /**
     * 获取写链接
     *
     * @return \Pdo
     */
    private function getWriteLink()
    {
        if ( ! self::$writeLink)
        {
            $dns = 'mysql:host=' . Config::get('database.write.host') . ';dbname=' . Config::get('database.write.database');

            self::$writeLink = new Pdo(
                $dns, Config::get('database.write.user'), Config::get('database.write.password'),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")
            );
            self::$writeLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$writeLink;
    }

    /**
     * 数据表
     *
     * @param            $table 表名
     * @param bool|false $full  完整表名
     *
     * @return $this
     */
    public function table($table, $full = false)
    {
        if ($full)
        {
            $this->table = $table;
        }
        else
        {
            $this->table = Config::get('database.prefix') . $table;
        }
        $this->option['table'] = $this->table;

        return $this;
    }

    /**
     * 获取字段信息
     *
     * @param  [type]  $table [description]
     * @param  boolean $full [description]
     *
     * @return [type]         [description]
     */
    public function getTableField($table, $full = false)
    {
        /**
         * 不是全表名是添加表前缀
         */
        if ( ! $full)
        {
            $table = Config::get('database.prefix') . $table;
        }
        $name = Config::get('database.database') . '.' . $table;
        //字段缓存
        if ( ! DEBUG && F($name, '[get]', 'Storage/cache/field'))
        {
            $data = F($name, '[get]', 'Storage/cache/field');
        }
        else
        {
            $sql = "show columns from `$table`";
            if ( ! $result = $this->select($sql))
            {
                return false;
            }
            $data = array();
            foreach ($result as $res)
            {
                $f ['field']           = $res ['Field'];
                $f ['type']            = $res ['Type'];
                $f ['null']            = $res ['Null'];
                $f ['field']           = $res ['Field'];
                $f ['key']             = ($res ['Key'] == "PRI" && $res['Extra']) || $res ['Key'] == "PRI";
                $f ['default']         = $res ['Default'];
                $f ['extra']           = $res ['Extra'];
                $data [$res ['Field']] = $f;
            }
            DEBUG || F($name, $data, 'Storage/cache/field');
        }

        return $data;
    }

    /**
     * 获取表主键
     *
     * @param  [type]  $table [description]
     * @param  boolean $full [description]
     *
     * @return [type]         [description]
     */
    public function getTablePrimaryKey($table, $full = false)
    {
        $field = $this->getTableField($table, $full);
        foreach ($field as $key => $d)
        {
            if ($d['key'] == true)
            {
                return $key;
            }
        }
    }

    /**
     * 执行写入动作
     *
     * @param  [type] $sql    [description]
     * @param  array $params [description]
     *
     * @return [type]         [description]
     */
    public function execute($sql, array $params = array())
    {
        //重置option属性
        $this->resetOption();

        //准备sql
        $sth = self::$writeLink->prepare($sql);

        //绑定参数
        $id = 1;
        foreach ($params as $value)
        {
            $name  = "hd{$id}";
            $$name = $value;
            $sth->bindParam($id++, $$name, PDO::PARAM_STR);
        }
        try
        {
            //执行查询
            $sth->execute();

            //记录查询日志
            if (DEBUG)
            {
                //记录查询日志
                self::$queryLog[] = $sql;
            }

            return true;

        }
        catch (Exception $e)
        {
            if (DEBUG)
            {
                $error = $sth->errorInfo();
                throw new Exception($sql . " ;BindParams:" . var_export($params, true) . implode(';', $error));
            }
            else
            {
                return false;
            }
        }
    }

    /**
     * 获取受影响条数
     *
     * @return [type] [description]
     */
    public function getAffectedRow()
    {
        return self::$affectedRow;
    }

    /**
     * 执行预准备查询
     *
     * @param  [type] $sql    [description]
     * @param  array $params [description]
     *
     * @return [type]         [description]
     */
    public function select($sql, array $params = array())
    {
        //重置option属性
        $this->resetOption();

        //准备sql
        $sth = self::$readLink->prepare($sql);

        //设置保存数据
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        //绑定参数
        $id = 1;
        foreach ($params as $value)
        {
            $name  = "hd{$id}";
            $$name = $value;
            $sth->bindParam($id++, $$name, PDO::PARAM_STR);
        }

        try
        {
            //执行查询
            $sth->execute();

            //记录日志
            if (DEBUG)
            {
                //记录查询日志
                self::$queryLog[] = $sql;
            }

            //返回
            return $sth->fetchAll();

        }
        catch (Exception $e)
        {
            if (DEBUG)
            {
                $error = $sth->errorInfo();
                throw new Exception($sql . " ;BindParams:" . var_export($params, true) . implode(';', $error));
            }
            else
            {
                return false;
            }
        }
    }

    /**
     * 获得查询SQL语句
     *
     * @return [type] [description]
     */
    public function getSelectSql()
    {
        return "SELECT " . $this->getField() . " FROM " . $this->getTable() . $this->getJoin() . $this->getWhere() . $this->getGroupBy() . $this->getHaving() . $this->getOrderBy() . $this->getLimit() . $this->getUnion();
    }

    /**
     * 插入表数据
     *
     * @param  [type] $sql    [description]
     * @param  array $params [description]
     *
     * @return [type]         [description]
     */
    public function insert($sql, array $params = array())
    {
        if (is_array($sql))
        {
            foreach ($sql as $k => $v)
            {
                $field[]  = "`$k`";
                $place[]  = '?';
                $values[] = $v;
            }
            $exe = "INSERT INTO " . $this->getTable() . " (" . implode(',', $field) . ")VALUES(" . implode(',', $place) . ")";

            return $this->execute($exe, $values);
        }
        else if (is_string($sql))
        {
            return $this->execute($sql, $params);
        }
    }

    /**
     * 插入数据并返回主键
     *
     * @param  [type] $sql    [description]
     * @param  array $params [description]
     *
     * @return [type]         [description]
     */
    public function insertGetId($sql, array $params = array())
    {
        if ($result = $this->insert($sql, $params))
        {
            return self::$writeLink->lastInsertId();
        }
        else
        {
            return false;
        }
    }

    /**
     * 获得自增主键ID
     *
     * @return [type] [description]
     */
    public function getInsertId()
    {
        return self::$writeLink->lastInsertId();
    }

    /**
     * 更新表数据
     *
     * @param  [type] $sql    [description]
     * @param  array $params [description]
     *
     * @return [type]         [description]
     */
    public function update($sql, array $params = array())
    {
        if (is_array($sql))
        {
            $place = '';
            foreach ($sql as $k => $v)
            {
                $place .= "`$k`=?,";
            }
            $place = substr($place, 0, -1);

            $exe = "UPDATE " . $this->getTable() . " SET $place " . $this->getWhere();

            return $this->execute($exe, array_merge($sql, $this->getParams()));
        }
        else
        {
            return $this->execute($sql, $params);
        }
    }

    /**
     * 删除表数据
     *
     * @param  [type] $sql    [description]
     * @param  array $params [description]
     *
     * @return [type]         [description]
     */
    public function delete($sql = '', array $params = array())
    {
        if (empty($sql))
        {
            $exe = "DELETE FROM " . $this->getTable() . $this->getWhere();

            return $this->execute($exe, $this->getParams());
        }
        else
        {
            return $this->execute($sql, $params);
        }
    }

    /**
     * 清空表所有数据
     *
     * @return [type] [description]
     */
    public function truncate()
    {
        $sql = "truncate " . $this->getTable();

        return $this->execute($sql);
    }

    /**
     * 自增一个字段值
     *
     * @param  [type] $field [description]
     * @param  [type] $dec   [description]
     *
     * @return [type]        [description]
     */
    public function increment($field, $dec = 1)
    {

        $sql = "UPDATE " . $this->getTable() . " SET $field=$field+$dec" . $this->getWhere();

        return $this->execute($sql, $this->getParams());
    }

    /**
     * 自减一个字段值
     *
     * @param  [type] $field [description]
     * @param  [type] $dec   [description]
     *
     * @return [type]        [description]
     */
    public function decrement($field, $dec = 1, array $params = array())
    {
        $sql = "UPDATE " . $this->getTable() . " SET $field=$field-$dec" . $this->getWhere();

        return $this->execute($sql, $this->getParams());
    }

    /**
     * 事务处理
     *
     * @param  [type] $closure [description]
     *
     * @return [type]          [description]
     */
    public function transaction($closure)
    {
        try
        {
            $this->beginTransaction();
            //执行事务
            $closure();
            $this->commit();
        }
        catch (Exception $e)
        {
            //回滚事务
            self::$writeLink->rollBack();
        }
    }

    /**
     * 开启一个事务
     *
     * @return [type] [description]
     */
    public function beginTransaction()
    {
        //开启事务
        self::$writeLink->beginTransaction();
    }

    /**
     * 回滚一个事务
     *
     * @return [type] [description]
     */
    public function rollback()
    {
        //开启事务
        self::$writeLink->rollback();
    }

    /**
     * 提交一个事务
     *
     * @return [type] [description]
     */
    public function commit()
    {
        //开启事务
        self::$writeLink->commit();
    }

    /**
     * 获得查询SQL语句
     *
     * @return [type] [description]
     */
    public function getQueryLog()
    {
        return self::$queryLog;
    }

    /**
     * 获取操作表
     *
     * @return [type] [description]
     */
    private function getTable()
    {
        return $this->option['table'];
    }

    /**
     * 条件链接符
     *
     * @param  string $login [description]
     *
     * @return [type]        [description]
     */
    public function logic($login = 'AND')
    {
        if ($this->option['where'])
        {
            if ( ! preg_match('/(and|or)\s*$/i', end($this->option['where'])))
            {
                $this->option['where'][] = " $login ";
            }
        }

        return $this;
    }

    /**
     * 设置查询条件
     *
     * @param  [type] $field [description]
     * @param  [type] $value [description]
     *
     * @return [type]        [description]
     */
    public function where()
    {
        $this->logic();
        $params = func_get_args();
        switch (count($params))
        {
            case 1:
                if (is_string($params[0]))
                {
                    $this->option['where'][] = $params[0];
                }
                else
                {
                    foreach ((array)$params[0] as $name => $value)
                    {
                        $this->option['where'][]           = " {$name}=? ";
                        $this->option['params']['where'][] = $value;
                    }
                }
                break;
            case 2:
                $this->option['where'][]           = " {$params[0]}=? ";
                $this->option['params']['where'][] = $params[1];
                break;
            case 3:
                $this->option['where'][]           = " {$params[0]} {$params[1]} ? ";
                $this->option['params']['where'][] = $params[2];
                break;
        }

        return $this;
    }

    /**
     * 预准备条件
     *
     * @param  [type] $sql    [description]
     * @param  array $params [description]
     *
     * @return [type]         [description]
     */
    public function whereRaw($sql, array $params = array())
    {
        $this->logic();
        $this->option['where'][]         = $sql;
        $this->option['params']['where'] = array_merge(
            $this->option['params']['where'], $params
        );

        return $this;
    }

    /**
     * or where语句
     *
     * @return [type] [description]
     */
    public function orwhere()
    {
        $this->logic('or');
        $params = func_get_args();
        switch (count($params))
        {
            case 2:
                $this->option['where'][]           = " OR {$params[0]}=? ";
                $this->option['params']['where'][] = $params[1];
                break;
            case 3:
                $this->option['where'][]           = " OR {$params[0]} {$params[1]} ? ";
                $this->option['params']['where'][] = $params[2];
                break;
        }

        return $this;
    }

    /**
     * 设置between
     *
     * @return [type] [description]
     */
    public function whereBetween($field, $params)
    {
        $this->logic();
        $this->option['where'][]           = " $field BETWEEN  ? AND ? ";
        $this->option['params']['where'][] = $params[0];
        $this->option['params']['where'][] = $params[1];

        return $this;
    }

    /**
     * 设置NOT BETWEEN
     *
     * @param  [type] $field  [description]
     * @param  [type] $params [description]
     *
     * @return [type]         [description]
     */
    public function whereNotBetween($field, $params)
    {
        $this->logic();
        $this->option['where'][]           = " $field NOT BETWEEN  ? AND ? ";
        $this->option['params']['where'][] = $params[0];
        $this->option['params']['where'][] = $params[1];

        return $this;
    }

    /**
     * 设置IN
     *
     * @param  [type] $field  [description]
     * @param  [type] $params [description]
     *
     * @return [type]         [description]
     */
    public function whereIn($field, $params)
    {
        $this->logic();
        $where = '';
        foreach ($params as $value)
        {
            $where .= '?,';
            $this->option['params']['where'][] = $value;
        }

        $this->option['where'][] = " $field IN (" . substr($where, 0, -1) . ")";

        return $this;
    }

    /**
     * 设置NOT IN
     *
     * @param  [type] $field  [description]
     * @param  [type] $params [description]
     *
     * @return [type]         [description]
     */
    public function whereNotIn($field, $params)
    {
        $this->logic();
        $where = '';
        foreach ($params as $value)
        {
            $where .= '?,';
            $this->option['params']['where'][] = $value;
        }

        $this->option['where'][] = " $field NOT IN (" . substr($where, 0, -1) . ")";

        return $this;
    }

    /**
     * 设置IS NULL条件
     *
     * @param  [type] $field [description]
     *
     * @return [type]        [description]
     */
    public function whereNull($field)
    {
        $this->logic();
        $this->option['where'][] = " $field IS NULL";

        return $this;
    }

    /**
     * 设置IS NOT NULL
     *
     * @param  [type] $field [description]
     *
     * @return [type]        [description]
     */
    public function whereNotNull($field)
    {
        $this->logic();
        $this->option['where'][] = " $field IS NOT NULL";

        return $this;
    }

    /**
     * 通过魔术方法设置条件
     *
     * @param  [type] $params [description]
     *
     * @return [type]         [description]
     */
    private function whereClauses($name, $value)
    {
        if (preg_match_all('/[A-Z][a-z]+/', $name, $data))
        {
            $where = '';
            foreach ($data[0] as $d)
            {
                if ($d == 'Or' || $d == 'And')
                {
                    $where .= strtoupper($d);
                    continue;
                }
                else
                {
                    $where .= " $d = ? ";
                }
            }
        }
        $this->option['where'][] = $where;
        //添加参数
        foreach ($value as $v)
        {
            $this->option['params']['where'][] = $v;
        }

        return $this;
    }

    /**
     * 获取WHERE查询条件
     *
     * @return [type] [description]
     */
    private function getWhere()
    {
        if (empty($this->option['where']))
        {
            $where = '';
        }
        else
        {
            $where = " WHERE " . implode('', $this->option['where']);
        }

        return $where;
    }

    /**
     * 设置分组
     *
     * @param  [type] $group [description]
     *
     * @return [type]        [description]
     */
    public function groupBy($field)
    {
        $this->option['group'] = $field;

        return $this;
    }

    /**
     * 获取分组
     *
     * @return [type] [description]
     */
    private function getGroupBy()
    {
        if (empty($this->option['group']))
        {
            $group = '';
        }
        else
        {
            $group = " GROUP BY {$this->option['group']}";
        }

        return $group;
    }

    /**
     * 设置分组查询条件
     *
     * @param  [type] $having [description]
     *
     * @return [type]         [description]
     */
    public function having()
    {
        $params = func_get_args();
        switch (count($params))
        {
            case 2:
                $this->option['having']             = "{$params[0]}=?";
                $this->option['params']['having'][] = $params[1];
                break;
            case 3:
                $this->option['having']             = "{$params[0]}{$params[1]}?";
                $this->option['params']['having'][] = $params[2];
                break;
        }

        return $this;
    }

    /**
     * 获得分组查询
     *
     * @return [type] [description]
     */
    private function getHaving()
    {
        if (empty($this->option['having']))
        {
            $having = '';
        }
        else
        {
            $having = " HAVING {$this->option['having']}";
        }

        return $having;
    }

    /**
     * 设置查询字段
     *
     * @param  [type] $field [description]
     *
     * @return [type]        [description]
     */
    public function field()
    {
        $field                 = func_get_args();
        $this->option['field'] = implode(',', $field);

        return $this;
    }

    /**
     * 获取查询字段
     *
     * @return [type] [description]
     */
    private function getField()
    {
        if (empty($this->option['field']))
        {
            $field = '*';
        }
        else
        {
            $field = " {$this->option['field']} ";
        }

        return $field;
    }

    /**
     * 设置排序
     *
     * @param  [type] $order [description]
     *
     * @return [type]        [description]
     */
    public function orderBy($order, $type = 'ASC')
    {
        $this->option['order'][] = " $order $type ";

        return $this;
    }

    /**
     * 获取排序
     *
     * @return [type] [description]
     */
    private function getOrderBy()
    {
        if (empty($this->option['order']))
        {
            return '';
        }
        else
        {
            $order = " ORDER BY ";
            foreach ((array)$this->option['order'] as $d)
            {
                $order .= $d . ',';
            }

            return substr($order, 0, -1);
        }
    }

    /**
     * 设置查询区间
     *
     * @param  [type] $first [description]
     * @param  string $end [description]
     *
     * @return [type]        [description]
     */
    public function limit($first, $end = '')
    {
        if (empty($end))
        {
            $this->option['limit'] = $first;
        }
        else
        {
            $this->option['limit'] = "$first,$end";
        }

        return $this;
    }

    /**
     * 获取LIMIT
     *
     * @return [type] [description]
     */
    private function getLimit()
    {
        if (empty($this->option['limit']))
        {
            $limit = '';
        }
        else
        {
            $limit = " LIMIT {$this->option['limit']}";
        }

        return $limit;
    }

    /**
     * 获取查询参数
     *
     * @return [type] [description]
     */
    public function getParams()
    {
        if (empty($this->option['params']))
        {
            $params = array();
        }
        else
        {
            $option = $this->option['params'];
            $params = array_merge($option['where'], $option['having']);
        }

        return $params;
    }

    /**
     * 执行结构查询
     *
     * @return [type] [description]
     */
    public function get(array $field = array())
    {
        //设置字段
        if ($field)
        {
            $this->option['field'] = implode(',', $field);
        }

        return $this->select($this->getSelectSql(), $this->getParams());
    }

    /**
     * 从数据表中取出单一数据列
     *
     * @return [type] [description]
     */
    public function first()
    {
        $this->limit(1);

        if ($result = $this->get())
        {
            return current($result);
        }
    }

    /**
     * 从数据表中取得单一数据列的单一字段
     *
     * @param  [type] $field [description]
     *
     * @return [type]        [description]
     */
    public function pluck($field)
    {
        $result = $this->first();
        if ( ! empty($result))
        {
            return $result[$field];
        }
    }

    /**
     * 取得单一字段值的列表
     *
     * @param  [type] $field [description]
     *
     * @return [type]        [description]
     */
    public function lists($field)
    {
        $result = $this->field($field)->get();
        $field  = explode(',', $field);
        if ( ! empty($result))
        {
            $data = array();
            switch (count($field))
            {
                case 1:
                    foreach ($result as $row)
                    {
                        $data[] = $row[$field[0]];
                    }
                    break;
                case 2:
                    foreach ($result as $v)
                    {
                        $data[$v[$field[0]]] = $v[$field[1]];
                    }
                    break;
                default:
                    foreach ($result as $v)
                    {
                        $data[$v[$field[0]]] = $v;
                    }
                    break;
            }

            return $data;
        }
    }

    /**
     * 检测字段是否存在
     *
     * @param  [type] $fieldName [字段名]
     * @param  [type] $table     [表名]
     *
     * @return [bool]            [description]
     */
    public function fieldExists($fieldName, $table)
    {
        $field = $this->select("DESC " . Config::get("database.prefix") . $table);
        foreach ($field as $f)
        {
            if (strtolower($f['Field']) == strtolower($fieldName))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * 判断表是否存在
     *
     * @param $tableName 表名
     *
     * @return bool
     */
    public function tableExists($tableName)
    {
        $tableArr = $this->select("SHOW TABLES");

        foreach ($tableArr as $k => $table)
        {
            $key       = 'Tables_in_' . Config::get('database.read.database');
            $tableTrue = $table[$key];
            if (strtolower($tableTrue) == strtolower(Config::get('database.prefix') . $tableName))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * 获得所有表信息
     *
     * @return  array
     */
    public function getAllTableInfo()
    {
        $info              = $this->select("SHOW TABLE STATUS FROM " . Config::get("database.read.database"));
        $arr               = array();
        $arr['total_size'] = 0; //总大小
        $arr['total_row']  = 0; //总条数
        foreach ($info as $k => $t)
        {
            $arr['table'][$t['Name']]['tablename']     = $t['Name'];
            $arr['table'][$t['Name']]['engine']        = $t['Engine'];
            $arr['table'][$t['Name']]['rows']          = $t['Rows'];
            $arr['table'][$t['Name']]['collation']     = $t['Collation'];
            $charset                                   = $arr['table'][$t['Name']]['collation'] = $t['Collation'];
            $charset                                   = explode("_", $charset);
            $arr['table'][$t['Name']]['charset']       = $charset[0];
            $arr['table'][$t['Name']]['dataFree']      = $t['Data_free'];//碎片大小
            $arr['table'][$t['Name']]['indexSize']     = $t['Index_length'];//索引大小
            $arr['table'][$t['Name']]['dataSize']      = $t['Data_length'];//数据大小
            $arr['table'][$t['Name']]['totalSize']     = $t['Data_free'] + $t['Data_length'] + $t['Index_length'];
            $fieldData                                 = $this->getAllField($t['Name'], true);
            $arr['table'][$t['Name']]['field']         = $fieldData;
            $arr['table'][$t['Name']]['primaryKey']    = $this->getPrimaryKey($t['Name'], true);
            $arr['table'][$t['Name']]['autoincrement'] = $t['Auto_increment'] ? $t['Auto_increment'] : '';
            $arr['total_size'] += $arr['table'][$t['Name']]['dataSize'];
            $arr['total_row'] += $t['Rows'];
        }

        return $arr;
    }

    /**
     * 获得数据库大小
     *
     * @return int
     */
    public function getDataBaseSize()
    {
        $sql  = "show table status from " . Config::get('database.read.database');
        $data = $this->select($sql);
        $size = 0;
        foreach ($data as $v)
        {
            $size += $v['Data_length'] + $v['Data_length'] + $v['Index_length'];
        }

        return $size;
    }

    /**
     * 获得数据表大小
     *
     * @param $table 表名
     *
     * @return mixed
     */
    public function getTableSize($table)
    {
        $table = Config::get('database.read.prefix') . $table;
        $sql   = "show table status from " . Config::get('database.read.database');
        $data  = $this->select($sql);
        foreach ($data as $v)
        {
            if ($v['Name'] == $table)
            {
                return $v['Data_length'] + $v['Index_length'];
            }
        }

        return 0;
    }

    /**
     * 修复数据表
     *
     * @param $table
     *
     * @return bool
     */
    public function repair($table)
    {
        return $this->execute("REPAIR TABLE `" . Config::get('database.prefix') . $table . "`");
    }

    /**
     * 优化表解决表碎片问题
     *
     * @param array $table 表
     *
     * @return bool
     */
    public function optimize($table)
    {
        return $this->execute("OPTIMIZE TABLE `" . Config::get('database.prefix') . $table . "`");
    }

    public function getJoin()
    {
        if ( ! empty($this->option['join']))
        {
            return implode(' ', $this->option['join']);
        }
    }

    /**
     * 多表关联INNER JOIN
     *
     * @return [type] [description]
     */
    public function join()
    {
        $params                 = func_get_args();
        $params[0]              = Config::get('database.prefix') . $params[0];
        $this->option['join'][] = " INNER JOIN {$params[0]} ON {$params[1]} {$params[2]} {$params[3]}";

        return $this;
    }

    /**
     * 多表关联右链接
     *
     * @return [type] [description]
     */
    public function leftJoin()
    {
        $params                 = func_get_args();
        $params[0]              = Config::get('database.prefix') . $params[0];
        $this->option['join'][] = " LEFT JOIN {$params[0]} ON {$params[1]} {$params[2]} {$params[3]}";

        return $this;
    }

    /**
     * 多表关联右链接
     *
     * @return [type] [description]
     */
    public function rightJoin()
    {
        $params                 = func_get_args();
        $params[0]              = Config::get('database.prefix') . $params[0];
        $this->option['join'][] = " RIGHT JOIN {$params[0]} ON {$params[1]} {$params[2]} {$params[3]}";

        return $this;
    }

    public function count($field = '*')
    {
        $field = $this->field("count($field) AS c")->first();

        return $field['c'];
    }

    public function max($field)
    {
        $field = $this->field("max($field) AS m")->first();

        return $field['m'];
    }

    public function min($field)
    {
        $field = $this->field("min($field) AS m")->first();

        return $field['m'];
    }

    public function avg($field)
    {
        $field = $this->field("avg($field) AS a")->first();

        return $field['a'];
    }

    public function sum($field)
    {
        $field = $this->field("sum($field) AS s")->first();

        return $field['s'];
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
        if (substr($method, 0, 5) == 'where')
        {
            return $this->whereClauses(substr($method, 5), $params);
        }
        else if (substr($method, 0, 5) == 'getBy')
        {
            $field = strtolower(substr($method, 5));

            return $this->where($field, current($params))->first();
        }
    }
}