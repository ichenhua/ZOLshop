<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理模板</title>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/font/css/font-awesome.min.css"/>
    <script type="text/javascript" src="Public/admin/js/libs/modernizr.min.js"></script>
</head>
<body>
    <div class="topbar-wrap">
        <div class="topbar-inner clearfix">
            <div class="topbar-logo-wrap clearfix">
                <h1 class="topbar-logo"><a href="#" class="navbar-brand">Shop后台管理</a></h1>
                <ul class="navbar-list clearfix">
                    <li><a class="on" href="index.html">首页</a></li>
                    <li><a href="#">管理员</a></li>
                </ul>
            </div>
            <div class="top-info-wrap">
                <ul class="top-info-list clearfix">
                    <li>管理员：{{$_SESSION['username']}}</li>
                    <li><a href="{{U('Login/password')}}" target="main">修改密码</a></li>
                    <li><a href="{{U('Login/out')}}">退出</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sidebar-wrap">
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-cog"></i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="{{U('Goods/index')}}" target="main"><i class="icon-folder-open"></i>商品列表</a></li>
                        <li><a href="{{U('Goods/add')}}" target="main"><i class="icon-folder-open"></i>添加商品</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-inbox"></i>商品辅助</a>
                    <ul class="sub-menu">
                        <li><a href="{{U('ShopCate/index')}}" target="main"><i class="icon-folder-open"></i>商品栏目</a></li>
                        <li><a href="{{U('ShopType/index')}}" target="main"><i class="icon-tasks"></i>商品类型</a></li>
                        <li><a href="{{U('ShopAttr/index')}}" target="main"><i class="icon-beaker"></i>商品属性</a></li>
                        <li><a href="{{U('ShopBrand/index')}}" target="main"><i class="icon-folder-open"></i>品牌管理</a></li>
                        <li><a href="{{U('Goods/goods_delete')}}" target="main"><i class="icon-tasks"></i>回收站</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-cog"></i>订单管理</a>
                    <ul class="sub-menu">
                        <li><a href="{{U('Order/lists')}}" target="main"><i class="icon-briefcase"></i>订单列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-cog"></i>文章管理</a>
                    <ul class="sub-menu">
                        <li><a href="{{U('Article/add')}}" target="main"><i class="icon-briefcase"></i>添加文章</a></li>
                        <li><a href="{{U('Article/index')}}" target="main"><i class="icon-briefcase"></i>全部文章</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-cog"></i>系统设置</a>
                    <ul class="sub-menu">
                        <li><a href="{{U('Backup/index')}}" target="main"><i class="icon-briefcase"></i>数据备份</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->


    <div class="main-frame">
       <iframe src="" frameborder="0" width="100%" height="100%" name="main"></iframe> 
    </div>
    <!--/main-->

    <div class="bottom-wrap">
        CopyRight © 2015. Powered By ChenHua. Email:276004561@qq.com
    </div>
    <!--/bottom-->
</body>
</html>