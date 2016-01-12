<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ModelFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Model';
	}
}