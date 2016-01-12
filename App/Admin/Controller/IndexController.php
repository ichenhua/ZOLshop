<?php namespace Admin\Controller; 

//测试控制器
class IndexController extends Controller{

	//构造函数
	public function __init()
	{
	}
	
    //动作
    public function index(){
    	View::make();
    }
}
