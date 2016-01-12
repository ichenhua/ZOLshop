<?php namespace Admin\Model;

use Hdphp\Model\Model;

class GoodsAttr extends Model{

	//数据表
	protected $table = "goods_attr";

	//完整表名
	protected $full = false;

	//自动验证
	protected $validate=array(
		//字段名: 表单字段名
		//验证方法: 函数或模型方法
		//验证条件: 1有字段时验证(默认)	2值不为空时验证  	3必须验证 
		//验证时间: 1 插入时验证		2更新时空时验证 	3全部情况验证 (默认)
		//array('goods_name','required','商品名称不能为空',3,3),
	);

	//自动完成
	protected $auto=array(
		//字段名: 表单字段名
		//处理方法: 函数或模型方法
		//方法类型: string(字符串 默认)  function(函数)  method(模型方法)
		//验证条件: 1有字段时处理(默认)	2值不为空时 3必须处理
		//处理时间: 1 插入时  2更新时 3全部情况 (默认)
		//array('create_at','time','function',3,1),
	);

	public function store($goods_id)
	{
		foreach ($_POST['attr_id'] as $k => $v) {
			if($_POST['goods_attr_id'][$k]){
				//修改属性
				$data['goods_id'] = $goods_id;
				$data['goods_attr_value'] = $_POST['goods_attr_value'][$k];
				$data['goods_add_price'] = $_POST['goods_add_price'][$k];
				$data['attr_id'] = $_POST['attr_id'][$k];
				$data['goods_attr_id'] = $_POST['goods_attr_id'][$k];
				$this->save($data);
			}else{
				//添加属性
				$data['goods_id'] = $goods_id;
				$data['goods_attr_value'] = $_POST['goods_attr_value'][$k];
				$data['goods_add_price'] = $_POST['goods_add_price'][$k];
				$data['attr_id'] = $_POST['attr_id'][$k];
				unset($data['goods_attr_id']);
				$this->add($data);
			}
		}
		return true;
	}

	public function getAll($goods_id)
	{
		return $this->where('goods_id',$goods_id)->get();
	}

	//获取当前属性列表
	public function getAllAttr($goods_id,$type_id)
	{
		$sql = "SELECT * FROM hd_goods_attr ga 
				RIGHT JOIN hd_shop_attr sa 
				ON ga.attr_id=sa.attr_id 
				WHERE sa.shop_type_id = {$type_id}
				AND (ga.goods_id={$goods_id} OR ga.goods_id is null) 
				ORDER BY sa.attr_type DESC, sa.attr_id ASC";

		$data = Db::select($sql);

		// $data = Db::table('goods_attr ga')->rightJoin('shop_attr sa','ga.attr_id','=','sa.attr_id')->where('sa.shop_type_id',$shop_type_id)->get();
		return $data;
		// return $this->where('goods_id',$goods_id)->get();
	}

	//获取规格数据
	public function groupAttr($goods_id)
	{
		//获取商品类型
		$type_id = Db::table('goods')->where('goods_id',$goods_id)->pluck('type_id');

		//获取商品规格
		$attr_id = DB::table('shop_attr')->where('shop_type_id',$type_id)->where('attr_type',2)->lists('attr_id');

		//重组属性ID
		foreach ($attr_id as $k => $v) {
			$d = $this->where('attr_id',$v)->where('goods_id',$goods_id)->lists('goods_attr_id');
			$data[] = $d;
		}
		return $this->Descartes($data);
	}

	//获取规格标题
	public function getAttrName($goods_id)
	{
		//获取商品类型
		$type_id = Db::table('goods')->where('goods_id',$goods_id)->pluck('type_id');

		//获取商品规格
		$attr_name = DB::table('shop_attr')->where('shop_type_id',$type_id)->where('attr_type',2)->lists('attr_name');
		return $attr_name;
	}	


public function Descartes(){
	$t = func_get_args();
	//判断参数维数
	if(sizeof($t[0])==1){
		//处理单条数组
		return self::single($t);
	}else{
		//处理多组数组
		return self::multiple($t);
	}
}

//处理单条数组
public function single(){
	$t = func_get_args();
	foreach ($t[0][0][0] as $k => $v) {
		$data[$k][] = $v;
	}
	return $data;
}

//处理多组数组
public function multiple(){
	$t = func_get_args();
	if(func_num_args() == 1) return call_user_func_array('self::multiple', $t[0]);
	$a = array_shift($t);
	if(! is_array($a)) $a = array($a);
		$a = array_chunk($a, 1);
	do {
		$r = array();
		$b = array_shift($t);
		if(!is_array($b)) $b = array($b);
		foreach($a as $p)
		foreach(array_chunk($b, 1) as $q)
		$r[] = array_merge($p, $q);
		$a = $r;
	}while($t);
	return $r;
}


	public function getAttrList()
	{
		$shop_type_id = Q('shop_type_id');
		return $this->where('shop_type_id',$shop_type_id)->orderBy('attr_type','DESC')->get();
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