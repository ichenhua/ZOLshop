<?php namespace Home\Model;

use Hdphp\Model\Model;

class Order extends Model{

	//数据表
	protected $table = "order";

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		//array('字段名','验证方法','提示信息',验证条件,验证时间),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		array('create_at','time','function',3,1),
		array('order_user_id','getUserId','method',3,1),
	);

	//获取用户id
	protected function getUserId(){
		return $_SESSION['user']['user_id'];
	}

	public function store()
	{
		$data['order_sn'] = 'ch'.time().rand(100,999); //生成随机的订单号
		$data['order_remark'] = $_POST['remark']; //备注
		$data['order_add_id'] = $_POST['add_id']; //收货地址id

		//将缓存订单情况发送到商品订单列表模型处理，返回总价
		$list = new \Home\Model\OrderList;
		$price = $list->store($_POST['cart'],$data['order_sn']);

		$data['order_price'] = $price;

		if($this->create($data)){
			return $this->add();
		}
	}


// order_id  自动编号

// order_add_id  收货地址id

// order_price  总价

// order_remark  备注

// create_at  创建时间
// order_sn  自动生成
// order_user_id  用户id

// order_state 订单状态

        //购物车中的id $_POST['cart']
        // Array
// (
//     [cart] => Array
//         (
//             [0] => 2
//             [1] => 4
//             [2] => 9
//             [3] => 10
//         )

//     [remark] => 今天发货
//     [add_id] => 2
// )


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

