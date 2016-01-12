<?php namespace Hdphp\Cli\Model;

class Command{
	/**
	 * 创建模型或控制器
	 * @return [type] [description]
	 */
	public function make($arg)
	{
		$info = explode('.',$arg);
		$MODULE = ucfirst($info[0]);
		$MODEL = ucfirst($info[1]);
		$TABLE = strtolower($MODEL);
		$file = APP_PATH.'/'.$MODULE.'/Model/'.ucfirst($MODEL).'.php';

		//判断目录
		if(!is_dir(APP_PATH.'/'.$MODULE.'/Model')) 
		{
			die("Directory does not exist\n");
		}

		//创建模型文件
		if(is_file($file))
		{
			die("Model file already exists\n");
		}
		else
		{
			$namespace = $MODULE.'\\Model';

			$data = file_get_contents(__DIR__.'/Model.php');
			$data = str_replace(array('{{MODULE}}','{{MODEL}}','{{TABLE}}'), 
				array($MODULE,$MODEL,$TABLE), $data);
			file_put_contents($file, $data);
		}
	}
}