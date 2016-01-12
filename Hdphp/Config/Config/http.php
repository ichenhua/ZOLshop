<?php
return array(
    //基于https协议
    'https'                 => false,               

    //url重写模式
    'rewrite'               => false, 
    
    //模块URL变量     
    'var_module'            => 'm',     

    //控制器URL变量    
    'var_controller'        => 'c',   

    //动作URL变量      
    'var_action'            => 'a',

    //禁止使用的模块
    'deny_module'           => array('Common','Addons'),

    //默认模块         
    'default_module'        => 'Home',       

    //默认控制器       
    'default_controller'    => 'Index',   

    //默认方法
    'default_action'        => 'index',   

    //缓存路由
    'route_cache'           => false
);