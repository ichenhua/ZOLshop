<?php namespace Admin\Model;

use Hdphp\Model\Model;

class Goods extends Model{

	//数据表
	protected $table = "goods";

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		array('goods_name','required','商品名称不能为空',3,3),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		array('create_at','time','function',3,1),
		array('admin_id','getAdminId','method',3,1),
		array('list_pic','getListPic','method',3,3),
		array('thumb_pic','getThumbPic','method',3,3),
	);

	protected function getAdminId(){
		//自动完成获取发布者ID
		return $_SESSION['user_id'];
	}

	protected function getListPic(){
		//自动完成列表图片上传
		$file = Upload::make('list_pic');
		if($file){
			return $file[0]['path'];
		}else{
			return $_POST['list_pic']?$_POST['list_pic']:'';
		}
	}

	protected function getThumbPic(){
		//自动完成缩略图片上传
		$file = Upload::make('thumb_pic');
		if($file){
			return $file[0]['path'];
		}else{
			return $_POST['thumb_pic']?$_POST['thumb_pic']:'';
		}
	}

	//获取全部数据
	public function getAll()
	{
		$cate_id = Q('cate_id');
		if($cate_id){
			$page = Page::row(20)->make($this->where('cate_id',$cate_id)->where('is_delete',0)->count());
			$data = $this->where('cate_id',$cate_id)->where('is_delete',0)->limit(Page::limit())->get();
		}else{
			$page = Page::row(20)->make($this->where('is_delete',0)->count());
			$data = $this->where('is_delete',0)->limit(Page::limit())->get();
		}

		foreach ($data as $k => $v) {
			$brand = Db::table('shop_brand')->where('brand_id',$v['brand_id'])->first();
			$data[$k]['brand'] = $brand;
			$cate = Db::table('shop_cate')->where('cate_id',$v['cate_id'])->first();
			$data[$k]['cate'] = $cate;
		}
		$goods['data'] = $data;
		$goods['page'] = $page;
		return $goods;
	}


	//获取回收站数据
	public function getDelAll()
	{
		$cate_id = Q('cate_id');
		if($cate_id){
			$page = Page::row(20)->make($this->where('cate_id',$cate_id)->where('is_delete',1)->count());
			$data = $this->where('cate_id',$cate_id)->where('is_delete',1)->limit(Page::limit())->get();
		}else{
			$page = Page::row(20)->make($this->where('is_delete',1)->count());
			$data = $this->where('is_delete',1)->limit(Page::limit())->get();
		}

		foreach ($data as $k => $v) {
			$brand = Db::table('shop_brand')->where('brand_id',$v['brand_id'])->first();
			$data[$k]['brand'] = $brand;
			$cate = Db::table('shop_cate')->where('cate_id',$v['cate_id'])->first();
			$data[$k]['cate'] = $cate;
		}
		$goods['data'] = $data;
		$goods['page'] = $page;
		return $goods;
	}



	//添加
	public function store()
	{
		if($this->create()){
			if($goods_id = $this->add()){
				//上传图集
				$this->uploadPics($goods_id);
				//商品属性
				$goodsAttr = new \Admin\Model\GoodsAttr;
				$goodsAttr->store($goods_id);
				return true;
			}
		}
	}

	//获取单条数据
	public function getOne()
	{
		$goods_id = Q('goods_id');
		return $this->where('goods_id',$goods_id)->first();
	}

	//编辑
	public function edit()
	{
		if($this->create()){
			$this->uploadPics(Q('goods_id'));
			//商品属性
			$goodsAttr = new \Admin\Model\GoodsAttr;
			$goodsAttr->store(Q('goods_id'));
			return $this->save();
		}
	}

	//上传图集
	public function uploadPics($goods_id)
	{
		$pics = Upload::make('pics');
		foreach ($pics as $k => $p) {
			//生成中等图片
			$midPic = $p['dir'].'/'.$p['filename'].'_mid.'.$p['ext'];
			Image::thumb($p['path'], $midPic, 400, 400, 6);

			//生成小图片
			$smallPic = $p['dir'].'/'.$p['filename'].'_small.'.$p['ext'];
			Image::thumb($p['path'], $smallPic, 150, 150, 6);

			//组装图片表数据，并压入图集表
			$data['goods_id'] = $goods_id;
			$data['pics_big'] = $p['path'];
			$data['pics_mid'] = $midPic;
			$data['pics_small'] = $smallPic;
			Db::table('goods_pics')->insert($data);
		}
	}

	//加入回收站
	public function add_is_delete()
	{
		$goods_id = Q('goods_id');
		return $this->where('goods_id',$goods_id)->update(array('is_delete'=>1));
	}

	//还原回收站
	public function re_is_delete()
	{
		$goods_id = Q('goods_id');
		return $this->where('goods_id',$goods_id)->update(array('is_delete'=>0));
	}

	//删除宝贝
	public function is_delete()
	{
		$goods_id = Q('goods_id');
		return $this->where('goods_id',$goods_id)->delete();
	}

	//时间操作
	protected $timestamps=false;

	//允许插入的字段
	protected $insertFields=array();

	//允许更新的字段
	protected $updateFields=array();

	//前置方法 比如: _before_add 为添加前执行的方法
	protected function _before_add(){}
	protected function _before_delete(){}
	protected function _before_save(&$data){}

	protected function _after_add(){}
	protected function _after_delete(){}
	protected function _after_save(){}

}