<?php namespace Admin\Controller; 

use Admin\Model\GoodsAttr;

//测试控制器
class GoodsAttrController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{
		$this->db = new GoodsAttr;
	}

//     //根据商品类型获取对应属性(增加)
//     public function getAttrList()
//     {
//         $attrs = $this->db->getAttrList();
//         $html = '';
//         foreach ($attrs as $k => $a) {
//             switch ($a['show_type']) {
//                 case '1':
//                     # 文本框
// $str = <<<php
// <tr>
//     <th>{$a['attr_name']}</th>
//     <td>
//         <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
//         <input type="hidden" name="goods_attr_id[]" value="">
//         <input type="text" name="goods_attr_value[]" class="common-text">
//     </td>
//     <td><input type="hidden" name="goods_add_price[]"></td>
// </tr>
// php;
//                     break;

//                 case '4':
//                     # 下拉选择框
//                     $split = preg_split('@\n@', $a['attr_value']);
//                     $option = ''; //初始化防止报错
//                     foreach ($split as $k => $v) {
//                         $v = trim($v); //去除空格
//                         $option .= "<option value='".$v."'>".$v."</option>\n";
//                     }
// $str = <<<php
// <tr>
//     <th><span onclick="plus_attr(this)"><i class="icon-plus"></i></span> <span onclick="minus_attr(this)"><i class="icon-minus"></i></span> {$a['attr_name']}</th>
//     <td>
//         <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
//         <input type="hidden" name="goods_attr_id[]" value="">
//         <select name="goods_attr_value[]">
//             {$option}
//         </select>
//     </td>
//     <td>加价：<input type="text" name="goods_add_price[]" size="10" class="common-text"> 元</td>
// </tr>
// php;
//                     break;
//             }
//             $html.=$str;
//         }
//         echo $html;
//     }



//     //根据商品类型获取对应属性(修改)
//     public function attrList()
//     {
//         $attrs = $this->db->getAttrList();

//         $html = '';
//         foreach ($attrs as $k => $a) {
//             switch ($a['show_type']) {
//                 case '1':
//                     # 文本框
// $str = <<<php
// <tr>
//     <th>{$a['attr_name']}</th>
//     <td>
//         <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
//         <input type="text" name="goods_attr_value[]" class="common-text">
//     </td>
//     <td><input type="hidden" name="goods_add_price[]"></td>
// </tr>
// php;
//                     break;

//                 case '4':
//                     # 下拉选择框
//                     $split = preg_split('@\n@', $a['attr_value']);
//                     $option = ''; //初始化防止报错
//                     foreach ($split as $k => $v) {
//                         $v = trim($v); //去除空格
//                         $option .= "<option value='".$v."'>".$v."</option>\n";
//                     }
// $str = <<<php
// <tr>
//     <th><span onclick="plus_attr(this)"><i class="icon-plus"></i></span> <span onclick="minus_attr(this)"><i class="icon-minus"></i></span> {$a['attr_name']}</th>
//     <td>
//         <input type="hidden" name="attr_id[]" value="{$a['attr_id']}">
//         <select name="goods_attr_value[]">
//             {$option}
//         </select>
//     </td>
//     <td>加价：<input type="text" name="goods_add_price[]" size="10" class="common-text"> 元</td>
// </tr>
// php;
//                     break;
//             }
//             $html.=$str;
//         }
//         echo $html;
//     }
}
