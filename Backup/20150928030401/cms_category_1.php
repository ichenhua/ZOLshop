<?php if(!defined('HDPHP_PATH'))EXIT;
Db::execute("REPLACE INTO cms_category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`)
						VALUES(1,'演讲专区','名人演讲稿集合','',0)");
Db::execute("REPLACE INTO cms_category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`)
						VALUES(2,'开讲啦','中央电视台开讲啦演讲稿大全','',1)");
Db::execute("REPLACE INTO cms_category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`)
						VALUES(3,'青年中国说','中央电视台青年中国说演讲稿收集','',1)");
Db::execute("REPLACE INTO cms_category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`)
						VALUES(4,'就业求职','就业求职技巧分享','',0)");
Db::execute("REPLACE INTO cms_category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`)
						VALUES(5,'大学生求职','大学生招聘求职技巧分享','',4)");
Db::execute("REPLACE INTO cms_category (`id`,`catname`,`catkeyword`,`catdesc`,`pid`)
						VALUES(6,'大学生就业','大学生就业形势分析','',4)");
