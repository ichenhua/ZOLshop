<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class DataFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Data';
	}
}