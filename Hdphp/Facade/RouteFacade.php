<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class RouteFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Route';
	}
}