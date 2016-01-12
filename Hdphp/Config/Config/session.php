<?php
return array(
    #引擎:mysql,memcache,redis
    'driver'   => 'file',

    //session_name
    'name'     => 'hdcmsid',

    //域名
    'domain'   => '',

    //过期时间
    'expire'   => 3600,

    #File       
    'file'     => array(
        'path' => 'storage/session',
    ),

    #Mysql
    'mysql'    => array(
        'host' => 'localhost', 'user' => 'root', 'password' => '', 'database' => '',
    ),

    #Memcache
    'memcache' => array(
        'host' => 'localhost', 'port' => 11211,

    ),

    #Redis
    'redis'    => array(
        'host' => 'localhost', 'port' => 11211, 'password' => '', 'database' => 0
    )
);