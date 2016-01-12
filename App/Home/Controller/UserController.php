<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class UserController extends Controller{

	protected $tpl;
	protected $db;

	//构造函数
	public function __init()
	{
		$this->tpl = 'templates/zol/';
		$this->db = new \Home\Model\User;
	}
	
    //用户注册
    public function reg(){
    	if(IS_POST){
    		if($this->db->reg()){
    			$this->success('用户注册成功','Home/User/home');
    		}else{
				$this->error($this->db->getError());
    		}
    	}else{
    		//分配模板文件配置
    		$tplData['title']="用户注册";
    		$tplData['css']="reg";
	    	View::with('tplData',$tplData);

	    	View::make($this->tpl.'user/reg.html');
    	}
    }


    //用户登陆
    public function login()
    {
    	if(IS_POST){
    		if($this->db->login()){
                if($_SESSION['history'] && $_SESSION['history']!=__ROOT__){
                    header("Location:".$_SESSION['history']);
                }else{
                    go('Home/User/home');
                }
    		}else{
				$this->error($this->db->getError());
    		}
    	}else{
            $_SESSION['history'] = __HISTORY__; //记录来源地址，必须存session，提交之后其实是从当前地址跳转到当前地址
            if(isset($_SESSION['user']['user_id'])){
                if($_SESSION['history']){
                    header("Location:".$_SESSION['history']);
                }else{
                    go('Home/User/home');
                }
            }
    		//分配模板文件配置
    		$tplData['title']="用户登陆";
    		$tplData['css']="login";
	    	View::with('tplData',$tplData);
	    	View::make($this->tpl.'user/login.html');
    	}
    }


    //个人中心
    public function home()
    {
        //分配模板文件配置
        $tplData['title']="个人中心";
        $tplData['css']="home";
        View::with('tplData',$tplData);
        //当前用户信息
        $user = $this->db->getOne($_SESSION['user']['user_id']);
        View::with('user',$user)->make($this->tpl.'user/home.html');
    }


    //修改密码
    public function password()
    {
        if(IS_POST){
            if($this->db->password()){
                $this->success('密码修改成功','Home/User/home');
            }else{
                $this->error($this->db->getError());
            }
        }else{
            //分配模板文件配置
            $tplData['title']="修改密码";
            $tplData['css']="home|password";
            View::with('tplData',$tplData);
            //当前用户信息
            $user = $this->db->getOne($_SESSION['user']['user_id']);
            View::with('user',$user)->make($this->tpl.'user/password.html');
        }
    }


    //订单列表
    public function order()
    {
        //分配模板文件配置
        $tplData['title']="订单列表";
        $tplData['css']="home-order|home";
        View::with('tplData',$tplData);
        //当前用户信息
        $user = $this->db->getOne($_SESSION['user']['user_id']);
        View::with('user',$user);

        //读取订单信息
        $order = Db::table('order')->where('order_user_id',$_SESSION['user']['user_id'])->orderBy('order_id','DESC')->get();
        foreach ($order as $k => $v) {
            //获取订单下的订单列表
            $order_list = Db::table('order_list')->where('order_sn',$v['order_sn'])->get();
            //获取商品信息，属性信息
            foreach ($order_list as $m => $n) {
                //压入商品信息
                $order_list[$m]['goods_info'] = Db::table('goods')->where('goods_id',$n['goods_id'])->first();
                //压入属性列表
                $attr = explode('-', $n['goods_attr']);
                $a = array(); //初始化，防止多次叠加
                foreach ($attr as $key => $value) {
                    $a[] = Db::table('goods_attr')->where('goods_attr_id',$value)->pluck('goods_attr_value');
                }
                $order_list[$m]['attr_info'] = implode('-', $a);
            }
            $order[$k]['order_list'] = $order_list;
        }
        // p($order);
        View::with('order',$order);

        View::make($this->tpl.'user/order.html');
    }

    //验证码
    public function code(){
    	Code::make();
    }

    //退出登陆
    public function quit(){
        unset($_SESSION['user']['user_id']);
        unset($_SESSION['user']['username']);
        go('Home/User/login');
    }

}
