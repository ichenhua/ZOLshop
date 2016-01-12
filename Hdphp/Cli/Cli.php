<?php namespace Hdphp\Cli;

//命令行模式
class Cli{
	/**
	 * 运行
	 * @return [type] [description]
	 */
	public static function run()
	{
		$instance = new self;
		//去掉hd
		array_shift($_SERVER['argv']);
		$info = explode(':',array_shift($_SERVER['argv']));

		//类文件
		$file = 'Hdphp/Cli/'.ucfirst($info[0]).'/Command.php';
		if(!is_file($file))
		{
			die('Command does not exist');
		}
		else
		{
			require $file;
		}
		//命令类
		$class = 'Hdphp\\Cli\\'.ucfirst($info[0]).'\Command';
		$action = $info[1];
		//实例
		$instance = new $class();
		if(method_exists($instance, $info[1]))
		{
		call_user_func_array(array($instance,$info[1]), $_SERVER['argv']);
		}
		else
		{
			die("$info[1] method not found\n");
		}
	}
}


