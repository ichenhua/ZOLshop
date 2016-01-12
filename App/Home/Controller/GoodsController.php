<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class GoodsController extends Controller{

	protected $tpl;
    protected $db;
	//构造函数
	public function __init()
	{
		$this->tpl = 'templates/zol/';
        $this->db = new \Home\Model\Goods;
	}
	
    //动作
    public function index(){
    	//商品主要数据
        $goodsData = $this->db->getOne(Q('goods_id'));
        if(!$goodsData){
            echo '没有此商品记录';exit;
        }
        View::with('goodsData',$goodsData);

        //最近浏览
        $viewData = $this->db->recentView();
        View::with('viewData',$viewData);

        //最新发布商品
        $new = $this->db->getNew();
        View::with('new',$new);

        //缩略图数据
        $pics = new \Home\Model\Pics;
        $picsData = $pics->getAll(Q('goods_id'));
        View::with('picsData',$picsData);

        //商品属性数据
        $im_attr = Db::table('goods_attr ga')->join('shop_attr sa','ga.attr_id','=','sa.attr_id')->where('goods_id',Q('goods_id'))->where('sa.attr_type',2)->groupBy('sa.attr_id')->get();
        View::with('im_attr',$im_attr);

        //取当前商品的全部规格属性
        $goods_attr = Db::table('goods_attr')->where('goods_id',$goodsData['goods_id'])->get();
        View::with('goods_attr',$goods_attr);

        //全部商品分类
        $cate = new \Home\Model\Cate;
        $cateData = $cate->getChan();
        // p($cateData);
        View::with('cateData',$cateData);

        //分配相关分类
        $data = $cate->getAll();
        $d = Data::parentChannel($data, $goodsData['cate_id'], 'cate_id', 'pid');
        foreach ($d as $key => $v) {
            if($v['pid']==0){
                $cateRel = $cate->getRel($v['cate_id']);
            }
        }
        View::with('cateRel',$cateRel);

    	View::make($this->tpl.'goods.html');
    }


    //购物车缓存
    //1、判断是否有购物车历史数据，没有则初始化为空数组
    //2、如果商品id和属性在历史数据中存在，则不重新添加
    //3、如果商品id和属性在历史数据中不存在，则压入数据到购物车
    public function saveCart(){
        $cart = isset($_SESSION['cart'])?$_SESSION['cart']:array();
        $total_price = 0;
        $has = 0; //初始化，购物车中不存在该商品组合
        foreach ($cart as $k => $v) {
            if($v['goods_id']==$_POST['cart']['goods_id']&&$v['stock_attr']==$_POST['cart']['stock_attr']) {
                $has = 1; //购物车中已存在该商品组合
            }
            $total_price += $v['buy_num']*$v['goods_price'];
        }
        //判断购物车是否已经有了商品
        if($has){
            View::ajax(array('code'=>1,'num'=>sizeof($cart),'total_price'=>$total_price,'message'=>'购物车中已存在该商品'));
        }else{
            $cart[] = $_POST['cart'];
            $_SESSION['cart'] = $cart;
            $total_price += $_POST['cart']['buy_num']*$_POST['cart']['goods_price'];
            View::ajax(array('code'=>0,'num'=>sizeof($cart),'total_price'=>$total_price,'message'=>'商品已成功添加至购物车'));
        }
    }

    //购物车列表
    public function cart()
    {
        //分配模板文件配置
        $tplData['title']="购物车";
        $tplData['css']="cart";
        View::with('tplData',$tplData);

        $cart = isset($_SESSION['cart'])?$_SESSION['cart']:array();
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
        View::make($this->tpl.'cart.html');
    }

    //删除购物车数据
    public function delCart()
    {
        $id = Q('id');
        unset($_SESSION['cart'][$id]);
        $price = 0;
        foreach ($_SESSION['cart'] as $k => $v) {
            $price += $v['buy_num']*$v['goods_price'];
        }

        View::ajax(array('code'=>0,'num'=>sizeof($_SESSION['cart']),'total_price'=>$price));
    }

}
