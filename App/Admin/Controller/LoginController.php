<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;
use Admin\Model\Admin;

//测试控制器
class LoginController extends Controller{

	protected $db;

	//构造函数
	public function __init()
	{
		$this->db = new Admin;
	}
	
    //动作
    public function index(){
    	if(IS_POST){
    		if($this->db->login()){
                go('Index/index');
            }else{
                $this->error($this->db->getError());
            }
    	}else{
    		View::make();
    	}
    }

    //修改密码
    public function password(){
        if(IS_POST){
            if($this->db->password()){
                $this->success('密码修改成功');
            }else{
                $this->error($this->db->getError());
            }
        }else{
            View::make();
        }
    }

    //验证码
    public function code(){
    	Code::make();
    }

    //注销登陆
    public function out(){
        session_unset();
        session_destroy();
        go('index');
    }
}
