<?php namespace Admin\Model;

use Hdphp\Model\Model;

class Admin extends Model{

	//数据表
	protected $table = "shop_admin";

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		array('username','required','用户名不能为空',1,3),
		array('password','required','密码不能为空',3,3),
		array('code','required','验证码不能为空',1,3),
		array('password_o','required','原密码不能为空',1,3),
		array('password','confirm:password_c','两次密码不一致',1,2),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		array('password','md5','function',3,3),
	);

	public function login()
	{
		if($this->create()){
			if(strtoupper($_POST['code'])!=$_SESSION['code']){
				$this->error = '验证码错误';
				return false;
			}
			$admin = Db::table('shop_admin')->where('username',$_POST['username'])->first();
			if(!$admin){
				$this->error = '用户名不存在';
				return false;
			}
			if($admin['password']!=md5($_POST['password'])){
				$this->error = '密码错误';
				return false;
			}
			$data['id'] = $admin['id'];
			$data['login_in'] = time();
			$data['login_ip'] = $_SERVER['REMOTE_ADDR'];
			$this->save($data);
			$_SESSION['user_id'] = $admin['id'];
			$_SESSION['username'] = $admin['username'];
			return true;
		}else{
			return false;
		}
	}


	public function password()
	{
		if($this->create()){
			$password = Db::table('shop_admin')->where('id',$_SESSION['user_id'])->pluck('password');
			if($password!=md5($_POST['password_o'])){
				$this->error = '原密码错误';
				return false;
			}
			$this->save();
			return true;
		}else{
			return false;
		}
	}

	//时间操作
	protected $timestamps=false;

	//允许插入的字段
	protected $insertFields=array();

	//允许更新的字段
	protected $updateFields=array();

	//前置方法 比如: _before_add 为添加前执行的方法
	protected function _before_add(){}
	protected function _before_delete(){}
	protected function _before_save(&$data){}

	protected function _after_add(){}
	protected function _after_delete(){}
	protected function _after_save(){}

}