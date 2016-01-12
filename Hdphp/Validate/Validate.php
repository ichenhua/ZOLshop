<?php namespace Hdphp\Validate;

use Closure;

class Validate extends VaAction
{

    public function make($validates,array $data=array())
    {
        $data = $data?$data:$_POST;

        foreach($validates as $validate)
        {
            //字段名
            $field = $validate[0];
            
            //验证规则
            $actions = explode('|',$validate[1]);

            //错误信息
            $message = $validate[2];

            //表单值
            $value = isset($data[$field])?$data[$field]:'';

            foreach($actions as $action)
            {
                $info = explode(':', $action);
                $method= $info[0];
                $params = isset($info[1])?$info[1]:'';

                if(method_exists($this, $method))
                {
                    //类方法验证
                    if($this->$method($field,$value,$params)!==true)
                    {
                        $_SESSION['_validate']= $this->message = $message;
                        return $this;
                    }
                }
                else if(isset(self::$validate[$method]))
                {
                    $callback = self::$validate[$method];
                    if($callback instanceof Closure)
                    {
                        //闭包函数
                        if($callback($field,$value,$params)!==true)
                        {
                            $_SESSION['_validate']=$this->message = $message;

                            return $this;
                        }
                    }
                }
            }
        }

        $_SESSION['_validate']=$this->message = '';
        return $this;
    }

    //添加验证闭包
    public function extend($name,$callback)
    {
        if($callback instanceof Closure)
        {
            self::$validate[$name]=$callback;
        }
    }

    //验证失败检测
    public function fail()
    {
        return !empty($this->message);
    }

    //获取错误信息
    public function message()
    {
        return $this->message;
    }
    

}