<?php namespace Hdphp\Route;

use Closure;

class Compile extends Setting
{
    //路由参数
    protected $args = array();

    /**
     * 匹配路由
     *
     * @param  [type]  $key
     *
     * @return boolean
     */
    protected function isMatch($key)
    {
        if (preg_match($this->route[$key]['regexp'], $this->requestUri))
        {
            //获取参数
            $this->route[$key]['get'] = $this->getArgs($key);
            //验证参数
            if ( ! $this->checkArgs($key))
            {
                return false;
            }
            //设置GET参数
            $this->args = $_GET = array_merge($this->route[$key]['get'], $_GET);

            return $this->found = true;
        }
    }

    /**
     * 获取请求参数
     *
     * @param  [type] $key [description]
     *
     * @return [type]      [description]
     */
    protected function getArgs($key)
    {
        $args = array();

        if (preg_match_all($this->route[$key]['regexp'], $this->requestUri, $matched, PREG_SET_ORDER))
        {
            //参数列表
            foreach ($this->route[$key]['args'] as $n => $value)
            {
                if (isset($matched[0][$n + 1]))
                {
                    $args[$value[1]] = $matched[0][$n + 1];
                }
            }
        }

        return $args;
    }

    /**
     * 验证路由参数
     *
     * @param  [int] $key [description]
     *
     * @return [bool]      [description]
     */
    protected function checkArgs($key)
    {
        $route = $this->route[$key];

        if ( ! empty($route['where']))
        {
            foreach ($route['where'] as $name => $regexp)
            {
                if (isset($route['get'][$name]) && ! preg_match($regexp, $route['get'][$name]))
                {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * 执行路由事件
     *
     * @param  [type] $route [description]
     *
     * @return [type]        [description]
     */
    public function exec($key)
    {
        //匿名函数
        if ($this->route[$key]['callback'] instanceof Closure)
        {
            echo call_user_func_array($this->route[$key]['callback'], $this->route[$key]['get']);
            exit;
        }
        else
        {
            //设置控制器与方法
            $data = explode('/', $this->route[$key]['callback']);

            define('ACTION', array_pop($data));
            define('CONTROLLER', array_pop($data));
            define('MODULE', array_pop($data));
            if (defined('APP_GROUP_PATH'))
            {
                //应用组模式
                define('APP', $data ? array_pop($data) : C('http.default_app'));
            }

            return $this->found = true;
        }
    }

    /**
     * GET事件处理
     *
     * @param  [type] $route [description]
     *
     * @return [type]        [description]
     */
    protected function _get($key)
    {
        return IS_GET && $this->isMatch($key) && $this->exec($key);
    }

    /**
     * POST事件处理
     *
     * @param  [type] $route [description]
     *
     * @return [type]        [description]
     */
    protected function _post($key)
    {
        return IS_POST && $this->isMatch($key) && $this->exec($key);
    }

    /**
     * POST事件处理
     *
     * @param  [type] $route [description]
     *
     * @return [type]        [description]
     */
    protected function _put($key)
    {
        if (empty($_POST))
        {
            parse_str(file_get_contents('php://input'), $_POST);
        }

        return IS_PUT && $this->isMatch($key) && $this->exec($key);
    }

    /**
     * POST事件处理
     *
     * @param  [type] $route [description]
     *
     * @return [type]        [description]
     */
    protected function _delete($key)
    {
        if (empty($_POST))
        {
            parse_str(file_get_contents('php://input'), $_POST);
        }

        return IS_DELETE && $this->isMatch($key) && $this->exec($key);
    }


    /**
     * 任意提交模式
     *
     * @param  [type] $route [description]
     *
     * @return [type]        [description]
     */
    protected function _any($key)
    {
        return $this->isMatch($key) && $this->exec($key);
    }

    /**
     * 任意提交模式
     *
     * @param  [type] $route [description]
     *
     * @return [type]        [description]
     */
    protected function _controller($key)
    {
        if ($this->route[$key]['method'] == 'controller' && $this->isMatch($key))
        {
            //控制器方法
            $method = $this->getRequestAction() . ucfirst($this->route[$key]['get']['method']);

            //从容器提取控制器对象
            $info = explode('/', $this->route[$key]['callback']);
            define('MODULE', array_shift($info));
            define('CONTROLLER', array_shift($info));
            if ( ! empty($info))
            {
                define('APP', array_shift($info));
            }
            define('ACTION', $method);
            $this->found = true;
        }
    }

    /**
     * 获取请求方法
     *
     * @return [type] [description]
     */
    public function getRequestAction()
    {
        switch (true)
        {
            case IS_GET:
                return 'get';
            case IS_POST:
                return 'post';
            case IS_PUT:
                return 'put';
            case IS_DELETE:
                return 'delete';
        }
    }

    /**
     * 没有路由匹配时解析GET模式
     *
     * @return [type] [description]
     */
    public function RunGetModel()
    {
        $var_app        = C('http.var_app');
        $var_module     = C('http.var_module');
        $var_controller = C('http.var_controller');
        $var_action     = C('http.var_action');

        $m = isset($_GET[$var_module]) ? $_GET[$var_module] : C('http.default_module');
        $c = isset($_GET[$var_controller]) ? $_GET[$var_controller] : C('http.default_controller');
        $a = isset($_GET[$var_action]) ? $_GET[$var_action] : C('http.default_action');

        //应用组模式
        if (defined('APP_GROUP_PATH'))
        {
            $app = isset($_GET[$var_app]) ? $_GET[$var_app] : C('http.default_app');
        }
        else
        {
            $app = basename(APP_PATH);
        }
        define('APP', ucfirst($app));
        define('MODULE', ucfirst($m));
        define('CONTROLLER', ucfirst($c));
        define('ACTION', $a);
        $this->found = true;
    }

    /**
     * 获取解析后的参数
     *
     * @return mixed
     */
    public function getArg()
    {
        return $this->args;
    }
}