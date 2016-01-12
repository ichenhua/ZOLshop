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
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form method="post" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>品牌名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="brand_name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>所属分类</th>
                                <td>
                                    <select name="cate_id">
                                        <?php foreach ($cateData as $k => $v): ?>
                                            <option value="{{$v['cate_id']}}">{{$v['_cate_name']}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>品牌LOGO</th>
                                <td>
                                    <input name="brand_logo" type="file"> 
                                </td>
                            </tr>
                            <tr>
                                <th>属性</th>
                                <td>
                                    <input name="brand_hot" type="checkbox" value="1"> 热门
                                </td>
                            </tr>
                            <tr>
                                <th>品牌描述</th>
                                <td>
                                    <textarea name="brand_desc" class="common-textarea" cols="30" style="width: 98%;" rows="3"></textarea>
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