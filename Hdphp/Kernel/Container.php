<?php namespace Hdphp\Kernel;

// .-----------------------------------------------------------------------------------
// |  Software: [HDPHP framework]
// |      Site: http://www.hdphp.com
// |-----------------------------------------------------------------------------------
// |    Author: 向军 <2300071698@qq.com>
// | Copyright (c) 2012-2019, http://houdunwang.com. All Rights Reserved.
// |-----------------------------------------------------------------------------------
// |   License: http://www.apache.org/licenses/LICENSE-2.0
// '-----------------------------------------------------------------------------------

use Closure;
use ArrayAccess;
use Exception;
use ReflectionClass;
use ReflectionMethod;
use ReflectionFunction;
use ReflectionParameter;
use InvalidArgumentException;

class Container implements ArrayAccess{

	//绑定实例
	public $bindings=array();

    //单例服务
    public $instances=array();
    
	/**
	 * 绑定到容器
	 * @param  [type]  $name    [别名]
	 * @param  [type]  $closure [服务生成闭包函数]
	 * @param  boolean $shared  [单例]
	 * @return [type]           [description]
	 */
	public function bind($name,$closure,$force=false)
	{
		$this->bindings[$name]= compact('closure','force');
	}

    /**
     * 注册单例服务
     * @param  [type] $name    [description]
     * @param  [type] $closure [description]
     * @return [type]          [description]
     */
    public function single($name,$closure)
    {
        $this->bind($name,$closure,true);
    }

    /**
     * 单一实例
     * @param  [type] $name [服务别名或类]
     * @return [type]       [description]
     */
    public function instance($name,$object)
    {
        $this->instances[$name]=$object;
    }

	/**
	 * 获取实例
	 * @param  [type] $name [服务别名或类]
	 * @return [type]       [description]
	 */
	public function make($name,$force=false)
	{
        if(isset($this->instances[$name]))
        {
            return $this->instances[$name];
        }
        //获得实现提供者
        $closure = $this->getClosure($name);

        //获取实例
        $object = $this->build($closure);

        if(isset($this->bindings[$name]['force']) && $this->bindings[$name]['force'] || $force)
        {
            $this->instances[$name]=$object;
        }

        return $object;
    }

    /**
     * 获得实例实现
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    private function getClosure($name)
    {
        return isset($this->bindings[$name])?$this->bindings[$name]['closure']:$name;
    }

    /**
     * 自动绑定（Autowiring）自动解析（Automatic Resolution）
     * @param  String $k 键名
     * @return Object 
     */
    protected function build($className)
    {
    	//匿名函数
        if($className instanceof Closure)
        {
            //执行闭包函数
            return $className($this);
        }

    	//获取类信息
        $reflector = new ReflectionClass($className);

    	// 检查类是否可实例化, 排除抽象类abstract和对象接口interface
        if (!$reflector->isInstantiable()) 
        {
            throw new Exception("$className 不能实例化.");
        }

        //获取类的构造函数
        $constructor = $reflector->getConstructor();

        //若无构造函数，直接实例化并返回
        if (is_null($constructor)) 
        {
            return new $className;
        }

        //取构造函数参数,通过 ReflectionParameter 数组返回参数列表
        $parameters = $constructor->getParameters();

        //递归解析构造函数的参数
        $dependencies = $this->getDependencies($parameters);

        //创建一个类的新实例，给出的参数将传递到类的构造函数。
        return $reflector->newInstanceArgs($dependencies);
    }

    /**
     * 递归解析构造函数的参数
     * @param  构造函数参数 $parameters
     * @return array
     */
    protected function getDependencies($parameters)
    {
        $dependencies = array();
        
        //参数列表
        foreach ($parameters as $parameter) 
        {
            //获取参数类型
            $dependency = $parameter->getClass();
            
            if (is_null($dependency)) 
            {
                // 是变量,有默认值则设置默认值
                $dependencies[] = $this->resolveNonClass($parameter);
            } 
            else 
            {
                // 是一个类，递归解析
                $dependencies[] = $this->build($dependency->name);
            }
        }

        return $dependencies;
    }

    /**
     * 提取参数默认值
     * @param  [type] $parameter [description]
     * @return [type]            [description]
     */
    protected function resolveNonClass($parameter)
    {
        // 有默认值则返回默认值
        if ($parameter->isDefaultValueAvailable()) 
        {
            return $parameter->getDefaultValue();
        }

        throw new Exception('参数无默认值，无法实例化');
    }

    public function offsetExists($key)
    {
        return isset($this->bindings[$key]);
    }

    public function offsetGet($key)
    {
        return $this->make($key);
    }

    public function offsetSet($key,$value)
    {
        if ( ! $value instanceof Closure)
        {
            $value = function() use ($value){
                return $value;
            };
        }

        $this->bind($key, $value);
    }

    public function offsetUnset($key)
    {
        unset($this->bindings[$key], $this->instances[$key]);
    }

    /**
     * 魔术方法
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function __get($key)
    {
        return $this[$key];
    }

    /**
     * 魔术方法
     * @param [type] $key   [description]
     * @param [type] $value [description]
     */
    public function __set($key,$value)
    {
        $this[$key]=$value;
    }
}