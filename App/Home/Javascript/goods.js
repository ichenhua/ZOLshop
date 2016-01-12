/* 
* @Author: ChenHua <276004561@qq.com>
* @Date:   2015-09-18 15:27:33
* @Last Modified by:   ChenHua
* @Last Modified time: 2015-09-24 15:56:18
*/

//初始化改变商品价格
$(function() {
	initOrder();
});


function initOrder(){
	totalPrice();
	totalStock();
}


function setActive(obj) { //点击按钮触发选中事件，先变成激活状态，后变更价格
	$(obj).addClass('active').siblings('li').removeClass('active');
}

// //属性选择框，先选中属性，后面
// $(function(){
// 	$('.attr li').click(function() {
// 		$(this).addClass('active').siblings('li').removeClass('active');
// 	});
// });


//获取商品全部价格
function totalPrice(){
	var price = 0;
	//初始化读取所有属性的加价
	$('.attr').each(function(i) {
		var p = $(this).find('.active').find('[name=add_price]').val()*1;
		price += p;
 	});
	$('.goods_price').html((o_price+price).toFixed(2));
}

var stock_count = {};
//获取当前商品属性组合库存
function totalStock(){
	var ids=[];
	$('.attr').each(function(i) {
		ids[i] = $(this).find('.active').find('[name*=goods_attr_id]').val();
 	});
 	var stock_attr = ids.join('-');
 	//设置缓存，防止频繁发送异步请求
 	if(stock_count[stock_attr]){
 		$('.goods_stock').html(stock_count['stock_attr']);
 	}else{
 		$.post('index.php?m=Home&c=Stock&a=getNum', {stock_attr: stock_attr,goods_id:goods_id}, function(data){
 			stock_count[stock_attr] = data.stock_count;
	 		$('.goods_stock').html(data.stock_count);
	 	},'json');
	 	// alert(stock_count[stock_attr]);
 	}

}



//购买数量加减
$(function(){
	$('.fa-minus').click(function(){
		var input = $(this).siblings('input');
		var num = input.val()*1;
		num--;
		if(num<0) return;
		input.val(num);
		hasStock();
	});
	$('.fa-plus').click(function(){
		var input = $(this).siblings('input');
		var num = input.val()*1;
		num++;
		input.val(num);
		hasStock();
	});
});


//判断库存是否充足（点击数量加减时触发）
function hasStock(){
	var buy_num = $('.buy_num').val();
	var goods_stock = $('.goods_stock').html()*1;
	if(buy_num>goods_stock){
		$('.notice').show();
		$('.buy_num').val(goods_stock);
	}
}


//加入购物车
//1、首先判断库存是否充足，库存不足时不能加入
//2、加入购物车的商品根据商品id和属性组合判断
//3、id和属性都匹配的提示已存在，增加数量可以在购物车页面完成
//4、id和属性不能完全匹配的添加新的商品
//5、是否已存在的弹出框都要返回信息提示，单方面提示都会出现变量溢出问题，比如
$(function(){
	$('.cart').click(function(){
		//库存不足时
		var buy_num = $('.buy_num').val();
		var goods_stock = $('.goods_stock').html()*1;
		if(buy_num>goods_stock){
			$('.notice').show();
			$('.addcart').find('.icon').css('background-position','-14px -836px');
			$('.addcart').find('.title').html('本商品库存不足！！');
			$('.addcart').find('.message').html('很抱歉，本商品库存不足，我们正在加紧补货！');
			$('.addcart').show();
			return;
		}

		var cart = {}; //购物车信息容器
		var ids=[];
		$('.attr').each(function(i) {
			ids[i] = $(this).find('.active').find('[name*=goods_attr_id]').val();
	 	});
		//组装购物车数据
	 	cart['goods_id'] = goods_id;
		cart['stock_attr'] = ids.join('-');
		cart['buy_num'] = $('.buy_num').val();
		cart['goods_price'] = $('.goods_price').html();
		//异步发送数据，并接收数据修改相关提示
		$.post('index.php?m=Home&c=Goods&a=saveCart', {cart:cart} , function(data){
			if(data.code==1){ //商品已存在时
				$('.addcart').find('.icon').css('background-position','-14px -836px');
				$('.addcart').find('.title').html(data.message);
			}else{
				$('.addcart').find('.icon').css('background-position','-14px -906px');
				$('.addcart').find('.title').html(data.message);
			}
			$('.addcart').find('.total_num').html(data.num);
			$('.addcart').find('.total_price').html(data.total_price);
		},'json');
		$('.addcart').show();
	});

	//关闭购物车
	$('.cart_colse').click(function(){
		$('.addcart').hide();
	});


	$('.buy').click(function(){
		//库存不足时
		var buy_num = $('.buy_num').val();
		var goods_stock = $('.goods_stock').html()*1;
		if(buy_num>goods_stock){
			$('.notice').show();
			return;
		}

		var cart = {}; //购物车信息容器
		var ids=[];
		$('.attr').each(function(i) {
			ids[i] = $(this).find('.active').find('[name*=goods_attr_id]').val();
	 	});
		//组装购物车数据
	 	cart['goods_id'] = goods_id;
		cart['stock_attr'] = ids.join('-');
		cart['buy_num'] = $('.buy_num').val();
		cart['goods_price'] = $('.goods_price').html();
		//异步发送数据，并接收数据修改相关提示
		$.post('index.php?m=Home&c=Goods&a=saveCart', {cart:cart} , function(data){
			location.href="index.php?m=Home&c=Order&a=lists";
		},'json');
	});

});


