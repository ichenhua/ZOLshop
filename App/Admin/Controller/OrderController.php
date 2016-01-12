<?php namespace Admin\Controller; 

use Admin\Model\Order;

//测试控制器
class OrderController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{

		$this->db = new Order;
	}
	
    //获取全部订单
    public function lists()
    {
        $order = $this->db->getAll();
        View::with('order',$order)->make();
    }
}
