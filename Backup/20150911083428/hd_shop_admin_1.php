<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO hd_shop_admin (`id`,`username`,`password`,`login_in`,`login_ip`)
						VALUES(1,'admin','7fef6171469e80d32c0559f88b377245',1441931461,'127.0.0.1')");
