<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class StockController extends Controller{

    protected $db;
	//构造函数
	public function __init()
	{
        $this->db = new \Home\Model\Stock;
	}
	
    public function getNum()
    {
        $stock = $this->db->getNum(Q('stock_attr'),Q('goods_id'));
        View::ajax($stock);
    }
}
