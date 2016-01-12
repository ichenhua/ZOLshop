<?php namespace Home\Model;

use Hdphp\Model\Model;

class Address extends Model{

	//数据表
	protected $table = "shop_address";

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		array('add_name','required','收货人不能为空',3,3),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		array('user_id','getUserId','method',3,1),
	);

	public function getUserId()
	{
		return $_SESSION['user']['user_id'];
	}


	public function getAll()
	{
		return $this->where('user_id',$_SESSION['user']['user_id'])->orderBy('is_default','DESC')->get();
	}


	//添加和修改收货地址
	public function store(){
		if($this->create()){
			if($_POST['add_id']){
				if($this->save()){
					return $_POST['add_id'];
				}
			}else{
				unset($_POST['add_id']);
				return $this->add();
			}
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