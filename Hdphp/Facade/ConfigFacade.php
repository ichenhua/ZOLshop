<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ConfigFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Config';
	}
}