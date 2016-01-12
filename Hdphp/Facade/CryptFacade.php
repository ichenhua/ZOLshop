<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class CryptFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Crypt';
	}
}