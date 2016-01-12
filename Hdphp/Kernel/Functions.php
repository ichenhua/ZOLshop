<?php

/**
 * 生成url
 *
 * @param       $path 应用/模块/动作/方法 应用组模式需要传四个参数
 * @param array $args GET参数
 *
 * @return string
 */
function U($path, $args = array())
{
    if (empty($path) || preg_match('@^http@i', $path))
    {
        return $path;
    }

    $info = explode('/', $path);

    //获取模块、控制器、动作
    $action['a'] = array_pop($info);
    $action['c'] = array_pop($info) ?: CONTROLLER;
    $action['m'] = array_pop($info) ?: MODULE;

    if (defined('APP_GROUP_PATH'))
    {
        //应用组模式
        $action['app'] = $info ? array_pop($info) : (Q('get.app') ?: APP);
    }

    $url = C('http.rewrite') ? __ROOT__ : __ROOT__ . '/' . basename($_SERVER['SCRIPT_FILENAME']);

    return $url . '?' . http_build_query(array_merge(array_reverse($action), $args));
}

/**
 * 调用 Api Server
 */
function Api()
{
    static $cache = array();
    $params = func_get_args();
    $info   = explode('/', array_shift($params));
    //动作
    $action = array_pop($info);
    $class  = implode('\\', $info);
    if ( ! isset($cache[$class]))
    {
        $cache[$class] = new $class;
    }

    return call_user_func_array(array($cache[$class], $action), $params);
}

/**
 * 实例模型
 *
 * @param [type] $model [description]
 */
function M($class)
{
    $class = str_replace('/', '\\', $class);
    static $instances = array();

    if (isset($instances[$class]))
    {
        return $instances[$class];
    }

    return $instances[$class] = new $class;
}

/**
 * 操作配置项
 *
 * @param string $name  [description]
 * @param string $value [description]
 */
function C($name = '', $value = '')
{
    if ($name === '')
    {
        return Config::all();
    }

    if ($value === '')
    {
        return Config::get($name);
    }

    return Config::set($name, $value);
}

/**
 * 请求参数
 *
 * @param [type] $name      [变量名]
 * @param string $value [默认值]
 * @param [type] $functions [回调函数]
 */
function Q($var, $default = null, $filter = '')
{
    return Request::query($var, $default, $filter);
}

/**
 * 404
 * @param  [type] $code [description]
 *
 * @return [type]       [description]
 */
function _404($code)
{
    if ($code == 404 && is_file('public/404.html'))
    {
        Response::sendHttpStatus(404);
        View::make('public/404');
    }
}

/**
 * 打印输出数据|show的别名
 *
 * @param void $var
 */
function p($var)
{
    echo "<pre>" . print_r($var, true) . "</pre>";
}

/**
 * 跳转网址
 *
 * @param string $url  跳转urlg
 * @param int    $time 跳转时间
 * @param string $msg
 */
function go($url, $time = 0, $msg = '')
{
    $url = U($url);
    if ( ! headers_sent())
    {
        $time == 0 ? header("Location:" . $url) : header("refresh:{$time};url={$url}");
        exit($msg);
    }
    else
    {
        echo "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($msg)
        {
            echo($msg);
        }
        exit;
    }
}

/**
 * Session管理
 *
 * @param        $name
 * @param string $value
 */
function session($name, $value = '[get]')
{
    $action = $value[0] == '[' ? trim($value, '[]') : 'set';

    return Session::$action($name, $value);
}

/**
 * Cookie管理
 *
 * @param        $name
 * @param string $value
 */
function cookie($name, $value = '[get]')
{
    $action = $value[0] == '[' ? trim($value, '[]') : 'set';

    return Cookie::$action($name, $value);
}

/**
 * 快速缓存 以文件形式缓存
 *
 * @param String $name  缓存KEY
 * @param bool   $value 数据
 * @param string $path  缓存目录
 *
 * @return bool
 */
function F($name, $value = '[get]', $path = 'Storage/cache')
{
    static $cache = array();

    $file = $path . '/' . $name . '.php';

    if ($value == '[del]')
    {
        if (is_file($file))
        {
            unlink($file);
            if (isset($cache[$name]))
            {
                unset($cache[$name]);
            }
        }

        return true;
    }

    if ($value === '[get]')
    {
        if (isset($cache[$name]))
        {
            return $cache[$name];
        }
        else if (is_file($file))
        {
            return $cache[$name] = include $file;
        }
        else
        {
            return false;
        }
    }

    $data = "<?php if(!defined('HDPHP_PATH'))exit;\nreturn " . var_export($value, true) . ";\n?>";

    if ( ! is_dir($path))
    {
        mkdir($path, 0755, true);
    }

    if ( ! file_put_contents($file, $data))
    {
        return false;
    }

    $cache[$name] = $value;

    return true;
}

/**
 * 驱动缓存
 *
 * @param string $name   变量名
 * @param mixed  $data   缓存数据
 * @param int    $expire 过期时间 0　为持久缓存
 */
function S($name, $data = '', $expire = null)
{
    if (empty($data))
    {
        return Cache::get($name);
    }
    else
    {
        return Cache::set($name, $data, $expire);
    }
}

/**
 * 根据大小返回标准单位 KB  MB GB等
 */
function get_size($size, $decimals = 2)
{
    switch (true)
    {
        case $size >= pow(1024, 3):
            return round($size / pow(1024, 3), $decimals) . " GB";
        case $size >= pow(1024, 2):
            return round($size / pow(1024, 2), $decimals) . " MB";
        case $size >= pow(1024, 1):
            return round($size / pow(1024, 1), $decimals) . " KB";
        default:
            return $size . 'B';
    }
}

/**
 * 导入类库
 *
 * @param  string $class 路径
 *
 * @return bool
 */
function import($class)
{
    $file = str_replace(array('@', '.', '#'), array(APP_PATH, '/', '.'), $class);
    if (is_file($file))
    {
        require_once $file;

        return true;
    }
    else
    {
        return false;
    }
}

//打印用户常量
function print_const()
{
    $d = get_defined_constants(true);
    p($d['user']);
}

/**
 * trace 信息
 *
 * @param  string  $value  变量
 * @param  string  $label  标签
 * @param  string  $level  日志级别(或者页面Trace的选项卡)
 * @param  boolean $record 是否记录日志
 *
 * @return void|array
 */
function trace($value = '[hdphp]', $label = '', $level = 'DEBUG', $record = false)
{
    return Error::trace($value, $label, $level, $record);
}

