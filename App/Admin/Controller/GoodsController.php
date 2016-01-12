<?php namespace Admin\Controller; 

use Admin\Model\Goods;

//测试控制器
class GoodsController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{

		$this->db = new Goods;
	}
	
    //动作
    public function index(){
        //商品分类
        $cate = new \Admin\Model\ShopCate;
        $cateData = $cate->getAll();
        View::with('cateData',$cateData);
        //列表信息
		$data = $this->db->getAll();
		View::with('data',$data)->make();	
    }

    public function add()
    {
        if(IS_POST){
            if($this->db->store()){
                $this->success('商品添加成功','index');
            }else{
                $this->error($this->db->getError());
            }
        }else{
            //商品分类
            $cate = new \Admin\Model\ShopCate;
            $cateData = $cate->getAll();
            View::with('cateData',$cateData);
            //商品类型列表
            $type = new \Admin\Model\ShopType;
            $typeData = $type->getAll();
            View::with('typeData',$typeData);
            //商品品牌
            $brand = new \Admin\Model\ShopBrand;
            $brandData = $brand->getAll();
            View::with('brandData',$brandData);
            View::make();
        }
    }

    //修改
    public function edit(){
    	if(IS_POST){
    		if($this->db->edit()){
				View::success('操作成功','index');
			}
			else{
				View::error($this->db->getError());
			}
    	}else{
            //商品分类
            $cate = new \Admin\Model\ShopCate;
            $cateData = $cate->getAll();
            View::with('cateData',$cateData);

            //商品品牌
            $brand = new \Admin\Model\ShopBrand;
            $brandData = $brand->getAll();
            View::with('brandData',$brandData);

            //获取图集信息
            $pics = new \Admin\Model\Pics;
            $picsData = $pics->getAll();
            View::with('picsData',$picsData);

            //商品类型列表
            $type = new \Admin\Model\ShopType;
            $typeData = $type->getAll();
            View::with('typeData',$typeData);

            //商品属性列表
            $attr = new \Admin\Model\GoodsAttr;
            $attrData = $attr->getAll(Q('goods_id'));
            View::with('attrData',$attrData);

            //读取商品信息
    		$field = $this->db->getOne();
    		View::with('field',$field)->make();
    	}
    }


    //回收站列表
    public function goods_delete()
    {
        //商品分类
        $cate = new \Admin\Model\ShopCate;
        $cateData = $cate->getAll();
        View::with('cateData',$cateData);
        //列表信息
        $data = $this->db->getDelAll();
        View::with('data',$data)->make();
    }

    //宝贝加入回收站
    public function add_is_delete()
    {
        if($this->db->add_is_delete()){
            $this->success('商品下架成功','index');
        }else{
            $this->error($this->db->getError());
        }
    }

    //还原回收站里的宝贝
    public function re_is_delete()
    {
        if($this->db->re_is_delete()){
            $this->success('商品上架成功','goods_delete');
        }else{
            $this->error($this->db->getError());
        }
    }

    //彻底删除宝贝
    public function is_delete()
    {
        if($this->db->is_delete()){
            $this->success('商品彻底删除成功','goods_delete');
        }else{
            $this->error($this->db->getError());
        }
    }
}
