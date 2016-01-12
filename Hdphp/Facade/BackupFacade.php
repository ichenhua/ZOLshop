<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class BackupFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Backup';
	}
}