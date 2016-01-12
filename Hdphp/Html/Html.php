<?php namespace Hdphp\Html;

class Html
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * 生成静态
     *
     * @param $controller 控制器
     * @param $action     动作
     * @param $file       静态文件
     *
     * @return int
     */
    public function make($controller, $action, $file)
    {
        ob_start();
        $this->app->make($controller)->$action();
        $data = ob_get_clean();

        //目录检测
        if ( ! is_dir(dirname($file)))
        {
            mkdir(dirname($file), 0755, true);
        }

        //创建静态文件
        return file_put_contents($file, $data)!==false;
    }
}