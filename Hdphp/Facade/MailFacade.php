<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class MailFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Mail';
	}
}