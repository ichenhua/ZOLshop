<?php namespace Home\Model;

use Hdphp\Model\Model;

class OrderList extends Model{

	//数据表
	protected $table = "order_list";

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
		//array('字段名','处理方法','方法类型',验证条件,验证时间),
	);


	//存储商品列表
	public function store($cart,$order_sn)
	{
		$price = 0;
		foreach ($_SESSION['cart'] as $k => $v) {
			if(in_array($k, $cart)){
				$data['goods_id'] = $v['goods_id'];
				$data['goods_attr'] = $v['stock_attr'];
				$data['buy_num'] = $v['buy_num'];
				$data['list_price'] = $v['goods_price'];
				$data['order_sn'] = $order_sn;
				$this->add($data);
				$price += $v['goods_price'];
			}
		}
		return $price;
	}

    // [2] => Array
    //     (
    //         [goods_id] => 2
    //         [stock_attr] => 9-10-12
    //         [buy_num] => 1
    //         [goods_price] => 2300.00
    //     )


//list_id 自动编号
// goods_id 商品id
// goods_attr 属性组合id
// buy_num 购买数量
// list_price 价格小计

// order_id 订单id
// order_sn 订单号(废弃)


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