/* 
* @Author: ChenHua <276004561@qq.com>
* @Date:   2015-09-09 16:28:24
* @Last Modified by:   ChenHua
* @Last Modified time: 2015-09-09 17:16:02
*/

$(function(){
	$('.tab-content').eq(0).show();
	$('.tab-title li').click(function() {
		var index = $(this).index();
		$(this).addClass('active').siblings('li').removeClass('active');
		$('.tab-content').eq(index).show().siblings('.tab-content').hide();
	});
});


