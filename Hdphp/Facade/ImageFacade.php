<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class ImageFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Image';
	}
}