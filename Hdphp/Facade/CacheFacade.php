<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class CacheFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Cache';
	}
}