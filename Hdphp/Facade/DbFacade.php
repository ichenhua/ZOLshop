<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class DbFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Db';
	}
}