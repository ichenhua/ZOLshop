<?php namespace Admin\Controller; 

use Admin\Model\Article;

//测试控制器
class ArticleController extends Controller{

	protected $db;
	//构造函数
	public function __init()
	{
		$this->db = new Article;
	}

    public function index()
    {
        $data = $this->db->getAll();
        View::with('data',$data);
        View::make();
    }
	
    //添加文章
    public function add()
    {
        if (IS_POST) {
            if($this->db->store()){
                $this->success('文章添加成功','index');
            }else{
                $this->error($this->getError());
            }
        }else{
            View::make();
        } 
    }

    //编辑文章
    public function edit()
    {
        if (IS_POST) {
            if($this->db->edit()){
                $this->success('文章修改成功','index');
            }else{
                $this->error($this->getError());
            }
        }else{
            $article_id = Q('article_id');
            $article = $this->db->where('article_id',$article_id)->first();
            View::with('article',$article)->make();
        } 
    }
}
