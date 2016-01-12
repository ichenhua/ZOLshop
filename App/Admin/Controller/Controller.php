<?php namespace Admin\Controller; 

//权限控制器
class Controller extends \Hdphp\Controller\Controller{
	public function __construct()
	{
		if(!$_SESSION['user_id']){
			go('Login/index');
		}
		parent::__construct();
	}
}
