<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理模板</title>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/font/css/font-awesome.min.css"/>
</head>
<body>
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form method="post" enctype="multipart/form-data">
                <table class="insert-tab" width="100%">
                    <tbody>
                        <tr>
                            <th width="120"><i class="require-red">*</i>文章标题：</th>
                            <td>
                            <input name="article_id" value="{{$article['article_id']}}" type="hidden">
                                <input class="common-text required" name="article_title" size="50" value="{{$article['article_title']}}" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th>作者：</th>
                            <td>
                                <input class="common-text required" name="article_author" size="20" value="{{$article['article_author']}}" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th>文章详情</th>
                            <td>
                                <link rel="stylesheet" href="Public/org/kindeditor/themes/default/default.css" />
                                <script charset="utf-8" src="Public/org/kindeditor/kindeditor-min.js"></script>
                                <script charset="utf-8" src="Public/org/kindeditor/lang/zh_CN.js"></script>
                                <script>
                                    var editor;
                                    KindEditor.ready(function(K) {
                                        editor = K.create('textarea[name="article_content"]', {
                                            allowFileManager : true
                                        });
                                    });
                                </script>
                                <textarea name="article_content" style="width:98%;height:400px;visibility:hidden;">{{$article['article_content']}}</textarea>
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
                

                </form>
            </div>
        </div>
    </div>
    <!--/main-->
</body>
</html>