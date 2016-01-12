<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO cms_role (`id`,`name`,`pid`,`status`,`remark`)
						VALUES(1,'管理员',0,1,'')");
Db::execute("REPLACE INTO cms_role (`id`,`name`,`pid`,`status`,`remark`)
						VALUES(2,'编辑',0,1,'')");
Db::execute("REPLACE INTO cms_role (`id`,`name`,`pid`,`status`,`remark`)
						VALUES(3,'审核员',0,1,'')");
