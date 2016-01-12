<?php namespace Hdphp\Config;


//配置项处理
class config{
	
	//配置集合
	protected $items=array();

	/**
	 * 添加配置
	 * @param [type] $key  [description]
	 * @param [type] $name [description]
	 */
	public function set($key,$name)
	{
		$tmp=&$this->items;
		foreach(explode('.',$key) as $d)
		{
			if(!isset($tmp[$d]))
			{
				$tmp[$d]=array();
			}
			$tmp = &$tmp[$d];
		}
		
		$tmp=$name;
		return true;
	}

	/**
	 * 获取配置
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function get($key)
	{
		$tmp=$this->items;
		foreach(explode('.',$key) as $d)
		{
			if(isset($tmp[$d]))
			{
				$tmp=$tmp[$d];	
			}
			else
			{
				return false;
			}
		}
		return $tmp;
	}
	
	/**
	 * 检测配置是否存在
	 * @param  [type]  $key [description]
	 * @return boolean      [description]
	 */
	public function has($key)
	{
		$tmp=$this->items;
		foreach(explode('.',$key) as $d)
		{
			if(isset($tmp[$d]))
			{
				$tmp=$tmp[$d];	
			}
			else
			{
				return false;
			}
		}
		return true;
	}

	//获取所有配置项
	public function all()
	{
		return $this->items;
	}

	/**
	 * 设置items也就是一次更改全部配置
	 * @param array $data 所有配置
	 */
	public function setItems($items)
	{
		return $this->items=$items;
	}
}