<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class UploadFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Upload';
	}
}