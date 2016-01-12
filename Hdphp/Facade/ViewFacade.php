<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ViewFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'View';
	}
}