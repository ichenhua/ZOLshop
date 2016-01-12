<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ArrFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Arr';
	}
}