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
        <div class="crumb-list"><i class="icon-home icon-large"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form action="/jscss/admin/design/index" method="post">
                <table class="search-tab">
                    <tr>
                        <th width="120">选择分类:</th>
                        <td>
                            <select name="" onchange="javascript:location.href=this.value;">
                                <option value="{{U('Goods/index')}}" selected>全部</option>
                                <?php foreach ($cateData as $k => $v) {?>
                                <option value="{{U('Goods/index',array('cate_id'=>$v['cate_id']))}}"
                                {{if value="Q('cate_id')==$v['cate_id']"}}
                                selected
                                {{endif}}
                                >{{$v['_cate_name']}}</option>
                                <?php }?>
                            </select>
                        </td>
                        <th width="70">关键字:</th>
                        <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                        <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a href="{{U('add')}}"><i class="icon-plus"></i>新增商品</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>标题</th>
                        <th>品牌</th>
                        <th>分类</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach ($data['data'] as $k => $v) {?>
                    <tr>
                        <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                        <td>{{$v['goods_id']}}</td>
                        <td>{{$v['goods_name']}}</td>
                        <td><a href="{{U('Goods/index',array('cate_id'=>$v['cate']['cate_id']))}}">{{$v['cate']['cate_name']}}</a></td>
                        <td>{{$v['brand']['brand_name']}}</td>
                        <td>
                        <a href="{{U('re_is_delete',array('goods_id'=>$v['goods_id']))}}"> 上架 </a> <a href="{{U('GoodsStock/index',array('goods_id'=>$v['goods_id']))}}"> 库存 </a> <a href="{{U('edit',array('goods_id'=>$v['goods_id']))}}"> 修改 </a> <a href="{{U('is_delete',array('goods_id'=>$v['goods_id']))}}" onclick="return confirm('确定要彻底删除商品吗?')"> 彻底删除 </a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <div class="list-page">{{$data['page']}}</div>
            </div>
        </form>
    </div>
</div>
<!--/main-->

</body>
</html>