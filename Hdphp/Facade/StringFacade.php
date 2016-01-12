<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class StringFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'String';
	}
}