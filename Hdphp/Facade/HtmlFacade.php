<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class HtmlFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Html';
	}
}