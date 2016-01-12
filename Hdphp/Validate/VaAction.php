<?php namespace Hdphp\Validate;

class VaAction
{

	//闭包函数
	public static $validate=array();

	//错误信息
	public $message;

	/**
     * 内容不能为空
     *
     * @param $name
     * @param $value
     * @param $msg
     *
     * @return bool
     */
	public function required($name, $value, $params)
	{
		if (!empty($value))
		{
			return true;
		}
	}

	//自动验证字段值唯一
	private function unique($field,$value,$param)
	{
		if(!Db::table($param)->where($field,$value)->first())
		{
			return true;
		}
	}
    /**
     * 邮箱验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function email($name, $value, $params)
    {
    	$preg = "/^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/i";
    	if (preg_match($preg, $value))
    	{
    		return true;
    	}
    }

    /**
     * 最大长度验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function maxlen($name, $value, $params)
    {
    	if (mb_strlen($value, 'utf-8') <= $params)
    	{
    		return true;
    	}
    }

    /**
     * 最小长度验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function minlen($name, $value, $params)
    {
    	if (mb_strlen($value, 'utf-8') >= $params)
    	{
    		return true;
    	}
    }

    /**
     * 网址验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function http($name, $value, $params)
    {
    	$preg
    	= "/^(http[s]?:)?(\/{2})?([a-z0-9]+\.)?[a-z0-9]+(\.(com|cn|cc|org|net|com.cn))$/i";
    	if (preg_match($preg, $value)) {
    		return true;
    	}
    }

    /**
     * 电话号码
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function tel($name, $value, $params)
    {
    	$preg = "/(?:\(\d{3,4}\)|\d{3,4}-?)\d{8}/";
    	if (preg_match($preg, $value)) {
    		return true;
    	}
    }

    /**
     * 手机号验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function phone($name, $value, $params)
    {
    	$preg = "/^\d{11}$/";
    	if (preg_match($preg, $value)) {
    		return true;
    	}
    }

    /**
     * 身份证验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function identity($name, $value, $params)
    {
    	$preg = "/^(\d{15}|\d{18})$/";
    	if (preg_match($preg, $value)) {
    		return true;
    	}
    }

    /**
     * 用户名验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function user($name, $value, $params)
    {
        //用户名长度
    	$len = mb_strlen($value, 'utf-8');
    	$params = explode(',', $params);
    	if ($len >= $params[0] && $len <= $params[1]) {
    		return true;
    	}
    }

    /**
     * 数字范围
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function num($name, $value, $params)
    {
    	$params = explode(',', $params);
    	if ($value >= $params[0] && $value <= $params[1]) {
    		return true;
    	}
    }

    /**
     * 正则验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function regexp($name, $value, $preg)
    {
    	if (preg_match($preg, $value)) {
    		return true;
    	}
    }

    /**
     * 两个表单比对
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function confirm($name, $value, $params)
    {
    	if ($value == $_POST[$params]) {
    		return true;
    	}
    }

    /**
     * 中文验证
     *
     * @param $name  变量名
     * @param $value 变量值
     * @param $msg   错误信息
     *
     * @return bool
     */
    public function china($name, $value, $params)
    {
    	if (preg_match('/^[\x{4e00}-\x{9fa5}a-z0-9]+$/ui', $value)) {
    		return true;
    	}
    }
}