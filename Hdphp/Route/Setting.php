<?php namespace Hdphp\Route;

class Setting
{
	//路由前缀
	protected $prefix;	

	/**
	 * 魔术方法用于设置路由
	 * get/post/put/delete/any
	 * @param  	string $method 	请求动作
	 * @param  	array 	$params 参数数组
	 * @return 	object
	 */
	public function __call($method,$params)
	{
		$this->route[]=array(
			'method'=>$method,
			'route'=>$this->prefix.array_shift($params),
			'callback'=>array_shift($params),
			'regexp'=>'/./',
			'args'=>array()
			);
		return $this;
	}

	/**
	 * 路由分组
	 * @param  array  	$prefix   前缀
	 * @param  string | callback 	执行动作
	 * @return void
	 */
	public function group(array $prefix,$callback)
	{
		$this->prefix = $prefix['prefix'].'/';
		$callback();
		$this->prefix = '';
	}

	/**
	 * 设置控制器路由
	 * @param  [type] $route [description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function controller($route,$param)
	{
		$this->route[]=array(
			'method'=>'controller',
			'route'=>$this->prefix.$route.'/{method}',
			'callback'=>$param,
			'regexp'=>'',
			'args'=>array()
			);
		return $this;
	}

	/**
	 * 设置资源路由
	 * @param  [type] $route [description]
	 * @param  [type] $param [description]
	 * @return [type]        [description]
	 */
	public function resource($route,$controller)
	{
		$this->get("$route",$controller.'/index');
		//添加文章视图
		$this->get("$route/create",$controller.'/create');
		//保存
		$this->post("$route",$controller.'/store');
		//显示文章
		$this->get("$route/{id}",$controller.'/show');
		//编辑文章视图
		$this->get("$route/{id}/edit",$controller.'/edit');
		//更新
		$this->put("$route/{id}",$controller.'/update');
		//删除文章
		$this->delete("$route/{id}",$controller.'/destroy');

		return $this;
	}
}