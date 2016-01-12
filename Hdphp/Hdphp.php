<?php

define('HDPHP_VERSION', '2015-7-1');//版本号
defined("DEBUG") or define("DEBUG", false);//调试模式
defined('HDPHP_PATH') or define('HDPHP_PATH', __DIR__);//框架目录

if ( ! defined('APP_GROUP_PATH') && ! defined('APP_PATH'))
{
    //入口文件不能同时定义应用组与应用
    die('Entry file defines error');
}

//命令行模式
if ($_SERVER['SCRIPT_NAME'] == 'hd')
{
    require_once 'Hdphp/Cli/Cli.php';
    Hdphp\Cli\Cli::run();
    exit;
}
else if ( ! DEBUG && is_file('Storage/~runtime.php'))
{
    //加载核心编译文件
    require_once 'Storage/~runtime.php';
}
else
{
    require_once HDPHP_PATH . '/Kernel/Container.php';
    require_once HDPHP_PATH . '/Kernel/Application.php';
    require_once HDPHP_PATH . '/Kernel/Boot.php';
}

require_once HDPHP_PATH . '/Kernel/Functions.php';
Hdphp\Kernel\Boot::bootstrap();
new Hdphp\Kernel\Application();
new Hdphp\Kernel\Kernel();
