<?php namespace Hdphp\Hook;


class Hook
{
    //钓子
    private static $hook = array();

    /**
     * 添加钓子事件
     *
     * @param $hook   钓子名称
     * @param $action 钓子事件
     */
    public static function add($hook, $action)
    {
        if ( ! isset(self::$hook[$hook]))
        {
            self::$hook[$hook] = array();
        }

        if (is_array($action))
        {
            self::$hook[$hook] = array_merge(self::$hook[$hook], $action);
        }
        else
        {
            self::$hook[$hook][] = $action;
        }
    }

    /**
     * 获得钓子信息
     *
     * @param string $hook 钓子名
     *
     * @return array
     */
    public static function get($hook = '')
    {
        if (empty($hook))
        {
            return self::$hook;
        }
        else
        {
            return self::$hook[$hook];
        }
    }

    /**
     * 批量导入钓子
     *
     * @param      $data      钓子数据
     * @param bool $recursive 是否递归合并
     */
    public static function import($data, $recursive = true)
    {
        if ($recursive === false)
        {
            self::$hook = array_merge(self::$hook, $data);
        }
        else
        {
            foreach ($data as $hook => $value)
            {
                if ( ! isset(self::$hook[$hook]))
                {
                    self::$hook[$hook] = array();
                }

                if (isset($value['_overflow']))
                {
                    unset($value['_overflow']);
                    self::$hook[$hook] = $value;
                }
                else
                {
                    self::$hook[$hook] = array_merge(self::$hook[$hook], $value);
                }
            }
        }
    }

    /**
     * 监听钓子
     *
     * @param      $hook  钓子名
     * @param null $param 参数
     *
     * @return bool
     */
    public static function listen($hook, &$param = null)
    {
        if ( ! isset(self::$hook[$hook]))
        {
            return false;
        }

        foreach (self::$hook[$hook] as $name)
        {
            if (false ===self::exe($name, $hook, $param))
            {
                return false;
            }
        }
        return $param?:true;
    }

    /**
     * 执行钓子
     *
     * @param      $name   钓子名
     * @param      $action 钓子方法
     * @param null $param  参数
     *
     * @return boolean
     */
    public static function exe($name, $action = 'run', &$param = null)
    {
        if (substr($name, -4) == 'Hook')
        {
            //钓子
            $action = 'run';
        }
        else
        {
            //插件
            $file = 'Addons/' . $name . '/' . $name . 'Addon.php';
            if ( ! is_file($file))
            {
                return false;
            }
            require_once($file);
            $name = "\\Addons\\{$name}\\" . $name . 'Addon';

            if ( ! class_exists($name, false))
            {
                return false;
            }
        }
        $obj = new $name;
        if (method_exists($obj, $action))
        {
            $obj->$action($param);
        }

        return $param;
    }
}