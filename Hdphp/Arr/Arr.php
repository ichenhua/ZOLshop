<?php namespace Hdphp\Arr;

//URL处理类
class Arr
{
	private $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	/**
	 * 将数组键名变成大写或小写
	 * @param array $arr 数组
	 * @param int $type 转换方式 1大写   0小写
	 * @return array
	 */
	public function array_change_key_case($arr, $type = 0)
	{
		$func = $type ? 'strtoupper' : 'strtolower';
    	$data = array(); //格式化后的数组
    	foreach ($arr as $k => $v) {
    		$k = $func($k);
    		$data[$k] = is_array($v)?$this->array_change_key_case($v, $type):$v;
    	}
    	return $data;
    }

    /**
     * 不区分大小写检测数据键名是否存在
     * @param  [type] $key [键名]
     * @param  [type] $arr [数组]
     * @return [bool]      [description]
     */
    public function array_key_exists($key, $arr)
    {
    	return array_key_exists(strtolower($key), $this->array_change_key_case($arr));
    }

    /**
	 * 将数组中的值全部转为大写或小写
	 * @param array $arr
	 * @param int $type 类型 1值大写 0值小写
	 * @return array
	 */
    public function array_change_value_case($arr, $type = 0)
    {
    	$func = $type ? 'strtoupper' : 'strtolower';
	    $data = array(); //格式化后的数组
	    foreach ($arr as $k => $v) {
	    	$data[$k] = is_array($v)?$this->array_change_value_case($v, $type):$func($v);
	    }

	    return $data;
	}

	/**
	 * 数组进行整数映射转换
	 * @param       $data
	 * @param array $map
	 */
	public function int_to_string(&$arr, array $map = array('status' => array('0' => '禁止', '1' => '启用')))
	{
		foreach ($map as $name => $m)
		{
			if (isset($arr[$name]) && array_key_exists($arr[$name],$m))
			{
				$arr['_'.$name] = $m[$arr[$name]];
			}
		}
		return $arr;
	}
}