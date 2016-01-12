<?php namespace Hdphp\Model;

trait SoftDeletes{

	/**
	 * 软删除
	 */
	public function delete()
	{
		array_walk($this->dates,function($value,$key){
			$this->$value= time();
		});
		return $this->save();
	}

	/**
	 * 恢复软删除
	 */
	public function restore()
	{
		array_walk($this->dates,function($value,$key){
			$this->$value= 0;
		});
		return $this->save();
	}

	/**
	 * 真正删除数据
	 */
	public function forceDelete()
	{
		return parent::delete();
	}
}