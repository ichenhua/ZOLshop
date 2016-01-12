<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class ArticleController extends Controller{

    protected $db;
    protected $tpl;
	//构造函数
	public function __init()
	{
        $this->db = new \Home\Model\Article;
        $this->tpl = 'templates/zol/';
	}
	
    public function index()
    {
        View::make();
    }

    public function article()
    {
        $article_id = Q('article');
        $article = $this->db->where('article_id',$article_id)->first();

        //分配模板文件配置
        $tplData['title']=$article['article_title'];
        $tplData['css']="article";
        View::with('tplData',$tplData);
        
        View::with('article',$article)->make($this->tpl.'article.html');
    }
}
