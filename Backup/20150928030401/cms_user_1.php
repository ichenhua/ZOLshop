<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO cms_user (`id`,`username`,`password`,`type`)
						VALUES(1,'chenhua','e10adc3949ba59abbe56e057f20f883e',1)");
Db::execute("REPLACE INTO cms_user (`id`,`username`,`password`,`type`)
						VALUES(2,'admin','7fef6171469e80d32c0559f88b377245',1)");
