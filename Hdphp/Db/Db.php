<?php namespace Hdphp\Db;

//配置项处理
class Db{
	
	protected $link=array();
	
	public function __construct()
	{
	}

	/**
	 * 魔术方法
	 * @param  [type] $method [description]
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public function __call($method,$params)
	{

		$driver ='\Hdphp\Db\\'.ucfirst(Config::get('database.read.driver'));
		
		$instance = new $driver;
		
		return call_user_func_array(array($instance,$method), $params);
	}
	
}