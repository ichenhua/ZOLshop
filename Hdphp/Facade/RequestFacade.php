<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class RequestFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Request';
	}
}