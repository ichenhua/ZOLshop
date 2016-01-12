<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class OrderController extends Controller{

    protected $db;
    protected $tpl;
	//构造函数
	public function __init()
	{
        $this->db = new \Home\Model\Order;
        $this->tpl = 'templates/zol/';
	}
	
    public function getNum()
    {
        $sto = new \Home\Model\Stock;
        $stock = $sto->getNum(Q('stock_attr'),Q('goods_id'));
        View::ajax($stock);
    }


    //订单列表页面
    public function lists()
    {
        if(!isset($_SESSION['user']['user_id'])){
            go('Home/User/login');
        }
        
        //分配模板文件配置
        $tplData['title']="购物车";
        $tplData['css']="cart|order";
        View::with('tplData',$tplData);

        //购物车列表信息
        $cart = $_SESSION['cart'];
        $price = 0;
        foreach ($cart as $k => $v) {
            $cart[$k]['goods'] = Db::table('goods')->where('goods_id',$v['goods_id'])->first();
            $attrs = explode('-', $v['stock_attr']);
            foreach ($attrs as $key => $value) {
                $attrs[$key] = Db::table('goods_attr')->where('goods_attr_id',$value)->first();
                $attrs[$key]['attr_name'] = Db::table('shop_attr')->where('attr_id',$attrs[$key]['attr_id'])->pluck('attr_name');
            }
            $cart[$k]['attr'] = $attrs;
            $price += $v['goods_price']*$v['buy_num']; //总价
        }
        View::with('cart',$cart);
        View::with('price',$price);

        //收货地址列表
        $address = new \Home\Model\Address;
        $addressData = $address->getAll();
        View::with('addressData',$addressData);
        // p($addressData);

        View::make($this->tpl.'order.html');
    }


    public function add()
    {
        if($this->db->store()){
            $this->success('订单提交成功','pay');
        }else{
            $this->error('订单提交失败',$this->db->getError());
        }
        
    }


    public function pay()
    {
        //分配模板文件配置
        $tplData['title']="在线支付";
        $tplData['css']="cart|pay";
        View::with('tplData',$tplData);
        View::make($this->tpl.'pay.html');
    }



}
