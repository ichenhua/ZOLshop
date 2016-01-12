<?php namespace Hdphp\Api;

/**
 * Class Api
 *
 * @package Hdphp\Api
 */
class Api{

	//错误
	protected $error = '未知错误';

	/**
	 * 获取错误信息
	 * @return string
	 */
	public function getError()
	{
		$error = $this->error;
		$this->error = '';
		return $error;
	}
}