<?php namespace Admin\Controller; 

use Admin\Model\ShopBrand;

//测试控制器
class ShopBrandController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{
		$this->db = new ShopBrand;
	}
	
    //动作
    public function index(){
		$data = $this->db->getAll();
		View::with('data',$data)->make();	
    }

    public function add()
    {
        if(IS_POST){
            if($this->db->store()){
                $this->success('添加类型成功','index');
            }else{
                $this->error($this->db->getError());
            }
        }else{
            $cate = new \Admin\Model\ShopCate;
            $cateData = $cate->getAll();
            View::with('cateData',$cateData)->make();
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
            //分配品牌分类
            $cate = new \Admin\Model\ShopCate;
            $cateData = $cate->getAll();

    		$field = $this->db->getOne();
    		View::with('field',$field)->with('cateData',$cateData)->make();
    	}
    	
    }
}
