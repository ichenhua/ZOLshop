<?php namespace Hdphp\View;

use Hdphp\View\TagBase;

class HdphpTag extends TagBase
{
    /**
     * block 块标签
     * level 嵌套层次
     *
     * @var array
     */
    public $tags
        = array(
            'foreach'   => array('block' => true, 'level' => 5),
            'list'      => array('block' => true, 'level' => 5),
            'if'        => array('block' => true, 'level' => 5),
            'elseif'    => array('block' => false),
            'else'      => array('block' => false),
            'jquery'    => array('block' => false),
            'angular'   => array('block' => false),
            'bootstrap' => array('block' => false),
            'js'        => array('block' => false),
            'css'       => array('block' => false),
            'include'   => array('block' => false),
        );

    //jquery前端库
    public function _jquery($attr, $content, &$view)
    {
        return '<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>';
    }

    //angular.js前端库
    public function _angular($attr, $content, &$view)
    {
        return '<script src="http://cdn.bootcss.com/angular.js/1.4.0-rc.2/angular.min.js"></script>';
    }

    //bootstrap前端库
    public function _bootstrap($attr, $content, &$view)
    {
        return '
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        ';
    }

    //引入CSS文件
    public function _css($attr, $content, &$view)
    {
        return "<link type=\"text/css\" rel=\"stylesheet\" href=\"{$attr['file']}\"/>";
    }

    //引入JavaScript文件
    public function _js($attr, $content, &$hd)
    {
        return "<script type=\"text/javascript\" src=\"{$attr['file']}\"></script>";
    }

    //list标签
    public function _list($attr, $content, &$view)
    {
        $from  = $attr['from']; //变量
        $name  = substr($attr['name'], 1);//name名
        $empty = isset($attr['empty']) ? $attr['empty'] : '';//默认值
        $row   = isset($attr['row']) ? $attr['row'] : 500;//显示条数
        $step  = isset($attr['step']) ? $attr['step'] : 1;//间隔
        $start = isset($attr['start']) ? $attr['start'] : 0;//开始数
        $php
               = <<<php
        <?php
        if (empty($from)) 
        {
            echo '$empty';
        } 
        else 
        {
            //初始化
            \$first=\$last=\$total=\$index=\$id=0;
            \$hd['list']['$name']['first']=&\$first;
            \$hd['list']['$name']['last']=&\$last;
            \$hd['list']['$name']['total']=&\$total;
            \$hd['list']['$name']['index']=&\$index;
            foreach ($from as \$$name) 
            {
                //开始值
                if (\$id<$start)
                {
                    \$id++;
                    continue;
                }
                //步长
                if(\$id%$step!=0)
                {   
                    \$id++;
                    continue;
                }
                //显示条数
                if(\$index>=$row)
                {
                    break;
                }
                //第几个值
                \$index+=1;
                //第1个值
                \$first=(\$id == $start);
                //最后一个值
                \$last=(\$index == $row);
                //增加数
                \$id+=1;
            ?>
php;
        $php .= $content;
        $php
            .= "<?php }
            //总数
            \$total=\$index;
        }?>";

        return $php;
    }

    //标签处理
    public function _foreach($attr, $content)
    {
        if (isset($attr['key']))
        {
            $php = "<?php foreach ({$attr['from']} as {$attr['key']}=>{$attr['value']}){?>";
        }
        else
        {
            $php = "<?php foreach ({$attr['from']} as {$attr['value']}){?>";
        }
        $php .= $content;
        $php .= '<?php }?>';

        return $php;
    }

    //加载模板文件
    public function _include($attr, $content, &$view)
    {
        return \View::fetch($this->replaceConst($attr['file']), 0, false);
    }

    //if标签
    public function _if($attr, $content, &$hd)
    {
        $php
            = "<?php if({$attr['value']}){?>
                $content
               <?php }?>";

        return $php;
    }

    //elseif标签
    public function _elseif($attr, $content, &$view)
    {
        return "<?php }else if({$attr['value']}){?>";
    }

    //else标签
    public function _else($attr, $content, &$view)
    {
        return "<?php }else{?>";
    }

}