<?php namespace Home\Model;

use Hdphp\Model\Model;

class User extends Model{

	//数据表
	protected $table = "shop_user";

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
		array('password_c','confirm:password','两次密码输入不一致',1,3),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		array('password','md5','function',3,3),
		array('create_at','time','function',3,1),
		array('login_in','time','function',3,3),
		array('login_ip','getLoginIp','method',3,3),
		array('token','getToken','method',3,1),
	);


	/*
	 * 根据当前用户注册时间生成token值
	 * @return [string] [8位字符串]
	 */
	public function getToken()
	{
		//取当前时间戳的md5加密后的最后8位数字
		return substr(md5(time()), -8);
	}


	/**
	 * 获取用户登陆真实IP地址
	 * @return [string] [返回真实字符串]
	 */
	public function getLoginIp()
	{
        $onlineip=''; 
        if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')){ 
            $onlineip=getenv('HTTP_CLIENT_IP'); 
        } elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')){ 
            $onlineip=getenv('HTTP_X_FORWARDED_FOR'); 
        } elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown')){ 
            $onlineip=getenv('REMOTE_ADDR'); 
        } elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')){ 
            $onlineip=$_SERVER['REMOTE_ADDR']; 
        } 
        return $onlineip; 
	}

	//用户注册
	public function reg()
	{
		if(strtoupper($_POST['code'])!=$_SESSION['code']){
			$this->error = '验证码输入错误';
			return false;
		}
		if($this->create()){
			if($r = $this->add()){
				$_SESSION['user']['user_id'] = $r;
				$_SESSION['user']['username'] = $_POST['username'];
				return true;
			}
		}else{
			return false;
		}
	}

	//用户登陆
	public function login()
	{
		$user = $this->where('username',Q('username'))->first();
		if(!$user){
			$this->error = '用户名不存在';
			return false;
		}else{
			if($user['password']!=md5($_POST['password'])){
				$this->error = '密码错误';
				return false;
			}else{
				$_SESSION['user']['user_id'] = $user['user_id'];
				$_SESSION['user']['username'] = $user['username'];
				return true;
			}
		}
	}

	//获取指定ID的用户信息
	public function getOne($user_id)
	{
		return $this->where('user_id',$user_id)->first();
	}


	//修改密码
	public function password()
	{
		$user = $this->getOne($_SESSION['user']['user_id']);
		if(md5($_POST['password_o'])!=$user['password']){
			$this->error = '原密码输入错误';
			return false;
		}else{
			$_POST['user_id'] = $_SESSION['user']['user_id'];
			if($this->create()){
				return $this->save();
			}else{
				return false;
			}
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