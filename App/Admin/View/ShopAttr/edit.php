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
                <input type="hidden" name="attr_id" value="{{$_GET['attr_id']}}">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>属性名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="attr_name" size="50" value="{{$field['attr_name']}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>属性类型</th>
                                <td>
                                    <label>
                                        <input type="radio" name="attr_type" value="1"
                                        {{if value="$field['attr_type']==1"}} checked {{endif}}
                                        >属性
                                    </label>
                                    <label>
                                        <input type="radio" name="attr_type" value="2"
                                        {{if value="$field['attr_type']==2"}} checked {{endif}}
                                        > 规格 
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>表单类型</th>
                                <td>
                                    <label>
                                        <input type="radio" name="show_type" value="1"
                                        {{if value="$field['show_type']==1"}} checked {{endif}}
                                        >文本框
                                    </label>
                                    <label>
                                        <input type="radio" name="show_type" value="2"
                                        {{if value="$field['show_type']==2"}} checked {{endif}}
                                        >单选框
                                    </label>
                                    <label>
                                        <input type="radio" name="show_type" value="3"
                                        {{if value="$field['show_type']==3"}} checked {{endif}}
                                        >复选框
                                    </label>
                                    <label>
                                        <input type="radio" name="show_type" value="4"
                                        {{if value="$field['show_type']==4"}} checked {{endif}}
                                        >下拉列表框 
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>属性值</th>
                                <td>
                                    <textarea name="attr_value" class="common-textarea" cols="30" style="width: 98%;" rows="10">{{$field['attr_value']}}</textarea>
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