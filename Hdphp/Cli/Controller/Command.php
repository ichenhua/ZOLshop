<?php namespace Hdphp\Cli\Controller;

class Command{
	/**
	 * 创建控制器
	 * @param  string $arg  路径
	 * @param  string $type 参数 base 基本 resource 资源
	 * @return void
	 */
	public function make($arg,$type='base')
	{
		$info = explode('.',$arg);
		$MODULE = ucfirst($info[0]);
		$CONTROLLER = ucfirst($info[1]);
		$file = APP_PATH.'/'.$MODULE.'/Controller/'.ucfirst($CONTROLLER).'Controller.php';

		//判断目录
		if(!is_dir(APP_PATH.'/'.$MODULE.'/Controller')) 
		{
			die("Directory does not exist\n");
		}

		//创建模型文件
		if(is_file($file))
		{
			die("Controller file already exists\n");
		}
		else
		{
			$namespace = $MODULE.'\\Controller';

			$data = file_get_contents(__DIR__.'/'.strtolower($type).'.php');
			$data = str_replace(array('{{MODULE}}','{{CONTROLLER}}'), 
				array($MODULE,$CONTROLLER), $data);
			file_put_contents($file, $data);
		}
	}
}