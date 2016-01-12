<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Public/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/font/css/font-awesome.min.css"/>
    <script type="text/javascript" src="Public/admin/js/libs/modernizr.min.js"></script>
</head> 
<body>
<div class="main-wrap">
    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-home icon-large"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
    </div>
    <div class="result-wrap">
        <form method="post">
            <div class="result-content">
                <table class="insert-tab" width="100%">
                    <tbody>
                        <tr>
                            <th>用户名：</th>
                            <td>
                                {{$_SESSION['username']}}
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>原密码：</th>
                            <td>
                                <input name="id" value="{{$_SESSION['user_id']}}" type="hidden">
                                <input class="common-text required" name="password_o" size="32" type="password">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>新密码：</th>
                            <td>
                                <input class="common-text required" name="password" size="32" type="password">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>确认密码：</th>
                            <td>
                                <input class="common-text required" name="password_c" size="32" type="password">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<!--/main-->

</body>
</html>