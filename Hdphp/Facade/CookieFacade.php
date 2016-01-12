<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class CookieFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Cookie';
	}
}