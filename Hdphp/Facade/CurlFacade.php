<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class CurlFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Curl';
	}
}