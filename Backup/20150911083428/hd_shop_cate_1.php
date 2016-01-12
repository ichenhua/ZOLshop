<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO hd_shop_cate (`cate_id`,`cate_name`,`pid`,`orderby`,`keywords`,`desc`)
						VALUES(1,'手机',0,0,'手机','手机')");
Db::execute("REPLACE INTO hd_shop_cate (`cate_id`,`cate_name`,`pid`,`orderby`,`keywords`,`desc`)
						VALUES(2,'智能机',1,0,'诺基亚','')");
Db::execute("REPLACE INTO hd_shop_cate (`cate_id`,`cate_name`,`pid`,`orderby`,`keywords`,`desc`)
						VALUES(3,'小米手机',5,0,'诺基亚','')");
Db::execute("REPLACE INTO hd_shop_cate (`cate_id`,`cate_name`,`pid`,`orderby`,`keywords`,`desc`)
						VALUES(4,'老人机',1,0,'','')");
Db::execute("REPLACE INTO hd_shop_cate (`cate_id`,`cate_name`,`pid`,`orderby`,`keywords`,`desc`)
						VALUES(5,'塞班',2,'','','')");
