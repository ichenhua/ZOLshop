<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO cms_config (`id`,`title`,`name`,`value`,`tips`,`filedtype`,`filedvalue`)
						VALUES(7,'要认真写','webname','文章管理系统','这里可以添加一点东西','input','')");
Db::execute("REPLACE INTO cms_config (`id`,`title`,`name`,`value`,`tips`,`filedtype`,`filedvalue`)
						VALUES(9,'网站状态','status',1,'网站关闭状态，0为关闭，1为开启','radio','0|关闭,1|打开')");
Db::execute("REPLACE INTO cms_config (`id`,`title`,`name`,`value`,`tips`,`filedtype`,`filedvalue`)
						VALUES(10,'关键词','keywords','CMS,系统','网站关键词','input','')");
Db::execute("REPLACE INTO cms_config (`id`,`title`,`name`,`value`,`tips`,`filedtype`,`filedvalue`)
						VALUES(11,'网站描述','description','cms文章管理系统，很好用哦','这里要添加一点描述','input','')");
Db::execute("REPLACE INTO cms_config (`id`,`title`,`name`,`value`,`tips`,`filedtype`,`filedvalue`)
						VALUES(12,'网站模板','style','default','','input','')");
