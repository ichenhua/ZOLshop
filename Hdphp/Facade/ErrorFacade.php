<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ErrorFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Error';
	}
}