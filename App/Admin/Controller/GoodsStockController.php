<?php namespace Admin\Controller; 

use Admin\Model\GoodsStock;

//测试控制器
class GoodsStockController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{
		$this->db = new GoodsStock;
	}
	
    //首页列出全部数据
    public function index(){
        //获取商品信息
        $goods = new \Admin\Model\Goods;
        $goodsData = $goods->getOne();
        View::with('goodsData',$goodsData);

        //获取商品属性值
        $goods_attr = new \Admin\Model\GoodsAttr;
        $attrData = $goods_attr->groupAttr($goodsData['goods_id']);
        View::with('attrData',$attrData);

        //获取商品规格标题
        $attrName = $goods_attr->getAttrName($goodsData['goods_id']);
        View::with('attrName',$attrName);

		View::make();	
    }

    //添加库存设置
    public function add(){
        foreach ($_POST['stock_attr'] as $k => $v) {
            if($s=$this->db->where('stock_attr',$_POST['stock_attr'][$k])->first()){
                //以前设置了库存信息，更新库存
                $data['stock_attr'] = $_POST['stock_attr'][$k];
                $data['stock_goods_sn'] = $_POST['stock_goods_sn'][$k];
                $data['stock_count'] = $_POST['stock_count'][$k];
                $data['goods_id'] = $_POST['goods_id'];
                $data['stock_id'] = $s['stock_id'];
                $this->db->save($data);
            }else{
                if($_POST['stock_count'][$k]){
                    //没有设置过库存信息，新增库存信息，排除库存为0的组合
                    $data['stock_attr'] = $_POST['stock_attr'][$k];
                    $data['stock_goods_sn'] = $_POST['stock_goods_sn'][$k];
                    if(!$data['stock_goods_sn']){
                        $data['stock_goods_sn'] = 'gd'.time().rand(100,999);
                    }
                    $data['stock_count'] = $_POST['stock_count'][$k];
                    $data['goods_id'] = $_POST['goods_id'];
                    unset($data['stock_id']); //卸载上溢出的stock_id值
                    Db::table('goods_stock')->insert($data);
                }
            }
        }
        $this->success('库存信息更新成功','Goods/index');
    }

}
