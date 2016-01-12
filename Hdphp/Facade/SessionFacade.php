<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class SessionFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Session';
	}
}