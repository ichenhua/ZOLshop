<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ResponseFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Response';
	}
}