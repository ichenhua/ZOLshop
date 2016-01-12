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
                <form method="post">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th width="120"><i class="require-red">*</i>父级分类：</th>
                                <td>
                                    <select name="pid" class="required">
                                        <option value="0">顶级分类</option>
                                        <?php foreach ($data as $k => $v) {?>
                                        <option value="{{$v['cate_id']}}">{{$v['_cate_name']}}</option>
                                        <?php }?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>分类名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="cate_name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>搜索规格类型</th>
                                <td>
                                    <select name="type_id">
                                        <option value="0">==选择类型==</option>
                                        <?php foreach ($typeData as $k => $v): ?>
                                            <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>价格区间</th>
                                <td>
                                    <textarea name="price_level" class="common-textarea" cols="30" style="width:450px" rows="5"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>关键词</th>
                                <td>
                                    <textarea name="keywords" class="common-textarea" cols="30" style="width: 98%;" rows="3"></textarea>
                                    <span>注：添加三级分类时才需要添加价格区间，以供按价格搜索</span>
                                </td>
                            </tr>
                            <tr>
                                <th>描述</th>
                                <td>
                                    <textarea name="desc" class="common-textarea" cols="30" style="width: 98%;" rows="3"></textarea>
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