<?php namespace Admin\Model;

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
		//array('goods_name','required','商品名称不能为空',3,3),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		//array('create_at','time','function',3,1),
	);

	//获取单挑图集信息
	public function getAll(){
        $order = Db::table('order')->orderBy('order_id','DESC')->get();
        foreach ($order as $k => $v) {
            //获取订单下的订单列表
            $order_list = Db::table('order_list')->where('order_sn',$v['order_sn'])->get();
            //获取商品信息，属性信息
            foreach ($order_list as $m => $n) {
                //压入商品信息
                $order_list[$m]['goods_info'] = Db::table('goods')->where('goods_id',$n['goods_id'])->first();
                //压入属性列表
                $attr = explode('-', $n['goods_attr']);
                $a = array(); //初始化，防止多次叠加
                foreach ($attr as $key => $value) {
                    $a[] = Db::table('goods_attr')->where('goods_attr_id',$value)->pluck('goods_attr_value');
                }
                $order_list[$m]['attr_info'] = implode('-', $a);
            }
            $order[$k]['order_list'] = $order_list;
        }
        return $order;
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