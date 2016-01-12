<?php if(!defined('HDPHP_PATH'))EXIT;
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
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_goods_pics");
Db::execute("CREATE TABLE `hd_goods_pics` (
  `pics_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL,
  `pics_big` varchar(255) DEFAULT NULL,
  `pics_mid` varchar(255) DEFAULT NULL,
  `pics_small` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_admin");
Db::execute("CREATE TABLE `hd_shop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `login_in` int(11) DEFAULT NULL,
  `login_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_attr");
Db::execute("CREATE TABLE `hd_shop_attr` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_name` char(30) DEFAULT NULL,
  `attr_type` tinyint(1) DEFAULT NULL COMMENT '属性类型 1为普通属性 2为规格属性',
  `show_type` tinyint(1) DEFAULT NULL COMMENT '显示类型 1为单行文本 2单选框 3复选框 4下拉框',
  `attr_value` varchar(200) DEFAULT NULL COMMENT '属性值',
  `shop_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_brand");
Db::execute("CREATE TABLE `hd_shop_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` char(30) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `brand_order` tinyint(4) DEFAULT NULL COMMENT '//排序',
  `brand_hot` tinyint(1) DEFAULT NULL,
  `brand_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_cate");
Db::execute("CREATE TABLE `hd_shop_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` char(30) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `orderby` tinyint(4) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
Db::execute("DROP TABLE IF EXISTS hd_shop_type");
Db::execute("CREATE TABLE `hd_shop_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` char(30) DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
