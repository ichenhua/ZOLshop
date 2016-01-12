<?php
namespace Hdphp\Controller;

class Controller
{
    //事件参数
    protected $options = array();

    public function __construct()
    {
        \Hdphp\Hook\Hook::listen('controller_begin', $this->options);

        if (method_exists($this, '__init'))
        {
            $this->__init();
        }
    }

    /**
     * 分配变量
     *
     * @param  [type] $name  [description]
     * @param  [type] $value [description]
     *
     * @return [type]        [description]
     */
    protected function assign($name, $value)
    {
        View::with($name, $value);

        return $this;
    }

    /**
     * 显示模板
     *
     * @param  [type] $tpl [description]
     *
     * @return [type]      [description]
     */
    protected function display($tpl = '')
    {
        View::make($tpl);
    }

    /**
     * 通过魔术方法设置变量
     *
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public function __set($name, $value)
    {
        $this->assign($name, $value);
    }

    protected function success($message = '操作成功', $url = null, $time = 1)
    {
        View::success($message, $url, $time);
    }

    protected function error($message = '操作失败', $url = null, $time = 1)
    {
        View::error($message, $url, $time);
    }

    /**
     * Ajax输出
     *
     * @param        $data 数据
     * @param string $type 数据类型 text html xml json
     */
    protected function ajax($data, $type = "JSON")
    {
        View::ajax($data, $type);
    }

    public function __destruct()
    {
        \Hdphp\Hook\Hook::listen('controller_end', $this->options);
    }

    public function __call($method, $params)
    {

    }
}