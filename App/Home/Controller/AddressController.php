<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class AddressController extends Controller{

    protected $db;
    protected $tpl;
	//构造函数
	public function __init()
	{
        $this->db = new \Home\Model\Address;
        $this->tpl = 'templates/zol/';
	}
	
    public function save()
    {
        if($add_id = $this->db->store()){
            View::ajax(array('code'=>0,'add_id'=>$add_id,'message'=>'添加成功'));
        }else{
            View::ajax(array('code'=>1,'message'=>$this->db->getError()));
        }
    }

    public function getOne()
    {
        $data = $this->db->where('add_id',Q('add_id'))->first();
        View::ajax($data);
    }

    public function delAdd()
    {
        $data = $this->db->where('add_id',Q('add_id'))->delete();
        View::ajax(array('code'=>0));
    }
}
