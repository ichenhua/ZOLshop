<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO hd_shop_type (`type_id`,`type_name`)
						VALUES(1,'上装')");
Db::execute("REPLACE INTO hd_shop_type (`type_id`,`type_name`)
						VALUES(2,'电脑')");
Db::execute("REPLACE INTO hd_shop_type (`type_id`,`type_name`)
						VALUES(3,'服装')");
