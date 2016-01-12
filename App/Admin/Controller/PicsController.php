<?php namespace Admin\Controller; 

use Admin\Model\Pics;

//测试控制器
class PicsController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{

		$this->db = new Pics;
	}
	
    //删除图集
    public function del()
    {
        if($this->db->remove()){
            View::ajax(array('code'=>0,'message'=>'删除成功'));
        }else{
            View::ajax(array('code'=>1,'message'=>$this->db->getError()));
        }
    }
}
