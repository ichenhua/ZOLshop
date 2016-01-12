//点击添加图集上传框
function plus(obj){
	var str = '<li><input type="file" name="pics[]"> <span onclick="minus(this)"><i class="icon-minus"></i></span></li>';
	$(obj).parents('.list_text').eq(0).append(str);
}

//点击减少图集上传框
function minus(obj){
	$(obj).parents('li').eq(0).remove();
}

//点击添加商品属性
function plus_attr(obj){
	// alert($(obj).parents('tr').index());
	var c = $(obj).parents('tr').eq(0).clone();
	c.find('[name*=goods_attr_id]').val(0);
	c.insertAfter($(obj).parents('tr').eq(0));
}

//点击减少商品属性
function minus_attr(obj){
	$(obj).parents('tr').eq(0).remove();
}

//异步删除商品图集（编辑）
function del(pics_id){
	$.get('index.php?m=Admin&c=Pics&a=del',{pics_id,pics_id}, function(data) {
		$('#pics'+pics_id).remove();
	},'json');
}

function selectAttr(type_id,goods_id){
	var t_id = $('[name=type_id]').val();
	if(type_id == t_id){
		attrList(goods_id);
	}else{
		getAttrList();
	}

}


var cacheData = {};
//异步获取商品属性列表(添加)
function getAttrList(){
	var type_id = $('[name=type_id]').val();
	if(cacheData[type_id]){
		$('#shop_attr').html(cacheData[type_id]);
	}else{
		$.get('index.php?m=Admin&c=ShopAttr&a=getAttrList',{shop_type_id:type_id},function(data){
			cacheData[type_id] = data;
			$('#shop_attr').html(cacheData[type_id]);
		});
	}
}

//异步获取商品属性列表(编辑)
function attrList(goods_id){
	var type_id = $('[name=type_id]').val();
	if(cacheData[type_id]){
		$('#shop_attr').html(cacheData[type_id]);
	}else{
		$.get('index.php?m=Admin&c=ShopAttr&a=attrList',{goods_id:goods_id,shop_type_id:type_id},function(data){
			cacheData[type_id] = data;
			$('#shop_attr').html(cacheData[type_id]);
		});
	}	
}




// var cacheData = {};
// //异步获取商品属性列表(添加)
// function getAttrList(){
// 	var type_id = $('[name=type_id]').val();
// 	$.get('index.php?m=Admin&c=ShopAttr&a=getAttrList',{shop_type_id:type_id},function(data){
// 		$('#shop_attr').html(data);
// 	});
// }

// //异步获取商品属性列表(编辑)
// function attrList(goods_id){
// 	var type_id = $('[name=type_id]').val();
// 	$.get('index.php?m=Admin&c=ShopAttr&a=attrList',{goods_id:goods_id,shop_type_id:type_id},function(data){
// 		$('#shop_attr').html(data);
// 	});
// }

