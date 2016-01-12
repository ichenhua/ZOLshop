/* 
* @Author: ChenHua
* @Date:   2015-05-16 20:49:16
* @Last Modified by:   ChenHua
* @Last Modified time: 2015-05-26 16:05:04
*/

//顶部送到那个城市
$(function(){
    $('#city').hover(function(){
        $('#city .city').show();
        $('#city .more').addClass('act')
        $('#city .more').find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $('#city .city').hide();
        $('#city .more').removeClass('act')
        $('#city .more').find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
});


//顶部我的京东
$(function(){
    $('#myjd').hover(function(){
        $('.myjd').show();
        $(this).find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $('.myjd').hide();
        $(this).find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
    $('.myjd').hover(function(){
        $(this).show();
        $('#myjd').addClass('act');
        $('#myjd').find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $(this).hide();
        $('#myjd').removeClass('act')
        $('#myjd').find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
});


//顶部手机京东
$(function(){
    $('#jd_phone').hover(function(){
        $('.jd_phone').show();
        $(this).find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $('.jd_phone').hide();
        $(this).find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
    $('.jd_phone').hover(function(){
        $(this).show();
        $('#jd_phone').addClass('act');
        $('#jd_phone').find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $(this).hide();
        $('#jd_phone').removeClass('act')
        $('#jd_phone').find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
});

//顶部关注京东
$(function(){
    $('#jd_attention').hover(function(){
        $('.jd_attention').show();
        $(this).find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $('.jd_attention').hide();
        $(this).find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
    $('.jd_attention').hover(function(){
        $(this).show();
        $('#jd_attention').addClass('act');
        $('#jd_attention').find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $(this).hide();
        $('#jd_attention').removeClass('act')
        $('#jd_attention').find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
});

//顶部京东服务
$(function(){
    $('#jd_serve').hover(function(){
        $('.jd_serve').show();
        $(this).find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $('.jd_serve').hide();
        $(this).find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
    $('.jd_serve').hover(function(){
        $(this).show();
        $('#jd_serve').addClass('act');
        $('#jd_serve').find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $(this).hide();
        $('#jd_serve').removeClass('act')
        $('#jd_serve').find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
});


//顶部网站导航
$(function(){
    $('#jd_nav').hover(function(){
        $('.jd_nav').show();
        $(this).find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $('.jd_nav').hide();
        $(this).find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
    $('.jd_nav').hover(function(){
        $(this).show();
        $('#jd_nav').addClass('act');
        $('#jd_nav').find('i').removeClass('icon-angle-down').addClass('icon-angle-up')
    },function(){
        $(this).hide();
        $('#jd_nav').removeClass('act')
        $('#jd_nav').find('i').removeClass('icon-angle-up').addClass('icon-angle-down')
    })
});

//广告banner删除
$(function(){
    $('#jd_close').click(function(){
        $('.jd_close').hide(800);
    })
})

//购物车
$(function(){
    $('#my_cart').hover(function(){
        $('.my_cart').show();
        $('.my_cart').css('box-shadow','0 0 2px #eee');
        $(this).css('box-shadow','0 -2px 2px #eee');
    },function(){
        $('.my_cart').hide();
        $(this).css('box-shadow','0 0 0');
    })
    $('.my_cart').hover(function(){
        $(this).show();
        $('#my_cart').addClass('act');
    },function(){
        $(this).hide();
        $('#my_cart').removeClass('act')
    })
});


// 二级导航菜单
$(function(){
    // $.ajaxSetup({ cache: false });
    // $('#ext').load('include/ext.html')
    $('#ext').load('include/ext.html?s='+Math.random())
    var i;
    $('.nav ul li').hover(function(){
        i = $(this).index();
        var j = $(document).scrollTop();
        if(j>256){ //判断当前页面位置是否超过flash区边缘
            $('#ext').css('top',j-256);
        }else{
            $('#ext').css('top','0');
        }
        $('#ext').show();
        $('#ext .info').eq(i).show();
    },
    function(){
            $('#ext').hide();
            $('#ext .info').eq(i).hide();
    })

    $('#ext').hover(function(){
        $('#ext').show();
        $('#ext .info').eq(i).show();
        $('.nav ul li').eq(i).addClass('select')

    },function(){
        $('#ext').hide();
        $('#ext .info').eq(i).hide();
        $('.nav ul li').eq(i).removeClass('select')
    })
})


// 轮播图
$(function(){
    var c = 0;
    var t = 0;  //防止用户狂点左右键
    var timer = null;
    var timer1 = null; //设置延时定时器防止用户晃动轮播按钮
    timer = setInterval(run,2000)
    $('.flash ul li').hover(function(){
        c = $(this).index();
        timer1 = setTimeout(function(){ //延时加载鼠标上移事件
            state(c);
            clearInterval(timer);
        },200)
    },function(){
        clearInterval(timer1); //清除鼠标快速移出引发的事件
    })

    $('.flash').hover(function(){ //flash框上移停止滚动
        clearInterval(timer);
        $('.flash a').show();
    },function(){
        timer = setInterval(run,2000);
        $('.flash a').hide();
    })

    function run(){ //轮播函数
        c++;
        if(c==6) c=0;
        state(c);
    }

    function state(c){ //当前状态函数
        $('.flash img').eq(c).fadeIn(800).siblings('img').fadeOut(800);
        $('.flash ul li').eq(c).addClass('active').siblings('li').removeClass('active');
    }

    $('.flash #left').click(function(){ //左按钮点击事件
        if(t==0){ //防止用户狂点
            c--;
            if(c==-1) c=5;
            state(c);
            t=1;
            setTimeout(function(){
                t=0;
            },1000)
        }
    })

    $('.flash #right').click(function(){ //右按钮点击事件
        if(t==0){ //防止用户狂点
            c++;
            if(c==6) c=0;
            state(c);
            t=1;
            setTimeout(function(){
                    t=0;
            },1000)
        }
    })

});


//快捷导航
$(function(){
    var c=1;
    var timer = null;
    $('.service .ico li').hover(function(){
        var i = $(this).index()
        timer = setTimeout(function(){
            if(i<4 && c==1){
                $('.service .ico').hide()
                $('.service .info').animate({'top':45},300)
                $('.service .info .list li').eq(i).addClass('active').siblings('li').removeClass('active')
                $('.service .info .list_more div').eq(i).show().siblings('div').hide()
            }
        },400)
    },function(){
        clearTimeout(timer);
        c=1;
    })

    $('.service .info .list li').hover(function(){
        var s = $(this).index();
        $(this).addClass('active').siblings('li').removeClass('active')
        $('.service .info .list_more div').eq(s).show().siblings('div').hide()
    },function(){})

    $('.service .info .list_more .close').click(function(event) {
        $('.service .ico').show()
        $('.service .info').animate({'top':252},300)
        c=0;
    });
});



//今日推荐滚动效果
$(function(){
    var c=0;
    $('.list ul').html(function(index,value){ //ul内容克隆一份
        return value+value;
    })
    // alert($('.list ul li').size()) //判断是否克隆成功
    $('.list').hover(function() {
        $('.list span').show();
    }, function() {
        $('.list span').hide();
    });
    $('.list span#left').click(function() {
        if (c==4) {  //极端位置处理
            $('.list ul').css('left',0);
            c=0;
        }
        c++;
        $('.list ul').stop().animate({'left':-1000*c}, 300);
    });
    $('.list span#right').click(function() {
        if (c==0) { //极端位置处理
            $('.list ul').css('left',-4000);
            c=4;
        }
        c--;
        $('.list ul').stop().animate({'left':-1000*c}, 300);
    });
});


//love 部分处理
$(function(){
    var s = $('.love ul').size()
    var i = 0;
    $('.change').click(function(){
        i++;
        if(i==s) i=0;
        $('.love ul').eq(i).fadeIn(300).siblings('ul').fadeOut(300)
    })
})



//mark部分处理
$(function(){
    var timer = null;
    $('.mark').hover(function(){
        var jqthis = $(this)
        jqthis.find('i').stop().animate({'margin-left':10,'opacity':'0'},500,function(){
            jqthis.find('i').stop().animate({'margin-left':0,'opacity':'1'},500);
        });
        timer = setInterval(function(){
            jqthis.find('i').stop().animate({'margin-left':10,'opacity':'0'},500,function(){
                jqthis.find('i').stop().animate({'margin-left':0,'opacity':'1'},500);
            });
        },1000)
    },function(){
        clearInterval(timer)
    })
});


//通用tab切换效果
$(function(){
    $('.floor_nav ul li').hover(function(){
        a = $(this).index()
        $(this).addClass('active').siblings('li').removeClass('active');
        $(this).parent().parent().parent().find('.jd_lis').eq(a).show().siblings('.jd_lis').hide();
    })
});

//1楼flash
$(function(){
    $('.my_flash').each(function(){
        var jsthis = $(this)[0];
        var jqthis = $(this);

        $(this).find('ul.img').html(function(index,value){
            return value+value;
        })
        $(this).find('ul.img').width($(this).find('ul.img li').width()*$(this).find('ul.img li').size())

        jsthis.c=0;
        jsthis.timer = null;
        var w = $(this).find('ul.img li').width();

        jsthis.run = function(){
            if(jsthis.c==4){
                jsthis.c=0;
                jqthis.find('ul.img').css('left',0);
                jqthis.find('ul.num li').eq(jsthis.c).addClass('active').siblings('li').removeClass('active');
            }
            jsthis.c++;
            jqthis.find('ul.img').stop().animate({'left':-jsthis.c*w},500);
            if(jsthis.c==4){
                jqthis.find('ul.num li').eq(0).addClass('active').siblings('li').removeClass('active');
            }else{
                jqthis.find('ul.num li').eq(jsthis.c).addClass('active').siblings('li').removeClass('active');
            }
        }

        jsthis.timer = setInterval(jsthis.run,2000)

        jqthis.hover(function(){
            clearInterval(jsthis.timer);
            jqthis.find('span').show();
        },function(){
            jqthis.find('span').hide();
            clearInterval(jsthis.timer);
            jsthis.timer = setInterval(jsthis.run,2000)
        })


        jqthis.find('ul.num li').hover(function(){
            jsthis.c = $(this).index();
            $(this).addClass('active').siblings('li').removeClass('active');
            jqthis.find('ul.img').stop().animate({'left':-jsthis.c*w},500);
        })

        jqthis.find('#left').click(function(){
            if(jsthis.c==0){
                jsthis.c=4;
                jqthis.find('ul.img').css('left',-jsthis.c*w);
            }
            jsthis.c--;
            jqthis.find('ul.num li').eq(jsthis.c).addClass('active').siblings('li').removeClass('active');
            jqthis.find('ul.img').stop().animate({'left':-jsthis.c*w},500);
        })

        jqthis.find('#right').click(function(){
            if(jsthis.c==4){
                jsthis.c=0;
                jqthis.find('ul.img').css('left',-jsthis.c*w);
            }
            jsthis.c++;
            jqthis.find('ul.img').stop().animate({'left':-jsthis.c*w},500);
            if(jsthis.c==4){
                jqthis.find('ul.num li').eq(0).addClass('active').siblings('li').removeClass('active');
            }else{
                jqthis.find('ul.num li').eq(jsthis.c).addClass('active').siblings('li').removeClass('active');
            }
        })
    });
});

//今日特惠图片运动
$(function(){
    $('#today img').hover(function(){
        $(this).animate({'margin-left':'-10'},300)
    },function(){
        $(this).animate({'margin-left':'0'},300)
    })
})


//左侧导航栏
$(function(){
    // alert($(document).scrollTop())

    $(window).scroll(function (){
        var j = $(document).scrollTop(); //当前滚动条的位置
        var f = -1; //楼层高度
        
        if(j>8300){
            f=-1;
        }else if(j>8000){
            f=10;
        }else if(j>7400){
            f=9;
        }else if(j>6750){
            f=8;
        }else if(j>6100){
            f=7;
        }else if(j>5500){
            f=6;
        }else if(j>4900){
            f=5;
        }else if(j>4200){
            f=4;
        }else if(j>3550){
            f=3;
        }else if(j>2980){
            f=2;
        }else if(j>2250){
            f=1;
        }else if(j>1450){
            f=0;
        }else{
            f=-1;
        }
        // alert(f);

        if(f==-1){
            $('.left_bar').hide();
        }else{
            $('.left_bar').show();
            $('.left_bar li').eq(f).addClass('active').siblings('li').removeClass('active');
            $('.floor').eq(f).find('h3').attr('class','active').parent().siblings('.floor').find('h3').removeClass('active');
        }
    })

    $('.left_bar li').click(function(){ //点击跳转
        var i = $(this).index();
        // $('.floor').eq(i).find('h3').animateToClass("active", 1000);
        
        // $('.floor').eq(i).find('h3').attr('class','active').parent().siblings('.floor').find('h3').removeClass('active');
        $('.floor').eq(i).find('h3').animateToClass("active", 1000).parent().siblings('.floor').find('h3').removeClass('active');
        switch(i) {
            case(0):
                $('html,body').animate({'scrollTop': '1710px'}, 500)
                break;
            case(1):
                $('html,body').animate({'scrollTop': '2467px'}, 500)
                break;
            case(2):
                $('html,body').animate({'scrollTop': '3200px'}, 500)
                break;
            case(3):
                $('html,body').animate({'scrollTop': '3800px'}, 500)
                break;
            case(4):
                $('html,body').animate({'scrollTop': '4400px'}, 500)
                break;
            case(5):
                $('html,body').animate({'scrollTop': '5130px'}, 500)
                break;
            case(6):
                $('html,body').animate({'scrollTop': '5730px'}, 500)
                break;
            case(7):
                $('html,body').animate({'scrollTop': '6330px'}, 500)
                break;
            case(8):
                $('html,body').animate({'scrollTop': '6930px'}, 500)
                break;
            case(9):
                $('html,body').animate({'scrollTop': '7675px'}, 500)
                break;
            case(10):
                $('html,body').animate({'scrollTop': '8275px'}, 500)
                break;
        }
    })
})

$(function(){
    $('.jd_toolbar .mid li').hover(function(){
        // alert();
        $(this).find('.ico').css('background-color','#C81623')
        $(this).find('.title').css('background-color','#C81623')
        $(this).find('.title').stop().animate({'left':-60}, 300)
    },function(){
        $(this).find('.ico').css('background-color','#7A6E6E')
        $(this).find('.title').css('background-color','#7A6E6E')
        $(this).find('.title').stop().animate({'left':0}, 300)
    })
    $('.jd_toolbar .bot .top').click(function() {
        $('html,body').animate({'scrollTop':'0'},300);
    });
});




