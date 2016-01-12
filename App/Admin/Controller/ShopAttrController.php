<?php namespace Admin\Controller; 

use Admin\Model\ShopAttr;

//测试控制器
class ShopAttrController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{
		$this->db = new ShopAttr;
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
    		$field = $this->db->getOne();
    		View::with('field',$field)->make();
    	}
    	
    }

    //根据商品类型获取对应属性(增加)
    public function getAttrList()
    {
        $attrs = $this->db->getAttrList();
        $html = '';
        foreach ($attrs as $k => $a) {
            switch ($a['show_type']) {
                case '1':
                    # 文本框
$str = <<<php
<tr>
    <th>{$a['attr_name']}</th>
    <td>
        <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
        <input type="hidden" name="goods_attr_id[]" value="0">
        <input type="text" name="goods_attr_value[]" class="common-text">
    </td>
    <td><input type="hidden" name="goods_add_price[]"></td>
</tr>
php;
                    break;

                case '4':
                    # 下拉选择框
                    $split = preg_split('@\n@', $a['attr_value']);
                    $option = ''; //初始化防止报错
                    foreach ($split as $k => $v) {
                        $v = trim($v); //去除空格
                        $option .= "<option value='".$v."'>".$v."</option>\n";
                    }
$str = <<<php
<tr>
    <th><span onclick="plus_attr(this)"><i class="icon-plus"></i></span> <span onclick="minus_attr(this)"><i class="icon-minus"></i></span> {$a['attr_name']}</th>
    <td>
        <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
        <input type="hidden" name="goods_attr_id[]" value="0">
        <select name="goods_attr_value[]">
            {$option}
        </select>
    </td>
    <td>加价：<input type="text" name="goods_add_price[]" size="10" class="common-text"> 元</td>
</tr>
php;
                    break;
            }
            $html.=$str;
        }
        echo $html;
    }



    //根据商品类型获取对应属性(修改)
    public function attrList()
    {
        $g_id = Q('goods_id');
        $g_type_id = Q('shop_type_id');
        $g_attr = new \Admin\Model\GoodsAttr;
        $g_attrs = $g_attr->getAllAttr($g_id,$g_type_id);

        $html = '';
        $str = '';
        foreach ($g_attrs as $m => $n) {
        
        $a = $this->db->one($n['attr_id']);

switch ($a['show_type']) {
                case '1':
                    # 文本框
$str = <<<php
<tr>
    <th>{$a['attr_name']}</th>
    <td>
        <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
        <input type="hidden" name="goods_attr_id[]" value="{$n['goods_attr_id']}">
        <input type="text" name="goods_attr_value[]" class="common-text" value="{$n['goods_attr_value']}">
    </td>
    <td><input type="hidden" name="goods_add_price[]"></td>
</tr>
php;
                    break;

                case '4':
                    # 下拉选择框
                    $split = preg_split('@\n@', $a['attr_value']);
                    $option = ''; //初始化防止报错
                    foreach ($split as $k => $v) {
                        $v = trim($v); //去除空格
                        $selected = $v == $n['goods_attr_value']?'selected':'';
                        $option .= "<option value='".$v."' ".$selected." >".$v."</option>\n";
                    }
$str = <<<php
<tr>
    <th><span onclick="plus_attr(this)"><i class="icon-plus"></i></span> <span onclick="minus_attr(this)"><i class="icon-minus"></i></span> {$a['attr_name']}</th>
    <td>
        <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
        <input type="hidden" name="goods_attr_id[]" value="{$n['goods_attr_id']}">
        <select name="goods_attr_value[]">
            {$option}
        </select>
    </td>
    <td>加价：<input type="text" name="goods_add_price[]" size="10" class="common-text" value="{$n['goods_add_price']}"> 元</td>
</tr>
php;
                    break;
            }



        $html.=$str;


        }


            
        echo $html;
    }
}
