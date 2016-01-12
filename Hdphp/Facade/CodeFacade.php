<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class CodeFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Code';
	}
}