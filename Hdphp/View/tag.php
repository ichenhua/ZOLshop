<?php namespace Common\Tag;

use Hdphp\View\TagBase;

class Common extends TagBase
{
    /**
     * 标签声明
     * @var array
     */
    public $tags = array(
        'test' => array('block' => 1, 'level' => 4),
    );

    /**
     * 测试标签
     * @param $attr 属性
     * @param $content 内容
     * @param $hd HdView模型引擎对象
     */
    public function _test($attr, $content, &$hd)
    {
        return '33';
    }
}