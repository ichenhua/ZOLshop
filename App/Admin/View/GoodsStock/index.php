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
    <div class="result-wrap">
        <form name="myform" id="myform" action="{{U('add')}}" method="post">
            <div class="result-title">
                <h1>商品：{{$goodsData['goods_name']}}</h1>
                <input type="hidden" name="goods_id" value="{{$goodsData['goods_id']}}"> 
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>

                        <?php foreach ($attrName as $key => $value): ?>
                            <th>{{$value}}</th>
                        <?php endforeach ?>                        

                        <th>货号</th>
                        <th>库存</th>
                    </tr>
                    <?php foreach ($attrData as $k => $v) {?>
                    <tr>
                        <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                        <?php foreach ($v as $m => $n): ?>
                            <td><?php echo Db::table('goods_attr')->where('goods_attr_id',$n)->pluck('goods_attr_value'); ?></td>
                        <?php endforeach ?>
                        
                        <td>
                        <?php $stock_attr = implode("-", $v);
                        //读取原始库存信息
                        $info = Db::table('goods_stock')->where('stock_attr',$stock_attr)->first();
                        if(!$info){
                            $info['stock_goods_sn'] = 0;
                            $info['stock_count'] = 0;
                        }
                        ?>
                        <input type="hidden" name="stock_attr[]" value="{{$stock_attr}}">
                            <input type="text" name="stock_goods_sn[]" value="{{$info['stock_goods_sn']}}">
                        </td>
                        <td>
                           <input type="text" name="stock_count[]" value="{{$info['stock_count']}}">
                        </td>
                    </tr>
                    <?php }?>
                </table>

                <p>1、添加货品记录以库存数量为准，数量为0时不添加记录</p>
                <p>2、添加时，库存不为0，货号为空时，自动生成货号</p>
                <p>3、修改时，库存为0，只改变库存数量，不改变货号及其他值</p>
                <p>4、修改时，添加和修改混排，用属性组合字符串反查库存记录id，如果不存在则添加，存在即为修改</p>
                <p>5、添加时要unset掉前一条记录操作时溢出的id</p>
                
                <div class="btn_group">
                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                </div>

            </div>
        </form>
    </div>
</div>
<!--/main-->

</body>
</html>