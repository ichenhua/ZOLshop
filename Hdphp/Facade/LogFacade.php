<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class LogFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Log';
	}
}