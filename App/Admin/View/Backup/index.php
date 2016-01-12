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
        <div class="result-title">
            <div class="result-list">
                <a href="{{U('backup')}}"><i class="icon-pencil"></i>备份</a>
            </div>
        </div>
        <div class="result-content">
            <table class="result-tab" width="100%">
                <tr>
                    <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                    <th>文件夹</th>
                    <th>时间</th>
                    <th>大小</th>
                    <th>操作</th>
                </tr>
                <?php foreach ($data as $k => $v) {?>
                <tr>
                    <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                    <td>{{$v['filename']}}</td>
                    <td>{{date('Y/m/d H:i:s',$v['filemtime'])}}</td>
                    <td>{{get_size($v['size'],2)}}</td>
                    <td>
                        <a href="{{U('recovery',array('dir'=>$v['filename']))}}"> 还原 </a>
                        <a href="javascript:del('{{$v['filename']}}');"> 删除 </a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>
<!--/main-->
<script>
function del(dir){
    var re = confirm('确定要删除这个备份吗？');
    if(re){
        location.href = '{{U('del')}}&dir='+dir;
    }
};
</script>
</body>
</html>