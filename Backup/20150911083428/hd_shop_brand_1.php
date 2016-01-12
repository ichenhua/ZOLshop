<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO hd_shop_brand (`brand_id`,`brand_name`,`brand_logo`,`brand_order`,`brand_hot`,`brand_desc`)
						VALUES(1,'诺基亚','Upload/48601441765138.png','','','诺基亚是一个老品牌')");
Db::execute("REPLACE INTO hd_shop_brand (`brand_id`,`brand_name`,`brand_logo`,`brand_order`,`brand_hot`,`brand_desc`)
						VALUES(2,'联想','Upload/70531441765043.jpg','',1,'联想是一个国内的大品牌，创始人是柳传志')");
