/* 
* @Author: ChenHua <276004561@qq.com>
* @Date:   2015-09-04 15:00:15
* @Last Modified by:   ChenHua
* @Last Modified time: 2015-09-24 15:42:34
*/

//宝贝详情页面导航条跟随
$(function(){
    $(window).scroll(function (){
    	// document.title = $('.goods_bar').offset().top;
    	var l = $(document).scrollTop(); //当前滚动高度
    	var h = $('.main').offset().top; //导航条所在位置参考点
    	if(l>h){
    		$('.goods_bar').css({'position': "fixed", 'top':'0', 'z-index':'10'});
			$('.hook').show();
    	}else{
    		$('.goods_bar').css({'position': "relative"});
    		$('.hook').hide();
    	}
	});
});

//左侧分类列表展开和收起
$(function(){
	$('.cate>ul>li>i').live('click',function(){
		$(this).siblings('.ext').toggle(); //循环出现和隐藏扩展菜单
	});
	$('.fa-plus-square-o').live('click',function(){ //变加号为减号
		$(this).removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
	});
	$('.fa-minus-square-o').live('click',function(){ //变减号为加号
		$(this).removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
	});
});


//缩略图放大展示
$(function(){
	$('.thumb img').hover(function() {
		$(this).addClass('active').siblings('img').removeClass('active');
		$('.img img').attr('src',$(this).attr('src'));
	});
});


//下拉菜单
$(function(){
	$('.nav').hover(function() {
		$('.combobox').show();
		$(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
	}, function() {
		$('.combobox').hide();
		$(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
	});
});


//规格属性默认选中
$(function(){
	$('.attr').each(function() {
		$(this).find('li').eq(0).addClass('active');
	});
});


// //局部放大效果
// $(function(){
// 	//抓取元素待用
//     var cover = $('.cover');
//     var box = $('.box');
//     var bigimg = $('.bigimg');
// 	var map = $('.bigimg img');

//     //鼠标在左侧图片上移动触发事件
//     cover.mouseenter(function(e){
//         var ev = window.event || e;
//         x = ev.offsetX || ev.layerX;  //获取鼠标位置
//         y = ev.offsetY || ev.layerY;

//         //鼠标上移出现box和right区域
//         box.show();
//         bigimg.show();

//         //鼠标移动带动box移动
//         box_left = x-100;
//         box_top = y-100;
//         if(box_left<0) box_left = 0;
//         if(box_left>200) box_left = 200;
//         if(box_top<0) box_top = 0;
//         if(box_top>200) box_top = 200;

//         //将处理过的box位置加到box上，实现跟随拖动效果
//         box.css('left',box_left);
//         box.css('top',box_top);

//         //右边大图响应box效果
//         map.css('left',-2*box_left);
//         map.css('top',-2*box_top);
        
//         //document.title ='当前鼠标位置为：'+ x+'+'+y;
//     });

//     cover.mouseout(function(){
//         //鼠标移除隐藏box和right区域
//         box.hide();
//         bigimg.hide();
//     });
// });



