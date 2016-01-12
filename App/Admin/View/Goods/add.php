<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理模板</title>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="Public/admin/font/css/font-awesome.min.css"/>
    <script type="text/javascript" src="Public/org/jquery.min.js"></script>
    <script type="text/javascript" src="Public/admin/js/tab.js"></script>
    <script type="text/javascript" src="Public/admin/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="{{__VIEW__}}/Goods/goods.js"></script>
</head>
<body>
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
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
                                <td>
                                    <input class="common-text required" id="title" name="goods_name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>市场价：</th>
                                <td>
                                    <input class="common-text required" id="title" name="shop_price" size="20" value="" type="text"> 元
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商城价：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_price" size="20" value="" type="text"> 元
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td>
                                    <input type="file" name="thumb_pic">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>列表显示图：</th>
                                <td>
                                    <input type="file" name="list_pic">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品货号：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_sn" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>商品单位：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_unit" size="10" value="" type="text"> 件、个、台等
                                </td>
                            </tr>
                            <tr>
                                <th>品牌：</th>
                                <td>
                                    <select name="brand_id">
                                        <?php foreach ($brandData as $k => $v) { ?>
                                        <option value="{{$v['brand_id']}}">{{$v['brand_name']}}</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>分类：</th>
                                <td>
                                    <select name="cate_id">
                                        <?php foreach ($cateData as $k => $v) { ?>
                                        <option value="{{$v['cate_id']}}">{{$v['_cate_name']}}</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>点击数：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_click" size="10" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>库存：</th>
                                <td>
                                    <input class="common-text required" id="title" name="goods_store" size="20" value="" type="text">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--基本信息 结束-->

                <!--商品图集 结束-->
                <div class="tab-content">
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
                            <select name="type_id" onchange="getAttrList()">
                                <option value="">==选择属性==</option>
                                <?php foreach ($typeData as $k => $v): ?>
                                    <option value="{{$v['type_id']}}">{{$v['type_name']}}</option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tbody id="shop_attr">
                    <!-- <tr>
                        <th><span onclick="plus(this)"><i class="icon-plus"></i></span> 尺寸</th>
                        <td>
                            <select name="" id="">
                                <option value="">M</option>
                                <option value="">L</option>
                                <option value="">XL</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th><span onclick="plus(this)"><i class="icon-plus"></i></span> 颜色</th>
                        <td>
                            <select name="" id="">
                                <option value="">红</option>
                                <option value="">黄</option>
                                <option value="">蓝</option>
                            </select>
                        </td>
                        <td>加价：<input type="text" size="10" class="common-text"> 元</td>
                    </tr>
                    <tr>
                        <th>人群</th>
                        <td>
                            <input type="text" class="common-text">
                        </td>
                        <td>加价：<input type="text" size="10" class="common-text"> 元</td>
                    </tr> -->
                    </tbody>
                    </table>
                </div>
                <!--商品属性 结束-->

                <!--商品详情 结束-->
                <div class="tab-content">
                    <table class="insert-tab" width="100%">
                        <tr>
                            <th>关键词</th>
                            <td>
                                <textarea name="keywords" class="common-textarea" cols="30" style="width: 98%;" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>描述</th>
                            <td>
                                <textarea name="discription" class="common-textarea" cols="30" style="width: 98%;" rows="3"></textarea>
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
                                <textarea name="content" style="width:98%;height:400px;visibility:hidden;"></textarea>
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
                    <textarea name="service" style="width:800px;height:400px;visibility:hidden;"></textarea>
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