<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class XmlFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Xml';
	}
}