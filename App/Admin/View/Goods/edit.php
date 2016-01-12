<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理模板</title>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/font/css/font-awesome.min.css"/>
    <script type="text/javascript" src="Public/org/jquery.min.js"></script>
    <script type="text/javascript" src="Public/admin/js/tab.js"></script>
    <script type="text/javascript" src="{{__VIEW__}}/Goods/goods.js"></script>
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
                <input type="hidden" name="shop_type_id" value="">
                <ul class="tab-title">
                    <li class="active">基本信息</li>
                    <li>商品图集</li>
                    <li>商品属性</li>
                    <li>详细描述</li>
                    <li>售后服务</li>
                </ul>
                <!--基本信息 开始-->
                <div class="tab-content">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th width="120"><i class="require-red">*</i>商品名称：</th>
                                <td><input type="hidden" name="goods_id" value="{{$field['goods_id']}}">
                                    <input class="common-text required" id="title" name="goods_name" size="50" value="{{$field['goods_name']}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>分类：</th>
                                <td>
                                    <select name="cate_id">
                                        <?php foreach ($cateData as $k => $v) { ?>
                                        <option value="{{$v['cate_id']}}"
                                        {{if value="$v['cate_id']==$field['cate_id']"}}selected{{endif}}
                                        >{{$v['_cate_name']}}</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>市场价：</th>
                                <td>
                                    <input class="common-text required" id="title" name="shop_price" size="20" value="{{$field['shop_price']}}" type="text"> 元
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商城价：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_price" size="20" value="{{$field['goods_price']}}" type="text"> 元
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td>
                                    {{if value="$field['thumb_pic']"}}
                                    <img src="{{$field['thumb_pic']}}" style="width:50px;">
                                    <input type="hidden" name="thumb_pic" value="{{$field['thumb_pic']}}">
                                    {{endif}}
                                    <input type="file" name="thumb_pic">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>列表显示图：</th>
                                <td>
                                    {{if value="$field['list_pic']"}}
                                    <img src="{{$field['list_pic']}}" style="width:50px;">
                                    <input type="hidden" name="list_pic" value="{{$field['list_pic']}}">
                                    {{endif}}
                                    <input type="file" name="list_pic">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品货号：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_sn" size="50" value="{{$field['goods_sn']}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品单位：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_unit" size="10" value="{{$field['goods_unit']}}" type="text"> 件、个、台等
                                </td>
                            </tr>
                            <tr>
                                <th>品牌：</th>
                                <td>
                                    <select name="brand_id">
                                        <?php foreach ($brandData as $k => $v) { ?>
                                        <option value="{{$v['brand_id']}}"
                                        {{if value="$v['brand_id']==$field['brand_id']"}}selected{{endif}}
                                        >{{$v['brand_name']}}</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>点击数：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_click" size="10" value="{{$field['goods_click']}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>库存：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_store" size="20" value="{{$field['goods_store']}}" type="text">
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
                <!--基本信息 结束-->

                <!--商品图集 结束-->
                <div class="tab-content">
                    <ul class="list_pic">
                        <?php foreach ($picsData as $k => $p): ?>
                        <li id="pics{{$p['pics_id']}}"><img src="{{$p['pics_small']}}" style="width:100px;"><span onclick="del({{$p['pics_id']}})"><i class="icon-remove"></i></span></li>
                        <?php endforeach ?>
                    </ul>
                    <ul class="list_text">
                    <li><input type="file" name="pics[]"> <span onclick="plus(this)"><i class="icon-plus"></i></span></li>
                    </ul>
                </div>
                <!--商品图集 结束-->

                <!--商品属性 结束-->
                <div class="tab-content">
                    <table class="insert-tab" width="100%">
                    <tr>
                        <th width="150">商品类型</th>
                        <td width="150">
                            <select name="type_id" onchange="selectAttr({{$field['type_id']}},{{$field['goods_id']}})">
                                <option value="">==选择属性==</option>
                                <?php foreach ($typeData as $k => $v): ?>
                                    <option value="{{$v['type_id']}}"
                                    {{if value="$v['type_id']==$field['type_id']"}}
                                    selected
                                    {{endif}}
                                    >{{$v['type_name']}}</option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tbody id="shop_attr">
                        <script>
                            attrList({{$field['goods_id']}});
                        </script>
                    </tbody>
                    </table>
                    <p>注释：</p>
                    <p>1、默认选中当前商品的商品类型，同时要用js改变属性列表的默认状态</p>
                    <p>2、修改商品属性时，读取当前商品所属分类下的所有属性</p>
                    <p>3、关联当前商品的商品属性</p>
                    <p>4、左关联，防止添加时没有设置相应属性值，或者新增商品属性</p>
                    <p>5、以attr_type和attr_id排序，让属性和规格分开，同时让同属性的记录不分散</p>
                    <p>6、关联结果中，商品已经设置的属性有goods_id，没有设置的则为null，筛选时要注意 (ga.goods_id={$goods_id} OR ga.goods_id is null)</p>
                    <p>7、修改时已是否有goods_attr_id为判断条件，id不为0的修改，为0的添加，添加时要注意unset掉前一条溢出的id值</p>
                    <p>8、js复制当前tr记录时，要将复制进去goods_attr_id重置为0</p>
                    <p>9、添加和删除过程中，异步获取数据后，用js缓存数据，不需要多次发送异步请求</p>
                </div>
                <!--商品属性 结束-->

                <!--商品详情 结束-->
                <div class="tab-content">
                    <table class="insert-tab" width="100%">
                        <tr>
                            <th>关键词</th>
                            <td>
                                <textarea name="keywords" class="common-textarea" cols="30" style="width: 98%;" rows="3">{{$field['keywords']}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>描述</th>
                            <td>
                                <textarea name="discription" class="common-textarea" cols="30" style="width: 98%;" rows="3">{{$field['discription']}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>商品详情</th>
                            <td>
                                <link rel="stylesheet" href="Public/org/kindeditor/themes/default/default.css" />
                                <script charset="utf-8" src="Public/org/kindeditor/kindeditor-min.js"></script>
                                <script charset="utf-8" src="Public/org/kindeditor/lang/zh_CN.js"></script>
                                <script>
                                    var editor;
                                    KindEditor.ready(function(K) {
                                        editor = K.create('textarea[name="content"]', {
                                            allowFileManager : true
                                        });
                                    });
                                </script>
                                <textarea name="content" style="width:98%;height:400px;visibility:hidden;">{{$field['content']}}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--商品详情 结束-->

                <!--售后服务 结束-->
                <div class="tab-content">
                    <script>
                        var editor;
                        KindEditor.ready(function(K) {
                            editor = K.create('textarea[name="service"]', {
                                allowFileManager : true
                            });
                        });
                    </script>
                    <textarea name="service" style="width:800px;height:400px;visibility:hidden;">{{$field['service']}}</textarea>
                </div>
                <!--售后服务 结束-->
                
                <div class="btn_group">
                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--/main-->
</body>
</html>