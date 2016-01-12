<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class RbacFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Rbac';
	}
}