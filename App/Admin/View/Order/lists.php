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
                        <th width="120">订单状态:</th>
                        <td>
                            <select name="" onchange="javascript:location.href=this.value;">
                                <option value="#" selected>全部</option>
                                <option value="#" selected>未付款</option>
                                <option value="#" selected>待发货</option>
                                <option value="#" selected>已发货</option>
                                <option value="#" selected>未评价</option>
                                <option value="#" selected>已完成</option>
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
        <div class="result-content">
            <?php foreach ($order as $k => $v): ?>
                <table width="100%" class="order_list">
                    <tr>
                        <th colspan="5">
                            <p class="blod">订单号：{{$v['order_sn']}}</p>
                            <p>创建时间：{{date('Y/m/d H:i',$v['create_at'])}}</p>
                            <p class="blod">总价：{{$v['order_price']}}</p>
                            <p class="red">当前状态：
                            <?php
                                switch ($v['order_state']) {
                                    case 0:
                                    echo '未付款</p> <p><a href="#">更改状态>></a>';
                                        break;
                                    case 1:
                                        echo '已付款';
                                        break;
                                    case 2:
                                        echo '已发货';
                                        break;
                                    case 3:
                                        echo '已完成';
                                        break;
                                    case 4:
                                        echo '已完成';
                                        break;
                                }
                            ?>
                            </p>
                        </th>
                    </tr>

                    <?php foreach ($v['order_list'] as $m => $n): ?>
                    <tr>
                        <td class="t-1">
                            <img src="{{__ROOT__}}/{{$n['goods_info']['thumb_pic']}}">
                        </td>
                        <td class="t-2">
                            <a href="#">{{$n['goods_info']['goods_name']}}</a>
                            <p>{{$n['attr_info']}}</p>
                        </td>
                        <td class="t-3">{{$n['list_price']}}</td>
                        <td class="t-4">{{$n['buy_num']}}</td>
                        <td class="t-5"><a href="{{U('Home/Goods/index',array('goods_id'=>$n['goods_info']['goods_id']))}}" target="_blank">查看</a></td>
                    </tr>
                    <?php endforeach ?>

                </table>
            <?php endforeach ?>
            <div class="list-page"></div>
        </div>
    </div>
</div>
<!--/main-->

</body>
</html>