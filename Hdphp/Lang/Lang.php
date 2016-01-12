<?php namespace Hdphp\Lang;

use ArrayAccess;

class Lang{

	private $data;

	public function __construct()
	{
		$this->data = require APP_PATH.'/Common/Lang/'.Config::get('app.lang').'.php';
	}

	//获取语言
	public function get($lang)
	{
		return $this->data[$lang];		
	}

	//更改语言包
	public function lang($lang)
	{
		$this->data = require APP_PATH.'/Common/Lang/'.$lang.'.php';
		return $this;
	}
}