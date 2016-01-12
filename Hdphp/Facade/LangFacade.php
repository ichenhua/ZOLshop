<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class LangFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Lang';
	}
}