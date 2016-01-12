<?php namespace Hdphp\Model;

use Hdphp\Model\Model;

class ViewModel extends Model
{
	protected $view = array();

	public function view()
	{
		if(!empty($this->view))
		{
			foreach($this->view as $table=>$view)
			{
				if($table !=='_field')
				{
					$action = $view['action'];
					$info = preg_split('/(=|>=|<=)/', $view['on'],8,PREG_SPLIT_DELIM_CAPTURE);
					
					$this->$action($table,$info[0],$info[1],$info[2]);
				}
				else
				{
					$this->field($view);
				}
			}
			return $this;
		}
	}
}