<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("DROP TABLE IF EXISTS cms_access");
Db::execute("CREATE TABLE `cms_access` (
  `role_id` tinyint(4) DEFAULT NULL,
  `node_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS cms_article");
Db::execute("CREATE TABLE `cms_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) DEFAULT NULL,
  `content` text,
  `addtime` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `cid` int(6) NOT NULL,
  `keywords` char(100) DEFAULT NULL,
  `discription` char(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS cms_category");
Db::execute("CREATE TABLE `cms_category` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `catname` char(30) DEFAULT NULL,
  `catkeyword` varchar(200) DEFAULT NULL,
  `catdesc` varchar(200) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS cms_config");
Db::execute("CREATE TABLE `cms_config` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `name` char(30) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `tips` varchar(100) DEFAULT NULL,
  `filedtype` char(20) DEFAULT NULL,
  `filedvalue` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS cms_node");
Db::execute("CREATE TABLE `cms_node` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `remark` char(100) DEFAULT NULL,
  `sort` smallint(6) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS cms_role");
Db::execute("CREATE TABLE `cms_role` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `remark` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS cms_user");
Db::execute("CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 会员组  1 管理组',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS cms_user_role");
Db::execute("CREATE TABLE `cms_user_role` (
  `user_id` int(11) DEFAULT NULL,
  `role_id` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_goods");
Db::execute("CREATE TABLE `hd_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` char(100) DEFAULT NULL,
  `goods_sn` varchar(45) DEFAULT NULL,
  `goods_unit` char(10) DEFAULT NULL,
  `admin_id` tinyint(4) DEFAULT NULL,
  `brand_id` tinyint(4) DEFAULT NULL,
  `cate_id` tinyint(4) DEFAULT NULL,
  `type_id` tinyint(4) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `goods_click` mediumint(9) DEFAULT '0',
  `list_pic` varchar(255) DEFAULT NULL,
  `thumb_pic` varchar(255) DEFAULT NULL,
  `goods_store` mediumint(9) DEFAULT '0' COMMENT '库存',
  `shop_price` decimal(10,2) DEFAULT NULL,
  `goods_price` decimal(10,2) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `discription` varchar(200) DEFAULT NULL,
  `content` text,
  `service` text,
  `is_delete` tinyint(1) DEFAULT '0' COMMENT '//回收站',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_goods_attr");
Db::execute("CREATE TABLE `hd_goods_attr` (
  `goods_attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_attr_value` varchar(200) DEFAULT NULL COMMENT '商品属性名称',
  `goods_add_price` decimal(8,2) DEFAULT '0.00' COMMENT '属性价格变化',
  `goods_id` int(11) DEFAULT NULL,
  `attr_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`goods_attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_goods_pics");
Db::execute("CREATE TABLE `hd_goods_pics` (
  `pics_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL,
  `pics_big` varchar(255) DEFAULT NULL,
  `pics_mid` varchar(255) DEFAULT NULL,
  `pics_small` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_goods_stock");
Db::execute("CREATE TABLE `hd_goods_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_attr` char(30) DEFAULT NULL,
  `stock_goods_sn` char(30) DEFAULT NULL,
  `stock_count` mediumint(9) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_order");
Db::execute("CREATE TABLE `hd_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` char(30) DEFAULT NULL COMMENT '订单号',
  `order_add_id` int(11) DEFAULT NULL COMMENT '收货人id',
  `order_price` decimal(10,2) DEFAULT '0.00' COMMENT '总价',
  `order_remark` char(200) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL COMMENT '订单生成时间',
  `order_user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `order_state` tinyint(1) DEFAULT '0' COMMENT '订单状态  0 未付款  1 已付款  2 已发货  3 已完成  4 已评价',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_order_list");
Db::execute("CREATE TABLE `hd_order_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  `goods_attr` char(50) DEFAULT NULL COMMENT '商品属性',
  `buy_num` int(11) DEFAULT NULL COMMENT '购买数量',
  `list_price` decimal(10,0) DEFAULT NULL COMMENT '价格小计',
  `order_id` int(11) DEFAULT NULL,
  `order_sn` char(50) DEFAULT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_address");
Db::execute("CREATE TABLE `hd_shop_address` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `add_province` varchar(20) DEFAULT '' COMMENT '省份',
  `add_city` varchar(20) DEFAULT '' COMMENT '城市',
  `add_detail` varchar(100) DEFAULT '' COMMENT '详细地址',
  `add_phone` varchar(30) DEFAULT '0' COMMENT '手机',
  `add_tel` varchar(30) DEFAULT '0' COMMENT '电话',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '是否默认 0 非默认   1 默认',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`add_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_admin");
Db::execute("CREATE TABLE `hd_shop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `login_in` int(11) DEFAULT NULL,
  `login_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_article");
Db::execute("CREATE TABLE `hd_shop_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` char(100) DEFAULT NULL,
  `article_author` char(10) DEFAULT NULL,
  `article_content` text,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_attr");
Db::execute("CREATE TABLE `hd_shop_attr` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_name` char(30) DEFAULT NULL,
  `attr_type` tinyint(1) DEFAULT NULL COMMENT '属性类型 1为普通属性 2为规格属性',
  `show_type` tinyint(1) DEFAULT NULL COMMENT '显示类型 1为单行文本 2单选框 3复选框 4下拉框',
  `attr_value` varchar(200) DEFAULT NULL COMMENT '属性值',
  `shop_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_brand");
Db::execute("CREATE TABLE `hd_shop_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` char(30) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `brand_order` tinyint(4) DEFAULT NULL COMMENT '//排序',
  `brand_hot` tinyint(1) DEFAULT NULL,
  `brand_desc` varchar(200) DEFAULT NULL,
  `cate_id` int(11) DEFAULT '0',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_cate");
Db::execute("CREATE TABLE `hd_shop_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` char(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT '0',
  `orderby` tinyint(4) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `price_level` varchar(500) DEFAULT '' COMMENT '价格区间',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_type");
Db::execute("CREATE TABLE `hd_shop_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` char(30) DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_user");
Db::execute("CREATE TABLE `hd_shop_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `token` varchar(20) DEFAULT NULL,
  `login_in` int(11) DEFAULT NULL,
  `login_ip` varchar(20) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_category");
Db::execute("CREATE TABLE `wx_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_config");
Db::execute("CREATE TABLE `wx_config` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `appid` char(50) DEFAULT NULL,
  `appsecret` char(50) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `wx_name` char(50) DEFAULT NULL,
  `wx_number` char(20) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL COMMENT '// 1 订阅号  2 服务号',
  `token` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_dish");
Db::execute("CREATE TABLE `wx_dish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `thumb` char(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_fans");
Db::execute("CREATE TABLE `wx_fans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` char(50) DEFAULT NULL,
  `nickname` char(50) DEFAULT NULL,
  `headimgurl` char(255) DEFAULT NULL,
  `groupid` int(11) DEFAULT '0',
  `subscribe_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_image");
Db::execute("CREATE TABLE `wx_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keywords` char(20) DEFAULT NULL,
  `path` char(255) DEFAULT NULL,
  `media_id` char(255) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_log");
Db::execute("CREATE TABLE `wx_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) DEFAULT NULL,
  `content` char(100) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_menu");
Db::execute("CREATE TABLE `wx_menu` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) DEFAULT NULL,
  `type` char(100) DEFAULT NULL,
  `key` char(128) DEFAULT NULL,
  `url` char(255) DEFAULT NULL,
  `media_id` char(100) DEFAULT NULL,
  `pid` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_message");
Db::execute("CREATE TABLE `wx_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` char(50) DEFAULT NULL,
  `type` char(20) DEFAULT NULL,
  `content` char(255) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_order");
Db::execute("CREATE TABLE `wx_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_info` char(200) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  `tel` char(20) DEFAULT NULL,
  `address` char(200) DEFAULT NULL,
  `info` char(200) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_reply");
Db::execute("CREATE TABLE `wx_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` int(11) DEFAULT NULL,
  `content` char(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_shop");
Db::execute("CREATE TABLE `wx_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `tel` char(20) DEFAULT NULL,
  `time` char(50) DEFAULT NULL,
  `thumb` char(100) DEFAULT NULL,
  `address` char(100) DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `lat` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_text");
Db::execute("CREATE TABLE `wx_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keywords` char(50) DEFAULT NULL,
  `content` char(255) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS wx_user");
Db::execute("CREATE TABLE `wx_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
