<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class PageFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Page';
	}
}