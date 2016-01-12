<?php namespace Home\Controller;

use Hdphp\Controller\Controller;

require 'App/Home/Function/functions.php';

//测试控制器
class ListsController extends Controller{

    protected $tpl;
	protected $db;

	//构造函数
	public function __init()
	{
		$this->tpl = 'templates/zol/';
        $this->db = new \Home\Model\Cate;
	}

    //列表页
    public function index(){
        //组装地址后缀
        if(!isset($_GET['s'])){
            $this->formatUrl();
        }

        //读取当前分类信息
        $field = $this->db->getOne(Q('cate_id'));
        View::with('field',$field);

        //读取当前分类下的所有品牌
        $brand = new \Home\Model\Brand;
        $brandData = $brand->getRel(Q('cate_id'));
        View::with('brandData',$brandData);

        //读取该分类下所有商品对应的规格属性
        $cateAttr = $this->assignCateAttr();
        View::with('cateAttr',$cateAttr);

        //根据筛选条件分配商品信息
        $goodsData = $this->getGoods();
        View::with('goodsData',$goodsData);

        //全部商品分类
        $cateData = $this->db->getChan();
        // p($cateData);
        View::with('cateData',$cateData);

        //分配相关分类
        $data = $this->db->getAll();
        $d = Data::parentChannel($data, $_GET['cate_id'], 'cate_id', 'pid');
        foreach ($d as $key => $v) {
            if($v['pid']==0){
                $cateRel = $this->db->getRel($v['cate_id']);
            }
        }
        View::with('cateRel',$cateRel);

        //最近浏览商品
        $goods = new \Home\Model\Goods;
        $viewData = $goods->recentView();
        View::with('viewData',$viewData);

        //最新发布商品
        $new = $goods->getNew();
        View::with('new',$new);

        View::make($this->tpl.'lists.html');
    }

    //组装网址路径
    protected function formatUrl(){
        $attr = $this->getCateAttr();
        //根据属性值组数，指定参数个数
        foreach ($attr as $key => $value) {
            $attrUrl[] = 0; 
        }
        $s = implode('-', $attrUrl);
        $url = __URL__.'&s='.$s;
        go($url);
    }

    //读取该分类下所有商品对应的规格属性
    protected function assignCateAttr(){
        $attr = $this->getCateAttr();
        //遍历将属性值重组读出对应id，保证每个读出来的属性都有索引结果
        foreach ($attr as $k => $v) {
            $attr[$k]['attr_value'] = Db::table('goods_attr')->where('attr_id',$v['attr_id'])->groupBy('goods_attr_value')->get();
        }
        return $attr;
    }

    //获取当前分类的所有规格
    protected function getCateAttr(){
        //获取当前分类信息
        $cate = Db::table('shop_cate')->where('cate_id',Q('cate_id'))->first();
        //根据当前分类，读取所有规格
        $attr = Db::table('shop_attr')->where('shop_type_id',$cate['type_id'])->where('attr_type',2)->get();
        return $attr;
    }

    protected function getGoods(){
        //读取当前路径参数条件下的所有商品
        $args = explode('-', $_GET['s']); //拆解路径
        $args = array_filter($args); //过滤没有筛选条件属性


        $brand = Q('brand_id')?' and brand_id='.Q('brand_id'):''; //添加品牌筛选条件

        //添加价格筛选条件
        if(!Q('price_level')){
            //价格等级为0时,不添加筛选条件
            $price = '';
        }else{
            $price_level = explode('-', Q('price_level'));
            if(sizeof($price_level)==1){
                $price = ' and goods_price>'.$price_level[0];
            }else{
                $price = ' and goods_price between '.$price_level[0].' and '.$price_level[1];
            }
        }

        //A:如果规格中有相同的属性值，可能会出现问题
        //B:如果多个分组公用同一个类型时，可能会出现重复的情况
        if($args){
            $v = "('".implode("','",$args)."')";

            $sql = "select * from hd_goods_attr ga 
                    left join hd_goods g 
                    on ga.goods_id=g.goods_id 
                    where ga.goods_attr_value in ".$v." 
                    and g.cate_id=".Q('cate_id').$brand.$price." 
                    group by g.goods_id 
                    having count(*)=".sizeof($args);

            $goods_count = sizeof(Db::select($sql));
            $page = Page::make($goods_count); //分页

            $sql = "select * from hd_goods_attr ga 
                    left join hd_goods g 
                    on ga.goods_id=g.goods_id 
                    where ga.goods_attr_value in ".$v." 
                    and g.cate_id=".Q('cate_id').$brand.$price." 
                    group by g.goods_id 
                    having count(*)=".sizeof($args)." 
                    limit ".Page::limit();
                    // echo $sql;
            $data = Db::select($sql);

            // //查询商品属性表，找出当前分类、满足筛选条件的记录
            // $goods = Db::table('goods_attr')->whereIn('goods_attr_value',$args)->groupBy('goods_id')->having('count(*)','=',sizeof($args))->get();

            // $page = Page::make(sizeof($goods)); //分页

            // //根据分页限制获取商品
            // $goods_limit = Db::table('goods_attr')->whereIn('goods_attr_value',$args)->groupBy('goods_id')->having('count(*)','=',sizeof($args))->limit(Page::limit())->get();

            // foreach ($goods_limit as $k => $v) {
            //     //根据查出的ID反查出商品信息
            //     $data[$k]= Db::table('goods')->where('goods_id',$v['goods_id'])->where('cate_id',$_GET['cate_id'])->first();
            // }
        }else{
            $brand = Q('brand_id')?' and brand_id='.Q('brand_id'):''; //添加品牌筛选条件
            $sql = "select * from hd_goods where cate_id=".Q('cate_id').$brand.$price;
            $goods_count = sizeof(Db::select($sql));
            $page = Page::make($goods_count); //分页

            $sql = "select * from hd_goods where cate_id=".Q('cate_id').$brand.$price." limit ".Page::limit();
            $data = Db::select($sql);

            // $goods_count = sizeof(Db::select($sql));
            // $page = Page::row(2)->make($goods_count); //分页

            // $sql = "select * from hd_goods_attr ga 
            //         left join hd_goods g 
            //         on ga.goods_id=g.goods_id 
            //         where ga.goods_attr_value in ".$v." 
            //         and g.cate_id=".Q('cate_id').$brand." 
            //         group by g.goods_id 
            //         having count(*)=".sizeof($args)." 
            //         limit ".Page::limit();
            // echo $sql;
            // $data = Db::select($sql);

            // //查询商品找出当前分类的记录
            // $goods = Db::table('goods')->where('cate_id',$_GET['cate_id'])->get();
            // $page = Page::make(sizeof($goods)); //分页

            // //根据分页限制获取商品
            // $goods_limit = Db::table('goods')->where('cate_id',$_GET['cate_id'])->limit(Page::limit())->get();

            // foreach ($goods_limit as $k => $v) {
            //     //根据查出的ID反查出商品信息
            //     $data[$k]= Db::table('goods')->where('goods_id',$v['goods_id'])->first();
            // }
        }
        $goodsData['page'] = $page;
        $goodsData['data'] = $data;
        return $goodsData;
    }
}