<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class IndexController extends Controller{

	protected $tpl;

	//构造函数
	public function __init()
	{
		$this->tpl = 'templates/zol/';
	}
	
    //首页
    public function index(){
        //商品分类
        $cate = new \Home\Model\Cate;
        $cateData = $cate->getChan();
        // p($cateData);
        View::with('cateData',$cateData);
        
        //创建商品对象
        $goods = new \Home\Model\Goods;

    	//最新发布商品
    	$new = $goods->getNew();
        View::with('new',$new);

        //重组分类列表，并去取出8件商品
        $cateTree = $cateData;
        foreach ($cateData as $k => $v) {
            $a = array(); //取该分组下的三级分类
            foreach ($v['_data'] as $m => $n) {
                $a = array_merge($a,array_keys($n['_data']));
            }
            unset($cateTree[$k]['_data']);
            $cateTree[$k]['three'] = $a;
            if($a){
                $level_goods = $goods->whereIn('cate_id',$a)->limit(8)->get();
                $cateTree[$k]['level_goods'] = $level_goods;
            }
        }
        // p($cateTree);
        View::with('cateTree',$cateTree);

    	View::make($this->tpl.'index.html');
    }

}
