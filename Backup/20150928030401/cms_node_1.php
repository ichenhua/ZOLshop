<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(1,'Admin','后台模块',1,'',0,0,1,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(2,'Category','栏目模块',1,'',0,1,2,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(3,'index','显示栏目列表',1,'',0,2,3,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(4,'del','删除栏目',1,'',0,2,1,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(5,'Article','文章模块',1,'',0,1,2,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(6,'index','文章列表',1,'',0,5,1,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(7,'deit','编辑栏目',1,'',0,2,3,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(8,'Index','后台主页',1,'',0,1,2,1)");
Db::execute("REPLACE INTO cms_node (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`,`show`)
						VALUES(9,'index','后台首页显示',1,'',0,8,3,1)");
