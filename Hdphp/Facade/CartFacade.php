<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class CartFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Cart';
	}
}