<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class DirFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Dir';
	}
}