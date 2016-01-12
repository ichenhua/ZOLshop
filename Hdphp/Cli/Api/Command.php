<?php namespace Hdphp\Cli\Api;

class Command{
	/**
	 * 创建模型或控制器
	 * @return [type] [description]
	 */
	public function make($arg)
	{
		$info = explode('.',$arg);
		$MODULE = ucfirst($info[0]);
		$API = ucfirst($info[1]);
		$file = APP_PATH.'/'.$MODULE.'/Api/'.ucfirst($API).'.php';
		echo $file."\n";
echo APP_PATH.'/'.$MODULE.'/Api';
		//判断目录
		if(!is_dir(APP_PATH.'/'.$MODULE.'/Api'))
		{
			die("Directory does not exist\n");
		}

		//创建模型文件
		if(is_file($file))
		{
			die("Api file already exists\n");
		}
		else
		{
			$data = file_get_contents(__DIR__.'/Api.php');
			$data = str_replace(array('{{MODULE}}','{{API}}'),
				array($MODULE,$API), $data);
			file_put_contents($file, $data);
		}
	}
}