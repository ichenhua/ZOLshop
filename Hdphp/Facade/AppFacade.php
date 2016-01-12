<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class AppFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'App';
	}
}