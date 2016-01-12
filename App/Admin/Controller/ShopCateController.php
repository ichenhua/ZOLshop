<?php namespace Admin\Controller; 

use Admin\Model\ShopCate;

//测试控制器
class ShopCateController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{
		$this->db = new ShopCate;
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
            //搜索页规格分类
            $type = new \Admin\Model\ShopType;
            $typeData = $type->getAll();
            View::with('typeData',$typeData);

            $data = $this->db->getAll();
            View::with('data',$data)->make();   
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
            //搜索页规格分类
            $type = new \Admin\Model\ShopType;
            $typeData = $type->getAll();
            View::with('typeData',$typeData);

            $data = $this->db->getAll();
    		$field = $this->db->getOne();
    		View::with('data',$data)->with('field',$field)->make();
    	}
    	
    }
}
