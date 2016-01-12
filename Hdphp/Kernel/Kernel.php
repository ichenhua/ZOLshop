<?php namespace Hdphp\Kernel;

use Exception;
use ReflectionMethod;

class Kernel
{

    public function __construct()
    {
        //设置字符集
        header("Content-type:text/html;charset=" . Config::get('app.charset'));

        //时区
        date_default_timezone_set(Config::get('app.timezone'));

        //路由处理
        $this->ParseRoute();

        //导入钓子
        \Hdphp\Hook\Hook::import(Config::get('hook'));

        //应用开始钓子
        \Hdphp\Hook\Hook::listen("app_begin");

        //定义常量
        $this->DefineConsts();

        //执行控制器方法
        $this->ExecuteAction();

        //应用结束钩子
        \Hdphp\Hook\Hook::listen("app_end");

        //保存日志
        Log::save();
    }

    /**
     * 解析路由
     *
     * @return bool
     */
    private function parseRoute()
    {
        //导入路由
        require 'System/routes.php';

        //分析处理
        return Route::dispatch();
    }

    /**
     * 定义常量
     */
    private function DefineConsts()
    {
        /**
         * URL地址定义
         */
        define('__ROOT__', rtrim('http://' . $_SERVER['HTTP_HOST'] . preg_replace('@\w+\.php$@i', '', $_SERVER['SCRIPT_NAME']), '/'));
        define('__WEB__', C('http.rewrite') ? __ROOT__ : __ROOT__ . '/' . basename($_SERVER['SCRIPT_FILENAME']));
        define('__URL__', 'http://' . $_SERVER['HTTP_HOST'] . '/' . trim($_SERVER['REQUEST_URI'], '/'));
        define("__HISTORY__", isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : null);

        /**
         * 目录定义
         */
        if (defined('APP_GROUP_PATH'))
        {
            defined('APP_PATH') or define('APP_PATH', APP_GROUP_PATH . '/' . APP);
        }

        //模块目录
        defined('MODULE_PATH') or define('MODULE_PATH', APP_PATH . '/' . MODULE);
        //模板目录
        defined('VIEW_PATH') or define('VIEW_PATH', defined('MODULE_PATH') ? MODULE_PATH . '/View' : C('view.path'));
        //公共目录
        defined("__PUBLIC__") or define('__PUBLIC__', __ROOT__ . '/Public');
        defined("__VIEW__") or define('__VIEW__', __ROOT__ . '/' . rtrim(VIEW_PATH, '/'));
    }

    //执行动作
    private function ExecuteAction()
    {

        //禁止使用模块检测
        if (in_array(MODULE, C('http.deny_module')))
        {
            throw new Exception(MODULE . '模块禁止使用');
        }

        if (defined('APP_GROUP_PATH'))
        {
            $class = APP . '\\' . ucfirst(MODULE) . '\\Controller\\' . ucfirst(CONTROLLER) . 'Controller';
        }
        else
        {
            $class = ucfirst(MODULE) . '\\Controller\\' . ucfirst(CONTROLLER) . 'Controller';
        }

        //控制器不存在
        if ( ! class_exists($class))
        {
            throw new Exception("{$class} 不存在");
        }

        $controller = new $class;

        //执行动作
        try
        {
            $action = new ReflectionMethod($controller, ACTION);

            if ($action->isPublic())
            {
                call_user_func_array(array($controller, ACTION), Route::getArg());
            }
            else
            {
                throw new ReflectionException('动作不存在');
            }

        }
        catch (ReflectionException $e)
        {
            $action = new ReflectionMethod($controller, '__call');
            $action->invokeArgs($controller, array(ACTION, ''));
        }
    }
}