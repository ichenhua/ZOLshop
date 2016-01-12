<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class WeixinFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Weixin';
	}
}