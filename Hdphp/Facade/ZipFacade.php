<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ZipFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Zip';
	}
}