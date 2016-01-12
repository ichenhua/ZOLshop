<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO hd_shop_attr (`attr_id`,`attr_name`,`attr_type`,`show_type`,`attr_value`,`shop_type_id`)
						VALUES(1,'尺寸',2,4,'M
L
XL
XXL',1)");
Db::execute("REPLACE INTO hd_shop_attr (`attr_id`,`attr_name`,`attr_type`,`show_type`,`attr_value`,`shop_type_id`)
						VALUES(2,'颜色',2,2,'红
黄
蓝
青',3)");
Db::execute("REPLACE INTO hd_shop_attr (`attr_id`,`attr_name`,`attr_type`,`show_type`,`attr_value`,`shop_type_id`)
						VALUES(3,'尺寸',2,2,'x
l',1)");
