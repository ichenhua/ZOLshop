<?php namespace Hdphp\Kernel;

use Closure;
use ReflectionClass;
use ReflectionMethod;
use ReflectionFunction;
use ReflectionParameter;
use Hdphp\Kernel\ServiceProviders;

class Application extends Container
{

    //应用已启动
    protected $booted = false;

    //服务列表
    protected $services = array();

    //外观别名
    protected $facade = array();

    //延迟加载服务提供者
    protected $deferProviders = array();

    //已加载服务提供者
    protected $serviceProviders = array();

    //类库映射
    protected $alias = array();

    //构造函数
    public function __construct()
    {
        //注册自动载入函数
        spl_autoload_register(array($this, 'autoload'));
        spl_autoload_register(array($this, 'autoloadFacade'));
        spl_autoload_register(array($this, 'autoloadModel'));

        //引入服务配置
        $config = require 'Config/service.php';

        //服务提供者
        $this->services = $config['provider'];
        $this->facade   = $config['facade'];

        //绑定核心服务提供者
        $this->bindServiceProvider();

        //添加初始实例
        $this->setInstance();

        //设置外观基类APP属性
        \Hdphp\Kernel\Facade::setFacadeApplication($this);

        //导入类库别名
        $this->addMap(Config::get('app.alias'));

        //启动
        $this->boot();
    }

    /**
     * 添加初始实例
     *
     * @return [type] [description]
     */
    protected function setInstance()
    {
        $this->instance('App', $this);
    }

    /**
     * 系统启动
     *
     * @return void
     */
    public function boot()
    {
        if ($this->booted)
        {
            return;
        }

        foreach ($this->serviceProviders as $p)
        {
            $this->bootProvider($p);
        }

        $this->booted = true;
    }

    /**
     * 服务加载处理
     *
     * @return [type] [description]
     */
    public function bindServiceProvider()
    {
        foreach ($this->services as $service)
        {
            $reflectionClass = new ReflectionClass($service);
            $properties      = $reflectionClass->getDefaultProperties();

            //获取服务延迟属性
            if (isset($properties['defer']) && $properties['defer'])
            {
                $alias = substr($reflectionClass->getShortName(), 0, -15);

                //延迟加载服务
                $this->deferProviders[$alias] = $service;
            }
            else
            {
                //立即加载服务
                $this->register(new $service($this));
            }
        }

    }

    /**
     * 获取服务对象
     *
     * @param  [type] $name [description]
     *
     * @return [type]       [description]
     */
    public function make($name, $force = false)
    {
        if (isset($this->deferProviders[$name]))
        {
            $this->register(new $this->deferProviders[$name]($this));
            unset($this->deferProviders[$name]);
        }

        return parent::make($name, $force);
    }

    /**
     * 注册服务
     *
     * @param  [type] $provider [description]
     *
     * @return [type]           [description]
     */
    public function register($provider)
    {
        if ($registered = $this->getProvider($provider))
        {
            return $registered;
        }

        if (is_string($provider))
        {
            $provider = new $provider($this);
        }

        $provider->register($this);

        //记录服务
        $this->serviceProviders[] = $provider;

        if ($this->booted)
        {
            $this->bootProvider($provider);
        }
    }

    /**
     * 运行服务提供者的boot方法
     *
     * @param [type] $provider [description]
     */
    public function bootProvider($provider)
    {
        if (method_exists($provider, 'boot'))
        {
            $provider->boot();
        }
    }

    /**
     * 获取已经注册的服务
     *
     * @param  [type] $provider [description]
     *
     * @return [type]           [description]
     */
    protected function getProvider($provider)
    {
        $class = is_object($provider) ? get_class($provider) : $provider;
        foreach ($this->serviceProviders as $value)
        {
            if ($value instanceof $class)
            {
                return $value;
            }
        }
    }

    /**
     * 类库映射
     *
     * @param array|string $alias     别名
     * @param string       $namespace 命名空间
     */
    public function addMap($alias, $namespace = '')
    {
        if (is_array($alias))
        {
            foreach ($alias as $key => $value)
            {
                $this->alias[$key] = $value;
            }
        }
        else
        {
            $this->alias[$alias] = $namespace;
        }
    }

    /**
     * 类自动加载
     *
     * @param  [type] $class [description]
     *
     * @return [type]        [description]
     */
    public function autoload($class)
    {
        $file = str_replace('\\', DS, $class) . '.php';
        if (isset($this->alias[$class]))
        {
            //检测类库映射
            require_once str_replace('\\', DS, $this->alias[$class]);
        }
        else if (is_file($file))
        {
            //直接加载文件
            require_once $file;
        }
        else if (defined('MODULE_PATH') && is_file(MODULE_PATH . DS . $file))
        {
            //项目文件
            require_once MODULE_PATH . DS . $file;
        }
        else if (defined('APP_PATH') && is_file(APP_PATH . DS . $file))
        {
            //项目文件
            require_once APP_PATH . DS . $file;
        }
        else if (defined('APP_GROUP_PATH') && is_file(APP_GROUP_PATH . DS . $file))
        {
            //项目文件
            require_once APP_GROUP_PATH . DS . $file;
        }
        else if (class_exists('Config', false))
        {
            //自动加载命名空间
            foreach ((array)Config::get('app.autoload_namespace') as $key => $value)
            {
                if (strpos($class, $key) !== false)
                {
                    $file = str_replace($key, $value, $class) . '.php';
                    require_once(str_replace('\\', DS, $file));
                }
            }

        }
    }

    /**
     * 自动加载facade类
     *
     * @param  [type] $class [description]
     *
     * @return [type]        [description]
     */
    public function autoloadFacade($class)
    {
        $file = str_replace('\\', '/', $class);

        if (isset($this->facade[basename($file)]))
        {
            //加载facade类
            return class_alias($this->facade[basename($file)], $class);
        }
    }

    /**
     * 自动加载模型
     *
     * @param  [type] $class [description]
     *
     * @return [type]        [description]
     */
    public function autoloadModel($class)
    {
        $file = str_replace('\\', '/', $class);

        if (isset($this->facade[basename($file)]))
        {
            //加载facade类
            return class_alias($this->facade[basename($file)], $class);
        }
    }
}