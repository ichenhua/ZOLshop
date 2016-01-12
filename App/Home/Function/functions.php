<?php
/**
 * [getCateUrl 重组规格属性检索地址]
 * @param  [type] $attr_value [当前规格文字]
 * @param  [type] $pos        [第几个规格值]
 * @param  [type] $con        [替换文字，主要针对'全部'选项的0]
 * @param  [type] $local      [当前选中属性值]
 * @return [type]             [重组之后的地址]
 */
function getCateUrl($attr_value,$pos,$con,$local)
{
	$get = $_GET;
	$arr = explode('-',$get['s']);
	foreach($arr as $key => $value) {
		if($key==$pos){
			$arr[$key]=$attr_value;
		}
	}
	//php中做大小判断时，0与字符串相等
	$active = (string)$attr_value == $local ? "class='active'" : '';

	$get['s'] = implode('-',$arr);
	$url = http_build_query($get); //重组路径地址
	return "<a $active href='index.php?$url'>$con</a>";
}

/**
 * [getBrandUrl 重组品牌检索地址]
 * @param  [type] $get_id     [地址栏参数中的brand_id]
 * @param  [type] $brand_name [品牌名称]
 * @param  [type] $brand_id   [当前品牌id]
 * @return [type]             [返回重组之后的地址]
 */
function getBrandUrl($get_id,$brand_name,$brand_id)
{
	$get = $_GET;
	$get['brand_id'] = $brand_id;
	//php中做大小判断时，0与字符串相等
	$active = $get_id == $brand_id ? "class='active'" : '';
	$url = http_build_query($get); //重组路径地址
	return "<a $active href='index.php?$url'>$brand_name</a>";
}

/**
 * [getPriceUrl 价格区间检索地址]
 * @param  [type] $price     [当前价格区间]
 * @param  [type] $get_price [get中的价格区间参数]
 * @return [type]            [返回价格区间引导链接]
 */
function getPriceUrl($price,$get_price)
{
	$get_price = isset($get_price)?$get_price:0; //重置，不存在默认选中全部
	$get = $_GET;
	$get['price_level'] = $price;

	$level = explode('-', $price);
	if(sizeof($level)==1){
		if($level[0]>0){
			$text = $price.'以上'; //最大值以上
		}else{
			$text = '全部'; //0取全部
		}
	}else{
		$text = $price;
	}
	$active = (string)$price == (string)$get_price ? "class='active'" : '';
	$url = http_build_query($get); //重组路径地址
	return "<a $active href=index.php?$url>$text</a>";
}


