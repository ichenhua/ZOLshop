<?php namespace Hdphp\View;

class Compile
{
    //视图对象
    private $view;

    //模板编译内容
    private $content;

    function __construct(&$view)
    {
        $this->view = $view;
    }

    //运行编译
    public function run()
    {
        //模板内容
        $this->content = file_get_contents($this->view->tpl);

        //解析标签
        $this->tags();

        //解析全局变量与常量
        $this->globalParse();

        //创建令牌代码
        $this->createToken();

        //保存编译文件
        return $this->content;
    }

    /**
     * 解析全局变量与常量
     *
     * @return [type] [description]
     */
    private function globalParse()
    {
        //处理{{}}
        $this->content = preg_replace('/(?<!@)\{\{(.*?)\}\}/i', '<?php echo \1?>', $this->content);

        //处理@{{}}
        $this->content = preg_replace('/@(\{\{.*?\}\})/i', '\1', $this->content);
    }

    /**
     * 创建令牌
     *
     * @return [type] [description]
     */
    private function createToken()
    {
        if (preg_match_all('/(<form>.*?)<\/form>/is', $this->content, $matches, PREG_SET_ORDER))
        {
            foreach ($matches as $id => $m)
            {
                $key           = substr($this->view->compile, 0, 5) . $id;
                $value         = md5(time() . mt_rand(1, 999));
                $token         = $key . '_' . $value;
                $php           = "<input type='hidden' name='" . C('app.token_name') . "' value='" . $token . "'";
                $this->content = str_replace($m[1], $m[1] . $php, $this->content);
            }
        }
    }

    /**
     * 解析标签
     *
     * @return [type] [description]
     */
    private function tags()
    {
        //标签库
        $tags   = Config::get('view.tags');
        $tags[] = 'Hdphp\View\HdphpTag';

        //解析标签
        foreach ($tags as $class)
        {
            $obj           = new $class();
            $this->content = $obj->parse($this->content, $this->view);
        }
    }
}