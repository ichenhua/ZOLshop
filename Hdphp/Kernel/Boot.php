<?php namespace Hdphp\Kernel;

class Boot
{

    private static $binded = false;

    //应用目录
    private static $appPath;

    public static function bootstrap()
    {
        if (defined('APP_GROUP_PATH'))
        {
            self::$appPath = APP_GROUP_PATH . '/Home';
        }
        else
        {
            self::$appPath = APP_PATH;
        }
        //设置系统常量
        self::setConsts();

        //创建初始目录
        self::mkDirs();

        //创建初始文件
        self::createInitFile();

        //创建编译文件
        self::createRuntimeFile();
    }

    /**
     * 设置初始常量
     */
    public static function setConsts()
    {
        define('IS_CGI', substr(PHP_SAPI, 0, 3) == 'cgi' ? true : false);
        define('IS_WIN', strstr(PHP_OS, 'WIN') ? true : false);
        define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
        define('DS', DIRECTORY_SEPARATOR);
        define('IS_GET', $_SERVER['REQUEST_METHOD'] == 'GET');
        define('IS_POST', $_SERVER['REQUEST_METHOD'] == 'POST');
        define('IS_DELETE', $_SERVER['REQUEST_METHOD'] == 'DELETE' ?: (isset($_POST['_method']) && $_POST['_method'] == 'DELETE'));
        define('IS_PUT', $_SERVER['REQUEST_METHOD'] == 'PUT' ?: (isset($_POST['_method']) && $_POST['_method'] == 'PUT'));
        define(
        'IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        );

        define('NOW', $_SERVER['REQUEST_TIME']);
        define('NOW_MICROTIME', microtime(true));
        // 系统信息
        @ini_set('memory_limit', '128M');
        @ini_set('register_globals', 'off');
        if (version_compare(PHP_VERSION, '5.4.0', '<'))
        {
            //对外部引入文件禁止加转义符
            ini_set('magic_quotes_runtime', 0);
            //删除系统自动加的转义符号
            if (get_magic_quotes_gpc())
            {
                self::unaddslashes($_POST);
                self::unaddslashes($_COOKIE);
                self::unaddslashes($_GET);
            }
        }
    }

    //反转义$_POST
    private static function unaddslashes(&$data)
    {
        foreach ((array)$data as $k => $v)
        {
            if (is_numeric($v))
            {
                $data[$k] = $v;
            }
            else
            {
                $data[$k] = is_array($v) ? self::unaddslashes($v) : stripslashes($v);
            }
        }

        return $data;
    }

    /**
     * 初次运行框时创建基础目录
     *
     * @return [type] [description]
     */
    public static function mkDirs()
    {
        if (is_dir('Config'))
        {
            self::$binded = true;

            return;
        }


        $dirs = array(
            'System/Service', 'System/Provider', 'System/Lang', 'System/Tag', 'System/Hook', self::$appPath . '/Home/Controller', self::$appPath . '/Home/Model', self::$appPath . '/Home/Api', self::$appPath . '/Home/View/Index', 'Config', 'Public'
        );

        foreach ($dirs as $dir)
        {
            is_dir($dir) or mkdir($dir, 0755, true);
        }
    }

    /**
     * 创建初始文件
     *
     * @return [type] [description]
     */
    public static function createInitFile()
    {
        if (self::$binded)
        {
            return;
        }

        $files = array(
            HDPHP_PATH . '/View/index.php' => self::$appPath . '/Home/View/Index/index.php', HDPHP_PATH . '/View/success.php' => 'Public/success.php', HDPHP_PATH . '/View/error.php' => 'Public/error.php', HDPHP_PATH . '/View/tag.php' => 'System/Tag/Common.php', HDPHP_PATH . '/Controller/IndexController.php' => self::$appPath . '/Home/Controller/IndexController.php', HDPHP_PATH . '/Lang/zh.php' => 'System/Lang/zh.php', HDPHP_PATH . '/Route/routes.php' => 'System/routes.php',
        );

        foreach ($files as $key => $value)
        {
            if ( ! is_file($value))
            {
                copy($key, $value);
            }
        }

        //复制配置文件
        foreach (glob(HDPHP_PATH . '/Config/Config/*') as $file)
        {
            if ( ! is_file('Config/' . basename($file)))
            {
                copy($file, 'Config/' . basename($file));
            }
        }
    }

    /**
     * 生成编译文件
     *
     * @return [type] [description]
     */
    private static function createRuntimeFile()
    {
        //调试模式下不生成编译文件
        if (DEBUG == true || is_file('Storage/~runtime.php'))
        {
            return;
        }

        //核心文件
        $core = array(
            HDPHP_PATH . '/Kernel/Boot', HDPHP_PATH . '/Kernel/Container', HDPHP_PATH . '/Kernel/Application', HDPHP_PATH . '/Kernel/Facade', HDPHP_PATH . '/Kernel/Kernel', HDPHP_PATH . '/Kernel/ServiceProvider',
        );

        //服务与facade文件列表
        $config = require 'Config/service.php';

        $files = array_merge($core, $config['provider'], $config['facade']);

        $compile = '';

        foreach ($files as $file)
        {
            $file = str_replace('\\', DS, $file);
            $compile .= substr(rtrim(file_get_contents($file . '.php')), 5) . "\n";
        }
        if ( ! is_dir('Storage'))
        {
            mkdir('Storage', 0755, true);
        }
        //保存文件
        file_put_contents('Storage/~runtime.php', '<?php ' . $compile);
    }

}