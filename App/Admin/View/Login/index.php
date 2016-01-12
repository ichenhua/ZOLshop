<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/font/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/admin_login.css"/>
</head>
<body>
    <h1>Shop</h1>
    <h2>欢迎登陆商城管理后台</h2>
    <div class="admin_input">
        <form action="#" method="post">
            <ul class="admin_items">
                <li>
                    <input type="text" name="username" class="text" size="40"/>
                    <span><i class="icon-user"></i></span>
                </li>
                <li>
                    <input type="password" name="password" class="text" size="40"/>
                    <span><i class="icon-lock"></i></span>
                </li>
                <li>
                    <input type="text" name="code" class="code" size="20"/>
                    <img src="{{U('code')}}" onclick="this.src='{{U('code')}}&'+Math.random()" />
                    <span><i class="icon-warning-sign"></i></span>
                </li>
                <li>
                    <input type="submit" value="立即登陆"/>
                </li>
            </ul>
        </form>
    </div>
    <p class="admin_copyright"><a href="#">返回首页</a> &copy; 2015 Powered by <a href="http://jscss.me" target="_blank">ChenHua</a></p>
</body>
</html>