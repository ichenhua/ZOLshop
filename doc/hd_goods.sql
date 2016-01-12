/*
Navicat MySQL Data Transfer

Source Server         : chenhua.pro
Source Server Version : 50169
Source Host           : chenhuawang.gotoftp3.com:3306
Source Database       : chenhuawang

Target Server Type    : MYSQL
Target Server Version : 50169
File Encoding         : 65001

Date: 2016-01-12 10:22:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hd_goods
-- ----------------------------
DROP TABLE IF EXISTS `hd_goods`;
CREATE TABLE `hd_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` char(100) DEFAULT NULL,
  `goods_sn` varchar(45) DEFAULT NULL,
  `goods_unit` char(10) DEFAULT NULL,
  `admin_id` tinyint(4) DEFAULT NULL,
  `brand_id` tinyint(4) DEFAULT NULL,
  `cate_id` tinyint(4) DEFAULT NULL,
  `type_id` tinyint(4) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `goods_click` mediumint(9) DEFAULT '0',
  `list_pic` varchar(255) DEFAULT NULL,
  `thumb_pic` varchar(255) DEFAULT NULL,
  `goods_store` mediumint(9) DEFAULT '0' COMMENT '库存',
  `shop_price` decimal(10,2) DEFAULT NULL,
  `goods_price` decimal(10,2) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `discription` varchar(200) DEFAULT NULL,
  `content` text,
  `service` text,
  `is_delete` tinyint(1) DEFAULT '0' COMMENT '//回收站',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_goods
-- ----------------------------
INSERT INTO `hd_goods` VALUES ('1', 'Apple iPhone 6 Plus (A1524) 16GB 金色 移动联通电信4G手机', 'sh234709012383', '1000', '1', '4', '12', '1', '1442205210', '100', 'Upload/63621442210700.jpg', 'Upload/55411442210700.jpg', '1000', '6000.00', '5288.00', '', '选择下方“北京移动购机赠费”推荐188元套餐，不换号码，额外得1800元话费，分24个月返还，尖叫吧，机会难得，欲购从速！', '<p>\r\n	<img src=\"/shop/Public/org/kindeditor/attached/image/20150924/20150924073910_94762.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<img src=\"/shop/Public/org/kindeditor/attached/image/20150924/20150924074054_50506.jpg\" alt=\"\" /> \r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('2', '荣耀 6 (H60-L11) 3GB内存增强版 白色 移动4G手机', 'sh233478934', '1000', '1', '1', '12', '1', '1442212592', '100', 'Upload/1531442212592.jpg', 'Upload/44861442212592.jpg', '1000', '2000.00', '1800.00', '', '', '<img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132635_77046.gif\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132635_32681.png\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132635_12790.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132636_15852.jpg\" alt=\"\" />', '', '0');
INSERT INTO `hd_goods` VALUES ('3', '小米 4 2GB内存版 白色 移动4G手机', 'hs13234233323', '1000', '1', '2', '12', '1', '1442212811', '100', 'Upload/76361442212811.jpg', 'Upload/81251442212811.jpg', '1000', '2000.00', '1499.00', '', '不锈钢金属边框、 5英寸屏窄边，工艺和手感超乎想象！\r\n选择下方“北京移动购机赠费”选158元档位套餐，共得1512元话费，分24个月返还，尖叫吧，机会难得，欲购从速！', '<div id=\"p-ad\" class=\"p-ad J-ad-1514794\">\r\n	<p>\r\n		<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924073910_94762.jpg\" alt=\"\" />\r\n	</p>\r\n	<p>\r\n		<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924074054_50506.jpg\" alt=\"\" />\r\n	</p>\r\n<br />\r\n</div>', '', '0');
INSERT INTO `hd_goods` VALUES ('4', '三星 SM-G5308W 白色 移动4G手机 双卡双待', 'sx239773434', '1000', '1', '3', '12', '1', '1442212988', '200', 'Upload/74071442213506.jpg', 'Upload/18131442213506.jpg', '1000', '1900.00', '988.00', '', '4G新品！5英寸大屏，500W前置摄像头！双卡双待！\r\n选择下方“移动老用户4G飞享合约”，无需换号，还有话费每月返还！', '<div id=\"p-ad\" class=\"p-ad J-ad-1258204\">\r\n	<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132635_77046.gif\" alt=\"\" /><span></span><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132635_32681.png\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132635_12790.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132636_15852.jpg\" alt=\"\" /><br />\r\n</div>', '', '0');
INSERT INTO `hd_goods` VALUES ('5', '三星 G3608 炭灰 移动4G手机 联通4G手机', 'xs2387783', '台', '1', '3', '12', '1', '1442213693', '1000', 'Upload/27641442213693.jpg', 'Upload/73531442213693.jpg', '1000', '1200.00', '678.00', '', '三星 G3608 炭灰 移动4G手机，支持移动4G，双卡双待！！', '<p>\r\n	<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924073910_94762.jpg\" alt=\"\" />\r\n</p>\r\n<p>\r\n	<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924074054_50506.jpg\" alt=\"\" />\r\n</p>\r\n<br />', '', '0');
INSERT INTO `hd_goods` VALUES ('6', '小米 红米2 明黄 联通4G手机 双卡双待', 'xm23987883', '台', '1', '2', '12', '1', '1442213836', '100', 'Upload/94821442213836.jpg', 'Upload/4701442213836.jpg', '2000', '1200.00', '600.00', '', '', '<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132635_77046.gif\" alt=\"\" /><span></span><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132635_32681.png\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132635_12790.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132636_15852.jpg\" alt=\"\" />', '', '0');
INSERT INTO `hd_goods` VALUES ('7', '小米 Note 天然竹 移动联通双4G手机 双卡双待', 'xm2978834', '台', '1', '2', '12', '1', '1442213998', '1000', 'Upload/43391442213998.jpg', 'Upload/94891442213998.jpg', '1000', '2400.00', '1999.00', '', '小米 Note 天然竹 移动联通双4G手机 双卡双待', '<h1>\r\n	<p>\r\n		<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924073910_94762.jpg\" alt=\"\" />\r\n	</p>\r\n	<p>\r\n		<img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924074054_50506.jpg\" alt=\"\" />\r\n	</p>\r\n<br />\r\n</h1>', '', '0');
INSERT INTO `hd_goods` VALUES ('8', 'Apple iPhone 6 (A1586) 16GB 金色 移动联通电信4G手机', 'ap87678233', '1000', '1', '4', '12', '1', '1442214526', '100', 'Upload/81601442214526.jpg', 'Upload/31671442214526.jpg', '1000', '5000.00', '4688.00', '', '', '', '', '0');
INSERT INTO `hd_goods` VALUES ('9', '华硕ZenBook Pro UX501JW4720 15.6英寸 超极本', '', '2000', '1', '7', '21', '2', '1443078851', '0', 'Upload/22851443078851.png', 'Upload/96251443078851.png', '0', '8499.00', '8400.00', '', '', '<p>\r\n	官方标配：全新原装电脑+全国联保保修卡+说明书+电源适配器+电池（具体以厂家配置为准）\r\n</p>\r\n<p>\r\n	套装一：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装三：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座+4GB内寸</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装四：增强版配置：I7-4720HQ/四核/八线程/8G内存/TB+128GSSD高速/GTX960M-4G独显/音影娱乐/图形设计/游戏/编程/旗舰本</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132951_57342.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132951_86593.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132952_55994.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132952_70718.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924132952_80301.jpg\" alt=\"\" /><br />\r\n</span> \r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('10', '戴尔 XPS 13（XPS13D-9343-1508） 13.3英寸超极本', '', '', '1', '9', '21', '2', '1443079050', '0', 'Upload/96051443079050.jpg', 'Upload/69941443079050.jpg', '0', '6549.00', '6000.00', '', '', '<p>\r\n	官方标配：笔记本主机 x1 电池 x1 电源适配器 x1 说明书 x1 保修卡 x1机打发票x1【正品保障】\r\n</p>\r\n<p>\r\n	套装一：官方标配+笔记本单肩包+光电鼠标+鼠标垫+键盘贴膜+mini耳机+机打发票【正品保障】\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133334_17179.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133334_98041.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	1984-1987年 公司诞生迈克尔.戴尔先生在19岁时以1,000美元资金创立了PC有限公司。希望实现设计、制造和销售技术方式的变革。\r\n</p>\r\n<p>\r\n	1988-1991年 上市以及进军全球市场，突破了其首次公开发行股票的工作，并扩展了其运营和产品组合.以便更好地服务客户。\r\n</p>\r\n<p>\r\n	1992-1995年 实现前所未有的增长。戴尔如火箭般的增长速度使它跻身全球五大计算机制造商之列，并将目光锁定于尚未有企业涉足的网络服务器市场。\r\n</p>\r\n<p>\r\n	1996-1999年 制胜全球，引领网络。戴尔迅速扩展了全球运营，公司开始进军在线销售。并为全球电子商务制定了基准。\r\n</p>\r\n<p>\r\n	2000-2004年 扩展到PC以外的其他领域。戴尔是全球第一大计算机系统制造商，并不断发展，推出外围设备产品和适用于数据中心的产品。\r\n</p>\r\n<p>\r\n	2005-2008年 为社交和可持续的业务发展设定基准。戴尔优化其业务策略，来满足客户的端到端IT需求。 与此同时，采用社交网站并提供免费的产品回收服务。\r\n</p>\r\n<p>\r\n	2009年 全新戴尔焕发活力。通过对知识产权和研发的巨额投资，戴尔增强了其解决方案的产品组合和能力。\r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('11', '华硕（ASUS）便携商务系列U305FA 13.3英寸超极本', '', '', '1', '7', '21', '2', '1443079298', '0', 'Upload/31531443079298.jpg', 'Upload/58831443079298.jpg', '0', '8000.00', '7499.00', '', '', '<p>\r\n	官方标配：全新原装未开封电脑＋原装笔记本充电适配器＋保修卡说明书＋发票\r\n</p>\r\n<p>\r\n	套装一：官方标配 ＋原装品牌电脑包＋原装品牌鼠标＋精美游戏鼠标垫\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配 ＋ 套餐①＋原厂三层屏幕保护膜＋防水硅胶键盘膜＋笔记本清洗套件＋高保真便携耳麦</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">华硕电脑股份有限公司创立于1989年，为全球最大的主板制造商，并跻身全球前三大消费性笔记本电脑品牌。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">华硕始终对质量与创新全力以赴，不断为消费者及企业用户提供崭新的科技解决方案。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">2013年获得全球专业媒体与评鉴机构共4,256个奖项的肯定。2011年，华硕开启追寻无与伦比的全球任务，将精彩创新的品牌精神提升至更高层次。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">同年推出市场上叫好又叫座的变形平板，备受国内外专业人士激赏；10月再推超极致轻薄笔记本电脑ZENBOOK，除了将技术倾注于外型与轻薄的表现，更刻画出智能型笔记本电脑随开即用、绿色高效的新时代价值。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"> </span>\r\n</p>\r\n<p>\r\n	官方标配：全新原装电脑+全国联保保修卡+说明书+电源适配器+电池（具体以厂家配置为准）\r\n</p>\r\n<p>\r\n	套装一：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装三：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座+4GB内寸</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装四：增强版配置：I7-4720HQ/四核/八线程/8G内存/TB+128GSSD高速/GTX960M-4G独显/音影娱乐/图形设计/游戏/编程/旗舰本</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_57342.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_86593.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_55994.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_70718.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_80301.jpg\" alt=\"\" /></span> \r\n</p>\r\n<br />\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">2012年发布结合手机、平板、小笔电跨界功能的PadFone，震撼市场，奠定华硕的精采研发创新实力。2014年4月11日，华硕智能手机打破萦绕业界多日的悬念，以“追寻无与伦比”的品牌核心理念，在京揭示了2014年劲爆十足的智能手机新品家族--时尚多彩的智能手机ZenFone系列及全新变形手机PadFone mini，以799元起的震撼价格强势进军主流智能手机市场。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">现在，更积极布局未来的移动云端时代，将为世界创造无限可能。在着重创新与质量之余，华硕亦投注心力于社会公益、教育文化及绿色环保等方面，并在欧、美、日及台湾本地等国际环保标章上领先取得多项肯定与认证，以设计体贴人性、感动人心的3C科技产品为初衷，持续为消费者带来无与伦比的体验价值。<br />\r\n</span> \r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('12', '神舟 UT47 D1 14英寸轻薄便携本，酷睿三代i7双核，Win8系统', '', '', '1', '8', '21', '2', '1443079410', '0', 'Upload/66801443079410.jpg', 'Upload/31991443079410.jpg', '0', '3899.00', '3600.00', '', '', '<p>\r\n	官方标配：全新原装机器包含：全新未开封机+保修卡+说明书+驱动盘+电源适配器+电池 （具体以厂家配置为准！）\r\n</p>\r\n<p>\r\n	套装一：官方标配+三层静电吸附屏膜+防水硅胶键盘膜+精美耳塞+鼠标\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配+神舟专用电脑包+神舟专用鼠标+精美鼠标垫+三层静电吸附屏膜+防水硅胶键盘膜+精美耳塞</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装三：官方标配+战神双肩包+USB游戏鼠标+精美鼠标垫+三层静电吸附屏膜+防水硅胶键盘膜+散热底座</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装四：官方标配+战神双肩包+无线鼠标+精美鼠标垫+三层静电吸附屏膜+防水硅胶键盘膜+炫酷散热底座+立体声耳麦+2米网线+电脑锁+清洁套装</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133312_50407.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133312_49597.jpg\" alt=\"\" /><br />\r\n</span> \r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('13', '联想 Y50-70 i7 4720HQ/1080P高清屏 I7-4720/8G/1TB', '', '', '1', '11', '21', '2', '1443079514', '0', 'Upload/37961443079514.png', 'Upload/40191443079514.png', '0', '7949.00', '6800.00', '', '', '<p>\r\n	官方标配：原装笔记本电脑+原装笔记本电源适配器+笔记本电脑保修卡+笔记本电脑使用说明书+笔记本电脑保修发票\r\n</p>\r\n<p>\r\n	套装一：官方标配+原装笔记本电脑包+原装笔记本专用鼠标+高级鼠标垫\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配+原装笔记本电脑包+原装笔记本专用鼠标+高级鼠标垫+原厂笔记本屏幕键盘保护膜+高级笔记本专用清洁套装+迷你便携耳机</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"> </span>\r\n</p>\r\n<p>\r\n	官方标配：全新原装电脑+全国联保保修卡+说明书+电源适配器+电池（具体以厂家配置为准）\r\n</p>\r\n<p>\r\n	套装一：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装三：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座+4GB内寸</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装四：增强版配置：I7-4720HQ/四核/八线程/8G内存/TB+128GSSD高速/GTX960M-4G独显/音影娱乐/图形设计/游戏/编程/旗舰本</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_57342.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_86593.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_55994.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_70718.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_80301.jpg\" alt=\"\" /></span> \r\n</p>\r\n<br />\r\n<p>\r\n	<br />\r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('14', 'Acer E5-471G-51SP 五代i5-5200U 4G 500G 2G独显GT840 14寸', '', '', '1', '5', '1', '2', '1443079597', '0', 'Upload/22541443079597.png', 'Upload/19941443079597.png', '0', '4000.00', '3500.00', '', '', '<p>\r\n	官方标配：笔记本主机+电池+电源适配器+说明书+保修卡+机打发票\r\n</p>\r\n<p>\r\n	套装一：官方标配+单肩包+宏碁有线鼠标+宏碁专用键盘膜+屏幕保护膜+鼠标垫+清洁套装\r\n</p>\r\n<p>\r\n	<img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133252_43024.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133252_54870.jpg\" alt=\"\" /> \r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('15', 'ThinkPad X240（20AMA37DCD）12英寸轻薄便携笔记本', '', '', '1', '6', '21', '2', '1443079710', '0', 'Upload/74761443079710.jpg', 'Upload/33791443079710.jpg', '0', '5800.00', '5000.00', '', '', '<ul class=\"zs-attributes-list\" style=\"color:#333333;font-family:\'Microsoft YaHei\', 微软雅黑;\">\r\n	<li>\r\n		<span style=\"line-height:1.5;\">官方标配：全新原装电脑+全国联保保修卡+说明书+电源适配器+电池（具体以厂家配置为准）</span>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			套装一：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘\r\n		</p>\r\n		<p>\r\n			<span style=\"line-height:1.5;\">套装二：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座</span>\r\n		</p>\r\n		<p>\r\n			<span style=\"line-height:1.5;\">套装三：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座+4GB内寸</span>\r\n		</p>\r\n		<p>\r\n			<span style=\"line-height:1.5;\">套装四：增强版配置：I7-4720HQ/四核/八线程/8G内存/TB+128GSSD高速/GTX960M-4G独显/音影娱乐/图形设计/游戏/编程/旗舰本</span>\r\n		</p>\r\n		<p>\r\n			<span style=\"line-height:1.5;\"><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_57342.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_86593.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_55994.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_70718.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_80301.jpg\" alt=\"\" /></span>\r\n		</p>\r\n<br />\r\n	</li>\r\n</ul>', '', '0');
INSERT INTO `hd_goods` VALUES ('16', 'ThinkPad S1 Yoga 20CDA068CD 酷睿i5/4g/8+500g混合', '', '', '1', '10', '21', '2', '1443079787', '0', 'Upload/5501443079787.jpg', 'Upload/9061443079787.jpg', '0', '6500.00', '6000.00', '', '', '<p>\r\n	官方标配：笔记本电脑+笔记本充电器+笔记本保修卡+保修发票\r\n</p>\r\n<p>\r\n	套装一：官方标配+原装笔记本电脑包+原装笔记本鼠标+高级鼠标垫\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配+原装笔记电脑包+原装笔记本鼠标+原装屏幕保护膜+原装键盘保护膜+高级鼠标垫+笔记本专用清洁套装+游戏专用迷你便携耳机</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133156_89324.jpg\" alt=\"\" /><img src=\"/shop/Public/org/kindeditor/php/../attached/image/20150924/20150924133156_82570.jpg\" alt=\"\" /><br />\r\n</span> \r\n</p>', '', '0');
INSERT INTO `hd_goods` VALUES ('17', 'ThinkPad L45014英寸商务笔记本电脑 大客户机型/带指纹/蓝牙', '', '', '1', '6', '21', '2', '1443079975', '0', 'Upload/22111443079975.jpg', 'Upload/5831443079975.jpg', '0', '6300.00', '6000.00', '', '', '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	官方标配：全新原装电脑+全国联保保修卡+说明书+电源适配器+电池（具体以厂家配置为准）\r\n</p>\r\n<p>\r\n	套装一：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装二：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装三：官方标配+华硕专用电脑包+华硕专用鼠标+精美鼠标垫+win7 64位光盘+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座+4GB内寸</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">套装四：增强版配置：I7-4720HQ/四核/八线程/8G内存/TB+128GSSD高速/GTX960M-4G独显/音影娱乐/图形设计/游戏/编程/旗舰本</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_57342.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132951_86593.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_55994.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_70718.jpg\" alt=\"\" /><img src=\"http://chenhua.pro/shop/Public/org/kindeditor/attached/image/20150924/20150924132952_80301.jpg\" alt=\"\" /></span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\"></span> \r\n</p>', '', '0');

-- ----------------------------
-- Table structure for hd_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `hd_goods_attr`;
CREATE TABLE `hd_goods_attr` (
  `goods_attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_attr_value` varchar(200) DEFAULT NULL COMMENT '商品属性名称',
  `goods_add_price` decimal(8,2) DEFAULT '0.00' COMMENT '属性价格变化',
  `goods_id` int(11) DEFAULT NULL,
  `attr_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`goods_attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_goods_attr
-- ----------------------------
INSERT INTO `hd_goods_attr` VALUES ('1', '黑色', '10.00', '1', '1');
INSERT INTO `hd_goods_attr` VALUES ('2', '白色', '20.00', '1', '1');
INSERT INTO `hd_goods_attr` VALUES ('3', '金色', '30.00', '1', '1');
INSERT INTO `hd_goods_attr` VALUES ('4', '移动4G版', '40.00', '1', '2');
INSERT INTO `hd_goods_attr` VALUES ('5', '全网通', '50.00', '1', '2');
INSERT INTO `hd_goods_attr` VALUES ('6', '8GB', '60.00', '1', '3');
INSERT INTO `hd_goods_attr` VALUES ('7', '16GB', '70.00', '1', '3');
INSERT INTO `hd_goods_attr` VALUES ('8', '黑色', '100.00', '2', '1');
INSERT INTO `hd_goods_attr` VALUES ('9', '白色', '0.00', '2', '1');
INSERT INTO `hd_goods_attr` VALUES ('10', '移动4G版', '100.00', '2', '2');
INSERT INTO `hd_goods_attr` VALUES ('11', '8GB', '200.00', '2', '3');
INSERT INTO `hd_goods_attr` VALUES ('12', '16GB', '300.00', '2', '3');
INSERT INTO `hd_goods_attr` VALUES ('13', '黑色', '0.00', '3', '1');
INSERT INTO `hd_goods_attr` VALUES ('14', '白色', '0.00', '3', '1');
INSERT INTO `hd_goods_attr` VALUES ('15', '移动4G版', '0.00', '3', '2');
INSERT INTO `hd_goods_attr` VALUES ('16', '8GB', '0.00', '3', '3');
INSERT INTO `hd_goods_attr` VALUES ('17', '16GB', '200.00', '3', '3');
INSERT INTO `hd_goods_attr` VALUES ('18', '黑色', '0.00', '4', '1');
INSERT INTO `hd_goods_attr` VALUES ('19', '白色', '0.00', '4', '1');
INSERT INTO `hd_goods_attr` VALUES ('20', '移动4G版', '0.00', '4', '2');
INSERT INTO `hd_goods_attr` VALUES ('21', '8GB', '0.00', '4', '3');
INSERT INTO `hd_goods_attr` VALUES ('22', '16GB', '100.00', '4', '3');
INSERT INTO `hd_goods_attr` VALUES ('23', '黑色', '0.00', '5', '1');
INSERT INTO `hd_goods_attr` VALUES ('24', '移动4G版', '0.00', '5', '2');
INSERT INTO `hd_goods_attr` VALUES ('25', '8GB', '0.00', '5', '3');
INSERT INTO `hd_goods_attr` VALUES ('26', '金色', '100.00', '6', '1');
INSERT INTO `hd_goods_attr` VALUES ('27', '移动4G版', '0.00', '6', '2');
INSERT INTO `hd_goods_attr` VALUES ('28', '8GB', '0.00', '6', '3');
INSERT INTO `hd_goods_attr` VALUES ('29', '金色', '0.00', '7', '1');
INSERT INTO `hd_goods_attr` VALUES ('30', '移动4G版', '0.00', '7', '2');
INSERT INTO `hd_goods_attr` VALUES ('31', '联通4G版', '0.00', '7', '2');
INSERT INTO `hd_goods_attr` VALUES ('32', '8GB', '0.00', '7', '3');
INSERT INTO `hd_goods_attr` VALUES ('33', '黑色', '0.00', '8', '1');
INSERT INTO `hd_goods_attr` VALUES ('34', '白色', '0.00', '8', '1');
INSERT INTO `hd_goods_attr` VALUES ('35', '金色', '100.00', '8', '1');
INSERT INTO `hd_goods_attr` VALUES ('36', '电信4G版', '0.00', '8', '2');
INSERT INTO `hd_goods_attr` VALUES ('37', '8GB', '0.00', '8', '3');
INSERT INTO `hd_goods_attr` VALUES ('38', '16GB', '100.00', '8', '3');
INSERT INTO `hd_goods_attr` VALUES ('39', '广东', '0.00', '8', '4');
INSERT INTO `hd_goods_attr` VALUES ('40', '酷睿i3', '10.00', '9', '5');
INSERT INTO `hd_goods_attr` VALUES ('41', '酷睿i5', '20.00', '9', '5');
INSERT INTO `hd_goods_attr` VALUES ('42', '酷睿i7', '30.00', '9', '5');
INSERT INTO `hd_goods_attr` VALUES ('43', '14英寸', '100.00', '9', '6');
INSERT INTO `hd_goods_attr` VALUES ('44', '15英寸', '200.00', '9', '6');
INSERT INTO `hd_goods_attr` VALUES ('45', '集成显卡', '300.00', '9', '7');
INSERT INTO `hd_goods_attr` VALUES ('46', '双显卡', '15.00', '9', '7');
INSERT INTO `hd_goods_attr` VALUES ('47', '发烧级显卡', '25.00', '9', '7');
INSERT INTO `hd_goods_attr` VALUES ('48', '酷睿i5', '0.00', '10', '5');
INSERT INTO `hd_goods_attr` VALUES ('49', '酷睿i7', '10.00', '10', '5');
INSERT INTO `hd_goods_attr` VALUES ('50', '13英寸', '0.00', '10', '6');
INSERT INTO `hd_goods_attr` VALUES ('51', '15英寸', '100.00', '10', '6');
INSERT INTO `hd_goods_attr` VALUES ('52', '性能级显卡', '0.00', '10', '7');
INSERT INTO `hd_goods_attr` VALUES ('53', '发烧级显卡', '10.00', '10', '7');
INSERT INTO `hd_goods_attr` VALUES ('54', '酷睿i5', '10.00', '11', '5');
INSERT INTO `hd_goods_attr` VALUES ('55', '酷睿i7', '20.00', '11', '5');
INSERT INTO `hd_goods_attr` VALUES ('56', '14英寸', '100.00', '11', '6');
INSERT INTO `hd_goods_attr` VALUES ('57', '15英寸', '200.00', '11', '6');
INSERT INTO `hd_goods_attr` VALUES ('58', '发烧级显卡', '0.00', '11', '7');
INSERT INTO `hd_goods_attr` VALUES ('59', '酷睿i5', '10.00', '12', '5');
INSERT INTO `hd_goods_attr` VALUES ('60', '酷睿i7', '20.00', '12', '5');
INSERT INTO `hd_goods_attr` VALUES ('61', '14英寸', '0.00', '12', '6');
INSERT INTO `hd_goods_attr` VALUES ('62', '15英寸', '100.00', '12', '6');
INSERT INTO `hd_goods_attr` VALUES ('63', '发烧级显卡', '10.00', '12', '7');
INSERT INTO `hd_goods_attr` VALUES ('64', '酷睿i7', '100.00', '13', '5');
INSERT INTO `hd_goods_attr` VALUES ('65', '15英寸', '20.00', '13', '6');
INSERT INTO `hd_goods_attr` VALUES ('66', '发烧级显卡', '0.00', '13', '7');
INSERT INTO `hd_goods_attr` VALUES ('67', '酷睿i7', '10.00', '14', '5');
INSERT INTO `hd_goods_attr` VALUES ('68', '15英寸', '0.00', '14', '6');
INSERT INTO `hd_goods_attr` VALUES ('69', '发烧级显卡', '100.00', '14', '7');
INSERT INTO `hd_goods_attr` VALUES ('70', '酷睿i7', '0.00', '15', '5');
INSERT INTO `hd_goods_attr` VALUES ('71', '15英寸', '100.00', '15', '6');
INSERT INTO `hd_goods_attr` VALUES ('72', '发烧级显卡', '200.00', '15', '7');
INSERT INTO `hd_goods_attr` VALUES ('73', '酷睿i7', '10.00', '16', '5');
INSERT INTO `hd_goods_attr` VALUES ('74', '15英寸', '200.00', '16', '6');
INSERT INTO `hd_goods_attr` VALUES ('75', '发烧级显卡', '0.00', '16', '7');
INSERT INTO `hd_goods_attr` VALUES ('76', '酷睿i7', '0.00', '17', '5');
INSERT INTO `hd_goods_attr` VALUES ('77', '15英寸', '0.00', '17', '6');
INSERT INTO `hd_goods_attr` VALUES ('78', '发烧级显卡', '0.00', '17', '7');

-- ----------------------------
-- Table structure for hd_goods_pics
-- ----------------------------
DROP TABLE IF EXISTS `hd_goods_pics`;
CREATE TABLE `hd_goods_pics` (
  `pics_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL,
  `pics_big` varchar(255) DEFAULT NULL,
  `pics_mid` varchar(255) DEFAULT NULL,
  `pics_small` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_goods_pics
-- ----------------------------
INSERT INTO `hd_goods_pics` VALUES ('2', '1', 'Upload/90271442210700.jpg', 'Upload/90271442210700_mid.jpg', 'Upload/90271442210700_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('3', '2', 'Upload/3431442212592.jpg', 'Upload/3431442212592_mid.jpg', 'Upload/3431442212592_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('4', '3', 'Upload/41791442212811.jpg', 'Upload/41791442212811_mid.jpg', 'Upload/41791442212811_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('5', '4', 'Upload/18451442212988.jpg', 'Upload/18451442212988_mid.jpg', 'Upload/18451442212988_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('6', '5', 'Upload/361442213694.jpg', 'Upload/361442213694_mid.jpg', 'Upload/361442213694_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('7', '6', 'Upload/10581442213837.jpg', 'Upload/10581442213837_mid.jpg', 'Upload/10581442213837_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('8', '7', 'Upload/41811442213998.jpg', 'Upload/41811442213998_mid.jpg', 'Upload/41811442213998_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('9', '8', 'Upload/41761442214526.jpg', 'Upload/41761442214526_mid.jpg', 'Upload/41761442214526_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('10', '9', 'Upload/50871443078851.png', 'Upload/50871443078851_mid.png', 'Upload/50871443078851_small.png');
INSERT INTO `hd_goods_pics` VALUES ('11', '10', 'Upload/86041443079050.jpg', 'Upload/86041443079050_mid.jpg', 'Upload/86041443079050_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('12', '11', 'Upload/5151443079299.jpg', 'Upload/5151443079299_mid.jpg', 'Upload/5151443079299_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('13', '12', 'Upload/54221443079411.jpg', 'Upload/54221443079411_mid.jpg', 'Upload/54221443079411_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('14', '13', 'Upload/33431443079515.png', 'Upload/33431443079515_mid.png', 'Upload/33431443079515_small.png');
INSERT INTO `hd_goods_pics` VALUES ('15', '14', 'Upload/51001443079597.png', 'Upload/51001443079597_mid.png', 'Upload/51001443079597_small.png');
INSERT INTO `hd_goods_pics` VALUES ('16', '15', 'Upload/35481443079710.jpg', 'Upload/35481443079710_mid.jpg', 'Upload/35481443079710_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('17', '16', 'Upload/72451443079787.jpg', 'Upload/72451443079787_mid.jpg', 'Upload/72451443079787_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('18', '17', 'Upload/17341443079975.jpg', 'Upload/17341443079975_mid.jpg', 'Upload/17341443079975_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('19', '1', 'Upload/32541443080520.jpg', 'Upload/32541443080520_mid.jpg', 'Upload/32541443080520_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('20', '1', 'Upload/40681443080623.jpg', 'Upload/40681443080623_mid.jpg', 'Upload/40681443080623_small.jpg');
INSERT INTO `hd_goods_pics` VALUES ('22', '1', 'Upload/25321443080636.jpg', 'Upload/25321443080636_mid.jpg', 'Upload/25321443080636_small.jpg');

-- ----------------------------
-- Table structure for hd_goods_stock
-- ----------------------------
DROP TABLE IF EXISTS `hd_goods_stock`;
CREATE TABLE `hd_goods_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_attr` char(30) DEFAULT NULL,
  `stock_goods_sn` char(30) DEFAULT NULL,
  `stock_count` mediumint(9) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_goods_stock
-- ----------------------------
INSERT INTO `hd_goods_stock` VALUES ('1', '1-4-6', 'gd1442563802646', '123', '1');
INSERT INTO `hd_goods_stock` VALUES ('2', '1-4-7', 'gd1442563802830', '20', '1');
INSERT INTO `hd_goods_stock` VALUES ('3', '1-5-6', 'gd1442563802430', '23', '1');
INSERT INTO `hd_goods_stock` VALUES ('4', '1-5-7', 'gd1442563802283', '456', '1');
INSERT INTO `hd_goods_stock` VALUES ('5', '2-4-6', 'gd1442563802128', '435', '1');
INSERT INTO `hd_goods_stock` VALUES ('6', '2-4-7', 'gd1442563802424', '234', '1');
INSERT INTO `hd_goods_stock` VALUES ('7', '2-5-6', 'gd1442563802411', '54', '1');
INSERT INTO `hd_goods_stock` VALUES ('8', '2-5-7', 'gd1442563802646', '65', '1');
INSERT INTO `hd_goods_stock` VALUES ('9', '3-4-6', 'gd1442563802684', '633', '1');
INSERT INTO `hd_goods_stock` VALUES ('10', '3-4-7', 'gd1442563802987', '32', '1');
INSERT INTO `hd_goods_stock` VALUES ('11', '3-5-6', 'gd1442563802663', '45', '1');
INSERT INTO `hd_goods_stock` VALUES ('12', '3-5-7', 'gd1442563803108', '54', '1');
INSERT INTO `hd_goods_stock` VALUES ('13', '8-10-11', 'gd1442626044803', '100', '2');
INSERT INTO `hd_goods_stock` VALUES ('14', '8-10-12', 'gd1442626045111', '100', '2');
INSERT INTO `hd_goods_stock` VALUES ('15', '9-10-11', 'gd1442626045771', '100', '2');
INSERT INTO `hd_goods_stock` VALUES ('16', '9-10-12', 'gd1442626045236', '100', '2');
INSERT INTO `hd_goods_stock` VALUES ('17', '13-15-16', 'gd1442626059406', '109', '3');
INSERT INTO `hd_goods_stock` VALUES ('18', '13-15-17', 'gd1442626060326', '1324', '3');
INSERT INTO `hd_goods_stock` VALUES ('19', '14-15-16', 'gd1442626060887', '123', '3');
INSERT INTO `hd_goods_stock` VALUES ('20', '14-15-17', 'gd1442626060953', '324', '3');
INSERT INTO `hd_goods_stock` VALUES ('21', '18-20-21', 'gd1442626070774', '123', '4');
INSERT INTO `hd_goods_stock` VALUES ('22', '18-20-22', 'gd1442626070188', '45', '4');
INSERT INTO `hd_goods_stock` VALUES ('23', '19-20-21', 'gd1442626070290', '234', '4');
INSERT INTO `hd_goods_stock` VALUES ('24', '19-20-22', 'gd1442626070572', '254', '4');
INSERT INTO `hd_goods_stock` VALUES ('25', '23-24-25', 'gd1442626076191', '123', '5');
INSERT INTO `hd_goods_stock` VALUES ('26', '29-30-32', 'gd1442626083793', '123', '7');
INSERT INTO `hd_goods_stock` VALUES ('27', '29-31-32', 'gd1442626083641', '324', '7');
INSERT INTO `hd_goods_stock` VALUES ('28', '33-36-37', 'gd1442626095773', '123', '8');
INSERT INTO `hd_goods_stock` VALUES ('29', '33-36-38', 'gd1442626095979', '34', '8');
INSERT INTO `hd_goods_stock` VALUES ('30', '34-36-37', 'gd1442626095777', '435', '8');
INSERT INTO `hd_goods_stock` VALUES ('31', '34-36-38', 'gd1442626096171', '234', '8');
INSERT INTO `hd_goods_stock` VALUES ('32', '35-36-37', 'gd1442626096460', '245', '8');
INSERT INTO `hd_goods_stock` VALUES ('33', '35-36-38', 'gd1442626096668', '123', '8');
INSERT INTO `hd_goods_stock` VALUES ('34', '70-71-72', 'gd1443079797361', '100', '15');
INSERT INTO `hd_goods_stock` VALUES ('35', '73-74-75', 'gd1443079803211', '100', '16');
INSERT INTO `hd_goods_stock` VALUES ('36', '40-43-45', 'gd1443079832398', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('37', '40-43-46', 'gd1443079832699', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('38', '40-43-47', 'gd1443079832449', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('39', '40-44-45', 'gd1443079832653', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('40', '40-44-46', 'gd1443079833930', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('41', '40-44-47', 'gd1443079833926', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('42', '41-43-45', 'gd1443079833460', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('43', '41-43-46', 'gd1443079833320', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('44', '41-43-47', 'gd1443079833666', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('45', '41-44-45', 'gd1443079833757', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('46', '41-44-46', 'gd1443079833560', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('47', '41-44-47', 'gd1443079833758', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('48', '42-43-45', 'gd1443079833815', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('49', '42-43-46', 'gd1443079833615', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('50', '42-43-47', 'gd1443079833835', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('51', '42-44-45', 'gd1443079834365', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('52', '42-44-46', 'gd1443079834336', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('53', '42-44-47', 'gd1443079834470', '1000', '9');
INSERT INTO `hd_goods_stock` VALUES ('54', '64-65-66', 'gd1443079841918', '1000', '13');
INSERT INTO `hd_goods_stock` VALUES ('55', '54-56-58', 'gd1443079849688', '1000', '11');
INSERT INTO `hd_goods_stock` VALUES ('56', '54-57-58', 'gd1443079849439', '1000', '11');
INSERT INTO `hd_goods_stock` VALUES ('57', '55-56-58', 'gd1443079849746', '1000', '11');
INSERT INTO `hd_goods_stock` VALUES ('58', '55-57-58', 'gd1443079849894', '1000', '11');
INSERT INTO `hd_goods_stock` VALUES ('59', '48-50-52', 'gd1443079874122', '1000', '10');
INSERT INTO `hd_goods_stock` VALUES ('60', '48-50-53', 'gd1443079874984', '1000', '10');
INSERT INTO `hd_goods_stock` VALUES ('61', '48-51-52', 'gd1443079874514', '1000', '10');
INSERT INTO `hd_goods_stock` VALUES ('62', '48-51-53', 'gd1443079874397', '1000', '10');
INSERT INTO `hd_goods_stock` VALUES ('63', '49-50-52', 'gd1443079874216', '1000', '10');
INSERT INTO `hd_goods_stock` VALUES ('64', '49-50-53', 'gd1443079874479', '1000', '10');
INSERT INTO `hd_goods_stock` VALUES ('65', '49-51-52', 'gd1443079874196', '1000', '10');
INSERT INTO `hd_goods_stock` VALUES ('66', '49-51-53', 'gd1443079874411', '1000', '10');

-- ----------------------------
-- Table structure for hd_order
-- ----------------------------
DROP TABLE IF EXISTS `hd_order`;
CREATE TABLE `hd_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` char(30) DEFAULT NULL COMMENT '订单号',
  `order_add_id` int(11) DEFAULT NULL COMMENT '收货人id',
  `order_price` decimal(10,2) DEFAULT '0.00' COMMENT '总价',
  `order_remark` char(200) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL COMMENT '订单生成时间',
  `order_user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `order_state` tinyint(1) DEFAULT '0' COMMENT '订单状态  0 未付款  1 已付款  2 已发货  3 已完成  4 已评价',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_order
-- ----------------------------
INSERT INTO `hd_order` VALUES ('3', 'ch1442652200617', '2', '4700.00', '', '1442652200', '6', '0');
INSERT INTO `hd_order` VALUES ('4', 'ch1442652965480', '2', '14300.00', '圣达菲', '1442652965', '6', '0');
INSERT INTO `hd_order` VALUES ('5', 'ch1442653284217', '9', '9500.00', '放大的', '1442653284', '6', '0');
INSERT INTO `hd_order` VALUES ('6', 'ch1442653304739', '2', '19400.00', '', '1442653305', '6', '0');
INSERT INTO `hd_order` VALUES ('7', 'ch1442728903871', '2', '2400.00', '不要发错了', '1442728903', '6', '0');
INSERT INTO `hd_order` VALUES ('8', 'ch1442729130737', '2', '2400.00', '', '1442729130', '6', '0');
INSERT INTO `hd_order` VALUES ('9', 'ch1443419583986', '2', '6549.00', 'gag', '1443419583', '6', '0');
INSERT INTO `hd_order` VALUES ('10', 'ch1443423701608', '9', '10000.00', '', '1443423701', '6', '0');
INSERT INTO `hd_order` VALUES ('11', 'ch1444125365608', '0', '2400.00', '123', '1444125365', '8', '0');
INSERT INTO `hd_order` VALUES ('12', 'ch1444125737916', '11', '17600.00', '', '1444125737', '8', '0');
INSERT INTO `hd_order` VALUES ('13', 'ch1444465440941', '0', '6100.00', '', '1444465440', '9', '0');
INSERT INTO `hd_order` VALUES ('14', 'ch1444706846662', '0', '11100.00', '', '1444706846', '10', '0');
INSERT INTO `hd_order` VALUES ('15', 'ch1451550483190', '0', '6110.00', '', '1451550483', '11', '0');
INSERT INTO `hd_order` VALUES ('16', 'ch1452225907459', '13', '6110.00', '', '1452225907', '12', '0');

-- ----------------------------
-- Table structure for hd_order_list
-- ----------------------------
DROP TABLE IF EXISTS `hd_order_list`;
CREATE TABLE `hd_order_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  `goods_attr` char(50) DEFAULT NULL COMMENT '商品属性',
  `buy_num` int(11) DEFAULT NULL COMMENT '购买数量',
  `list_price` decimal(10,0) DEFAULT NULL COMMENT '价格小计',
  `order_id` int(11) DEFAULT NULL,
  `order_sn` char(50) DEFAULT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_order_list
-- ----------------------------
INSERT INTO `hd_order_list` VALUES ('9', '2', '9-10-12', '1', '2300', null, 'ch1442652200617');
INSERT INTO `hd_order_list` VALUES ('10', '7', '29-31-32', '1', '2400', null, 'ch1442652200617');
INSERT INTO `hd_order_list` VALUES ('11', '2', '9-10-12', '1', '2300', null, 'ch1442652965480');
INSERT INTO `hd_order_list` VALUES ('12', '7', '29-31-32', '1', '2400', null, 'ch1442652965480');
INSERT INTO `hd_order_list` VALUES ('13', '8', '34-36-38', '1', '5200', null, 'ch1442652965480');
INSERT INTO `hd_order_list` VALUES ('14', '2', '8-10-11', '1', '2400', null, 'ch1442652965480');
INSERT INTO `hd_order_list` VALUES ('15', '3', '13-15-16', '1', '2000', null, 'ch1442652965480');
INSERT INTO `hd_order_list` VALUES ('16', '2', '8-10-11', '1', '2400', null, 'ch1442653284217');
INSERT INTO `hd_order_list` VALUES ('17', '3', '13-15-16', '1', '2000', null, 'ch1442653284217');
INSERT INTO `hd_order_list` VALUES ('18', '8', '35-36-38', '3', '5100', null, 'ch1442653284217');
INSERT INTO `hd_order_list` VALUES ('19', '2', '9-10-12', '1', '2300', null, 'ch1442653304739');
INSERT INTO `hd_order_list` VALUES ('20', '7', '29-31-32', '1', '2400', null, 'ch1442653304739');
INSERT INTO `hd_order_list` VALUES ('21', '8', '34-36-38', '1', '5200', null, 'ch1442653304739');
INSERT INTO `hd_order_list` VALUES ('22', '2', '8-10-11', '1', '2400', null, 'ch1442653304739');
INSERT INTO `hd_order_list` VALUES ('23', '3', '13-15-16', '1', '2000', null, 'ch1442653304739');
INSERT INTO `hd_order_list` VALUES ('24', '8', '35-36-38', '3', '5100', null, 'ch1442653304739');
INSERT INTO `hd_order_list` VALUES ('25', '2', '8-10-11', '1', '2400', null, 'ch1442728903871');
INSERT INTO `hd_order_list` VALUES ('26', '2', '8-10-11', '1', '2400', null, 'ch1442729130737');
INSERT INTO `hd_order_list` VALUES ('27', '10', '48-50-52', '1', '6549', null, 'ch1443419583986');
INSERT INTO `hd_order_list` VALUES ('28', '8', '33-36-37', '1', '5000', null, 'ch1443423701608');
INSERT INTO `hd_order_list` VALUES ('29', '8', '34-36-37', '1', '5000', null, 'ch1443423701608');
INSERT INTO `hd_order_list` VALUES ('30', '2', '8-10-11', '1', '2400', null, 'ch1444125365608');
INSERT INTO `hd_order_list` VALUES ('31', '2', '8-10-11', '1', '2400', null, 'ch1444125737916');
INSERT INTO `hd_order_list` VALUES ('32', '8', '33-36-37', '4', '5000', null, 'ch1444125737916');
INSERT INTO `hd_order_list` VALUES ('33', '8', '34-36-37', '4', '5000', null, 'ch1444125737916');
INSERT INTO `hd_order_list` VALUES ('34', '8', '35-36-38', '4', '5200', null, 'ch1444125737916');
INSERT INTO `hd_order_list` VALUES ('35', '15', '70-71-72', '2', '6100', null, 'ch1444465440941');
INSERT INTO `hd_order_list` VALUES ('36', '15', '70-71-72', '1', '6100', null, 'ch1444706846662');
INSERT INTO `hd_order_list` VALUES ('37', '8', '33-36-37', '1', '5000', null, 'ch1444706846662');
INSERT INTO `hd_order_list` VALUES ('38', '1', '1-4-6', '1', '6110', null, 'ch1451550483190');
INSERT INTO `hd_order_list` VALUES ('39', '1', '1-4-6', '1', '6110', null, 'ch1452225907459');

-- ----------------------------
-- Table structure for hd_shop_address
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_address`;
CREATE TABLE `hd_shop_address` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `add_province` varchar(20) DEFAULT '' COMMENT '省份',
  `add_city` varchar(20) DEFAULT '' COMMENT '城市',
  `add_detail` varchar(100) DEFAULT '' COMMENT '详细地址',
  `add_phone` varchar(30) DEFAULT '0' COMMENT '手机',
  `add_tel` varchar(30) DEFAULT '0' COMMENT '电话',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '是否默认 0 非默认   1 默认',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`add_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_address
-- ----------------------------
INSERT INTO `hd_shop_address` VALUES ('2', '陈安', '湖北省', '武汉', ' 静安区 静安寺223', '13861312480', '', '1', '6');
INSERT INTO `hd_shop_address` VALUES ('5', '王五', '', '', '', '', '', '0', null);
INSERT INTO `hd_shop_address` VALUES ('6', '哈哈', '', '', '', '', '', '0', null);
INSERT INTO `hd_shop_address` VALUES ('7', '发个', '', '', '', '', '', '0', null);
INSERT INTO `hd_shop_address` VALUES ('8', '张三', '山东省', '济南', '济南大学23公寓', '13812283288', '', '0', null);
INSERT INTO `hd_shop_address` VALUES ('9', '张三', '江西省', '南昌', '南昌大学232号', '13982398328', '', '0', '6');
INSERT INTO `hd_shop_address` VALUES ('10', '李四', '山东省', '济南', '济南大学23号', '1899238823', '', '0', '6');
INSERT INTO `hd_shop_address` VALUES ('13', 'cy', '北京市', '北京市', '北京石', '1346426464', '', '1', '12');

-- ----------------------------
-- Table structure for hd_shop_admin
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_admin`;
CREATE TABLE `hd_shop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `login_in` int(11) DEFAULT NULL,
  `login_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_admin
-- ----------------------------
INSERT INTO `hd_shop_admin` VALUES ('1', 'admin', '7fef6171469e80d32c0559f88b377245', '1448849968', '118.123.7.52');

-- ----------------------------
-- Table structure for hd_shop_article
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_article`;
CREATE TABLE `hd_shop_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` char(100) DEFAULT NULL,
  `article_author` char(10) DEFAULT NULL,
  `article_content` text,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_article
-- ----------------------------
INSERT INTO `hd_shop_article` VALUES ('1', 'zol个人帐号如何申请？', 'admin', '<p>\r\n	1、登陆ZOL商城右上角免费注册\r\n</p>\r\n<p>\r\n	页面跳转到\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">填写正确的邮箱地址，用户名和密码可选择自己常用的，填写完毕后点击注册即可。</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">注册完成后，页面右上角就会出现您的用户名。这时您就可以放心购物了~</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">2、如忘记密码及修改密码</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">进入到如图所示的页面</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">点击“忘记密码”页面跳转到</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">注意：邮箱地址必须是您当时注册的邮箱地址，如用户名和密码全都忘记只能重新注册~</span>\r\n</p>', '1443016126');
INSERT INTO `hd_shop_article` VALUES ('2', '如何搜索商品？', 'admin', '<p>\r\n	&nbsp; 1、快速查找商品\r\n</p>\r\n<p>\r\n	如图所示在橘黄色的搜索你想要的产品型号即可~\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">搜索后会出来很多的商家店铺及报价信息，您可以优先选择带有标识的商家如图所示：</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">温馨提示：</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">带有消保标识的商家，是在ZOL缴纳过保证金的，我们对这部分商家有一定的管控力，能确保您的交易安全，如您购买的商品有问题可以致电400-678-0068，我们会及时为您处理。</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">2、高级查找</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">如您还拿不定主要买那一款产品，您可以按照这样的方式搜索您想要的产品</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">这样您心目中的产品就立刻呈现在你的眼前了~</span>\r\n</p>\r\n<br />', '1443016487');
INSERT INTO `hd_shop_article` VALUES ('3', '可以通过哪些方式付款？', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	1：支付宝担保交易：付款到支付宝里，让您购物无忧~\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"line-height:1.5;\">2：快钱=网银：付款到商城，出现问题直接拨打400-678-0068客服妹纸会通知财务冻结您的款项及时帮您处理，直至问题解决~</span>\r\n</p>', '1443016562');
INSERT INTO `hd_shop_article` VALUES ('4', '先行赔付', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">1、只有您在ZOL商城购买并且有购买凭据（购买凭据包括：有效电子订单及发票凭证）的商品可申请先行赔付；</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">2、确保申请赔付的商品必须与商家销售的商品为同一件；</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">3、只有在您的商品遇到以下问题时，且与商家协商未果的情况下才可以申请先行赔付：</span>\r\n</p>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">（1）收到货物有质量问题；</span>\r\n</p>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">（2）收到货物与商家描述承诺不符；</span>\r\n</p>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">（3）付款后未能收到货物；</span>\r\n</p>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">（4）下订单后24内未发货；</span>\r\n</p>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">（5）所出售产品未带有正规发票；</span>\r\n</p>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">（6）商品满百元非顺丰包邮；</span>\r\n</p>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;background:white;\"></span>\r\n</p>\r\n<table cellspacing=\"0\" cellpadding=\"0\" style=\"color:#333333;font-family:Arial;font-size:12px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"688\" style=\"border:1px solid #DDDDDD;background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">注：买家不按照</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">ZOL</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">商城的交易流程而完结的交易不在</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">\"</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">先行赔付</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">\"</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">保障范围内；</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"151\" style=\"border:1px solid #DDDDDD;background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">1</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">）未收到货情况下，买家提前确认收货的交易；</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"151\" style=\"border:1px solid #DDDDDD;background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">2</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">）未收到货情况下，买家没有及时申请退款而超时打款的交易</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"151\" style=\"border:1px solid #DDDDDD;background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">3</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">）未在</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">ZOL</span><span style=\"font-family:微软雅黑, sans-serif;color:#B40000;\">商城提交订单，擅自与商家在线下付款完成的交易；</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p style=\"margin-left:96px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;background:white;\"></span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;\">“先行赔付”的金额范围：</span><strong><span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">&nbsp;</span></strong>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">先行赔付金额最高不超过您与商家实际交易金额。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;\">“先行赔付”的金额范围：</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">消费者向zol商城申请“先行赔付”限为自交易成功之日起计算15天内。</span>\r\n</p>', '1443016590');
INSERT INTO `hd_shop_article` VALUES ('5', '购买商品后如何退款以及申请售后？', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">退换货规则说明：</span>\r\n</p>\r\n<table cellspacing=\"0\" cellpadding=\"0\" width=\"649\" style=\"color:#333333;font-family:Arial;font-size:12px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"323\" style=\"border:1px solid #00C576;background:#D3F5E8;\">\r\n				<p style=\"font-family:arial;text-align:center;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">申请退换货的基本条件</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:#D3F5E8;\">\r\n				<p style=\"font-family:arial;text-align:center;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">不允许申请退换货的情况</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">退换商品应保持你收到商品时候的原貌</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">除商品本身原因外的个人原因，如不喜欢、产品降价等</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">退换商品应保持全新，相关附属配件齐全</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">商品自身携带的商品序列号与商户售出时约定的不符（商户售出的商品序列号应与售出时约定的相符）</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">保修卡等随货的书面材料没有填写和任何的污损、折叠</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">商品质保标签、机身、包装、保修卡条码（S/N码）被涂改、撕毁、移动或无法辨认</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">退换商品本身原包装应保持完整</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">商品购买凭证、保修卡被退改、撕毁或丢失</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">所退换的商品要求具有完整的外包装、原商品、附带商品</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">未经同意自行拆卸、修理或升级引起的机器损坏</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">收到商品与订单产品颜色、尺码、型号等不一致情</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">未按商品说明要求使用、维护、保管而引起的机器损坏</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">经由品牌商认可的售后服务中心或国家认可的第三方质检平台检测确认的商品问题，并出具有效测凭证</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">机器结构因移动、跌落、碰撞、挤压而造成的故障或破损等人为损坏痕迹</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">收到商品存在外观变形、损伤、少件等情况。少件指缺失主件或配件。提供第三方物流有效凭证（证明签收货物时商品即存在破损、少件等情况）</span>\r\n				</p>\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">商品配件缺损或包装有污染和严重积压痕迹</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"323\" rowspan=\"3\" style=\"background:white;\">\r\n				<br />\r\n			</td>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">商品返回商户的过程中由于包装或运输操作不当造成损坏</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">商品出厂时外包装有封条（以店铺及商品描述内容为准）</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"324\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">因市场原因导致商品价格变动(以商品价格以拍下价格为准)</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background:white;\">\r\n				<p style=\"font-family:arial;\">\r\n					<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';color:#000000;font-size:14px;\">附注：买产品所赠礼品，不在本店退换货商品之列，且所送赠品不予折扣现金，抵价与退换！</span>\r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1443016629');
INSERT INTO `hd_shop_article` VALUES ('6', '用户发起投诉详细介绍', 'admin', '一、用户可以针对线上交易发起投诉说明<br />\r\n1.用户可以在确认收货前发起投诉，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n2.用户也可以在收货后发起投诉，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n3.用户发起投诉后，需要填写以下内容，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n4.用户提交投诉完成后，接下来等待客服判定即可。如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n<br />\r\n二、用户可以针对线下交易发起投诉说明<br />\r\n1.只有ZOL账户的用户才可以发起线下投诉，在商品最后页面商家信息那里，点击“投诉举报”。如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n2.当用户发起完投诉后，可以在自己的买家中心看到投诉状态，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n三、客服判定投诉情况之客服判定不成立说明<br />\r\n1.当投诉被客服判定不成立时，用户在自己的买家中心可以看到，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n2.当投诉被判定不成立，用户是无法再次申请投诉维权的。如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n四、客服判定投诉情况之客服判定成立说明<br />\r\n1.当投诉被客服判定成立时，用户在自己的买家中心可以看到，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n2.商家协商处理后-买家72小时内确认 如买家未响应，视为自动放弃维权，如下图:<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n3.当商家同意用户的维权时候，用户能在自己的买家中心看到相关信息，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n4.用户可以对商家的协商结果做出同意，如果同意商家的协商结果，表示此次投诉维权已经处理完毕，如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n5.用户也可以不同意商家的写上结果，可以点击“拒绝”，拒绝后ZOL客服会在1-2个工作日介入处理的。如下图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n在用户的买家中心，也可以看到如下截图：<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n用户发起投诉详细介绍&nbsp;<br />\r\n<br />\r\n<br />\r\n最后由客服判定判定投诉即可，判定结果会在用户的买家中心显示出来。<br />\r\n<div>\r\n	<br />\r\n</div>', '1443016677');
INSERT INTO `hd_shop_article` VALUES ('7', '行货保证', 'admin', '<p>\r\n	<span style=\"color:#646464;font-family:微软雅黑, sans-serif;font-size:14px;line-height:22px;\">当您在ZOL购买带有\"Z+\"标识的全新产品时，商家承诺所售出商品均为正品行货，如买家所购商品发现假货及非原厂正品商品.</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#646464;font-family:微软雅黑, sans-serif;font-size:14px;line-height:22px;\">买家可以向ZOL发起“先行赔付”申请，ZOL核实后将进行先行赔付以保障您的合法权益。</span>\r\n</p>', '1443016699');
INSERT INTO `hd_shop_article` VALUES ('8', '如实描述', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">如实描述是加入\"Z+\"的卖家必须开通的一项基础保障服务，卖家承诺其对该件商品所做的有效描述真实有效，并与商品本身有关的信息描述属实，卖家对此负有证明责任。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">若卖家未能履行该项承诺，则ZOL商城有权依据本规范及其它公示规范的规定，对由于卖家违反该项承诺而导致利益受损的买家进行先行赔付。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"color:#646464;font-family:微软雅黑, sans-serif;font-size:14px;line-height:1.5;\">在收到商品3日内（收货日期以快递签收单）发现与描述不符且商家拒绝处理，您可根据ZOL商城\"先行赔付\"进行维权、获得赔偿。</span>\r\n</p>\r\n<div>\r\n	<br />\r\n</div>', '1443016729');
INSERT INTO `hd_shop_article` VALUES ('9', '顺丰包邮', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">当您购买ZOL带有\"Z+\"标识店铺，如收货地址在顺丰速运(即顺丰速运（集团）有限公司及其子公司)所覆盖的派送区域内，商家承诺全店商品满399元，均采用顺丰速运为消费者提供免费物流配送服务。如在商家店铺未购买达到399元，除商家优惠外，物流费用由买家自己承担。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">1、赔付保障权益</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;color:#646464;font-size:14px;\">如商家向您收取物流费用，您可根据ZOL商城\"先行赔付\"进行维权、获得赔偿。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">2、因以下原因导致延误或退回的，不在此服务保障范围内：</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">1)&nbsp;&nbsp;部份城市的偏远地区因交通等问题，配送时间可能在预计到达时间基础上延后1-2天。<br />\r\n2)&nbsp;&nbsp;因买家原因（更改收货地址、地址不详、地址错误、联系不上、拒收、无代收人等）导致包裹延误派送或无法送达的；<br />\r\n3)&nbsp;&nbsp;因不可抗力造成延误的（\"不可抗力\"指不可预见、不可避免或不可克服的客观情况以及其他影响配送时间、造成包裹配送延误的客观情况，包括但不限于全国性或区域性空中或地面交通系统管制或中断（如天气原因等）、或通讯系统干扰或故障、或政府行为、邮政主管部门政策变化、战争、地震、台风、洪水、火灾、大雨、大雾等其他类似事件）<br />\r\n4)&nbsp;&nbsp;航空违禁品、手机、电子类产品、易碎品等因航空安检查验导致无法正常配载航班或改走陆路运输的；<br />\r\n5)&nbsp;&nbsp;寄递物品违反禁、限寄规定或有关运输管理条例，经有关部门没收或依照有关法规、规定处理的；<br />\r\n6)&nbsp;&nbsp;收件人地址为机关、单位等机构，而周六、周日和公众节假日不接收邮件、包裹，造成延误的；<br />\r\n7)&nbsp;&nbsp;收件人学校、单位或住宅小区不允许投递人员入内，或买家代收方原因，导致造成延误的；</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">3、买家须知</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">1)&nbsp;&nbsp;如收货地址不在顺丰速运派送范围内时，将不属于此服务范围内，商家可使用其他快递进行配送；<br />\r\n2)&nbsp;&nbsp;寄递物品违反禁、限寄规定或有关运输管理条例，经有关部门没收或依照有关法规、规定处理的，不在补偿范围内；<br />\r\n3)&nbsp;&nbsp;顺丰速运的配送范围以本页公示的范围为准。港澳台及海外地区，大陆地区的部队（含武警）或受部队（含武警）管制的等顺丰不予收送快件的机构不在配送范围内。</span>\r\n</p>', '1443016752');
INSERT INTO `hd_shop_article` VALUES ('10', '24小时发货', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">购买带有\"Z+\"标识店铺的商品时，商家承诺您所下的订单，将在24小时内进行发货，让您能在最短的时间内收到商品。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">1、赔付保障权益:</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;color:#646464;font-size:14px;\">如您的收货地址在商家承诺的服务区域内，且在当天16:00之前拍下并成功付款的订单，商家第二天16:00前未能将商品发出，您可根据ZOL商城\"先行赔付\"进行维权、获得赔偿。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">2、如何跟踪配送信息</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;color:#646464;font-size:14px;\">配送信息可直接在您购买的商品订单中查看。或直接与卖家联系确认。您可以在商品详细页面查看入驻卖家联系信息，订单状态变为\"已发货\"后，点击查询\"物流状态\"即可查询到您所购买的商品的在途情况。或请您点击对应的物流承运商网站进行查询，快递单号可以登陆ZOL商城账号的订单管理中获取，建议发货后24小时后进行查询。查询方式如下：<br />\r\n顺丰快递：服务热线&nbsp;&nbsp;&nbsp;&nbsp;4008-111111&nbsp;&nbsp;&nbsp;&nbsp;快递单号由\"10\"或\"01\"开头的12位数字组成，例如：10******8888或01******9999。</span>\r\n</p>', '1443016785');
INSERT INTO `hd_shop_article` VALUES ('11', '发票保障', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">指买家在zol购买商品时，店铺内带有\"Z+\"标识的店铺内所购买商品均带有正规商品发票。且使用该服务不向买家收取任何其他费用。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">1、赔付保障权益</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;color:#646464;font-size:14px;\">如商家未履行所承诺的发票保障服务，您可根据ZOL商城\"先行赔付\"进行维权、获得赔偿。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">2、发票的开具</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">1. 开具发票的金额以实际支付的金额为准。<br />\r\n2. ZOL提供的发票种类有为\"普通发票\"。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">3、普通发票</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">1. 个人及不具有一般纳税人资格的企业客户，均开具普通发票<br />\r\n2. 开具普通发票时，抬头默认为收货人\"个人姓名\"，请需要更改抬头的客户在修改信息中进行修改。<br />\r\n3. 普通发票信息与您输入的信息一致的情况下，发票一经开出，恕不退换。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">4、开发票的注意事项</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">1.发票金额不能高于订单金额。<br />\r\n2.为了享受厂商提供的质保服务，请您将商品发票开具为明细。如果您购买的是数码类、手机及配件、笔记本、台式机、家电类商品，为了保证您能充分享受生产厂家提供的售后服务（售后服务需根据发票确认您的购买日期），发票内容默认为您订购的商品明细。<br />\r\n3.不同物流中心开具的发票无法合并。<br />\r\n4.使用优惠券、积分的金额不开具发票。<br />\r\n5.一个包裹对应一张发票或多张发票。<br />\r\n6、销售产品均可开具正规机打发票（普通增值税发票），无需加税点，但为了保证发票不遗漏和错开，请下订单时在补充说明（或者卖家留言），留言注明：需开发票抬头XXX公司或者XXX人名。如忘记注明，请及时联系客服帮助备注。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">5、发票的退换</span>\r\n</p>\r\n<p style=\"margin-left:48px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#646464;\">1.如果您收到的发票与您输入的开票信息、订单信息不一致，请先联系我们的客服人员，我们会以最快的速度为你更换正确的发票。<br />\r\n2.未经易ZOL商城人员的允许，财务部门将不接受电话、传真、邮件、邮寄等形式的重开发票申请，如您擅自将发票寄到我公司的任一办公地址，在寄送过程中发生的发票遗失、缺失等情况，恕我们概不负责。</span>\r\n</p>', '1443016811');
INSERT INTO `hd_shop_article` VALUES ('12', 'zol商城入驻需要遵守哪些规则呢？', 'admin', '<h3 style=\"text-align:center;\">\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;margin-left:28px;\">\r\n		<strong><span style=\"font-size:21px;line-height:31.5px;\">&nbsp;&nbsp;</span></strong><span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">申请加入Z+的商家须同时符合以下条件，方可参加Z+活动，同时Z+也有权面向特定商家招商。</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;text-indent:28px;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">1、&nbsp; 所出售商品必须为品牌授权产品。</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;text-indent:28px;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">2、&nbsp; &nbsp;加入zol商城消费者保障协议。</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;text-indent:28px;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">3、&nbsp; &nbsp;店铺内满399元顺丰包邮。</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;text-indent:28px;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">4、&nbsp; &nbsp;接受七天无理由退换货服务</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;text-indent:28px;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">5、&nbsp; &nbsp;所售出商品需在24小时内发货。</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;text-indent:28px;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">6、&nbsp; 商家必须提供正规的发票。</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;text-indent:28px;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;line-height:21px;\">7、&nbsp; 由zol商城统一进行结款，款项将在7-10个工作日统一打入商家账号。</span>\r\n	</p>\r\n	<p style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;\">\r\n		<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:red;line-height:21px;background-color:white;\">注：按照《z+服务保障说明》所有店铺履行以上责任方可加入“zol商城”。</span>\r\n	</p>\r\n	<div style=\"color:#333333;font-family:arial;font-size:16px;text-align:left;\">\r\n		<span style=\"font-weight:normal;line-height:1.5;\"></span>\r\n	</div>\r\n	<div style=\"text-align:left;\">\r\n		<span><span style=\"font-size:16px;line-height:24px;\"><br />\r\n</span></span>\r\n	</div>\r\n</h3>', '1443016848');
INSERT INTO `hd_shop_article` VALUES ('13', '入驻zol平台递交材料后多久会有反馈结果？', 'admin', '<h3 style=\"text-align:left;font-size:16px;font-family:arial;color:#333333;\">\r\n	入驻zol平台递交材料后多久会有反馈结果？\r\n</h3>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:14px;\">商家进入ZOL招商页面，点击 “联系我们” 申请入驻后，7个工作日工作人员会主动跟您取得联系。</span>\r\n</p>', '1443016884');
INSERT INTO `hd_shop_article` VALUES ('14', '新视角、新服务、新体验 ZOL商城全面升级', 'admin', '<p>\r\n	1、店面入驻流程：\r\n</p>\r\n<p>\r\n	（1）进入ZOL招商页面，详细了解入驻标准后，点击“联系我们”申请入驻。\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">2、店面试用流程：</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">（1）、试用流程：</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">经销商报名——zol商城审核——店铺开通——试用结束</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">（一）、经销商报名：</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">商家通过销售人员、商家运营人员对外的招募信息进行报名。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">（二）、zol商城审核：</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">经销商需提供公司证件、授权文件到商家运营人员，商家运营人员转交给商务进行审核。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">（三）、店铺开通：</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">经销商文件审核通过后，商家运营人员给予店铺开通及维护。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">（四）、试用结束：</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">试用期达到60天后，试用期结束</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">（2）、可参与群体：</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">经销商待审核通过后均可参与试用活动，拥有天猫、京东、1号店等电商平台的商家优先选取。</span> \r\n</p>\r\n<br />', '1443017101');
INSERT INTO `hd_shop_article` VALUES ('15', '关于ZOL商城', 'admin', '<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">&nbsp; &nbsp;ZOL商城（</span><a href=\"http://www.zol.com/\">www.zol.com</a><span style=\"font-size:14px;font-family:微软雅黑, \'Microsoft YaHei\';\">）是中国电子商务交易平台中唯一一家以专业销售3C数码产品为主导的电商平台，是中国科技门户—中关村在线（</span><a href=\"http://www.zol.com.cn/\">www.zol.com.cn</a><span style=\"font-size:14px;font-family:微软雅黑, \'Microsoft YaHei\';\">）旗下的电子商城。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, \'Microsoft YaHei\';\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">&nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">2009年3月25日，ZOL商城以</span><a href=\"http://www.zol.com/\">www.zol.com</a><span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">的域名启动。依托中关村在线媒体资讯平台，ZOL商城与品牌厂商和全国IT代理商共同打造一个透明、诚信、公正的开放式科技类电子商务平台。ZOL商城已经拥有100万注册用户，入驻合作的IT代理商高达14000家；商品数量高达76000多件。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;\">&nbsp; &nbsp;</span><span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">&nbsp;&nbsp;zol商城致力于为消费者提供最安全的科技网购消费服务平台。为了能让广大的消费者安心、放心的购买到心仪的数码产品，维护数码消费领域的健康发展，在拥有全国最全面的数码产品信息中关村在线的支撑，zol商城涵盖全国各地的数码经销商的基础上精益求精，做到科技数码产品新品、评测、报价、销售一条龙服务。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, \'Microsoft YaHei\';\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">Z团聚合上千个合作的厂商伙伴和数万家专业守信的IT商家的优势，推出诚信可靠且资源浑厚的IT产品团购平台。2014年，Z团总交易金额突破亿元大关，为用户节省数千万元。Z团已成长为第一科技团购网站，成为喜欢最新、最酷、最潮数码产品的用户的首选。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, \'Microsoft YaHei\';\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<strong><span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">服务保障说明：</span></strong>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;font-size:14px;\">众多的电商网被水货、翻新货、假货等充斥，造成了数码产品消费领域的恶性发展。Zol商城通过在数码产品领域的多年积累，推出了科技数码网购的消费专属平台，并开创了独有的一套服务体系—“Z+”，包含行货保证、先行赔付、如实描述、24小时发货、顺丰包邮、无忧退换货、发票保障等等，从买家到卖家两方面做到全面保障，势必做到让每款商品都物超所值，让每一笔订单都完美无瑕，Z+为您带来的不仅仅是服务，更是您在电商的大潮中不可或缺的指路明灯。Z+保障体系志在为广大数码消费者提供最安全的数码网购服务消费平台。</span><span style=\"font-family:微软雅黑, \'Microsoft YaHei\';\"><span style=\"font-family:微软雅黑, sans-serif;\">&nbsp;</span></span>\r\n</p>\r\n<div>\r\n	<br />\r\n</div>', '1443017263');
INSERT INTO `hd_shop_article` VALUES ('16', '联系我们', 'admin', '<span style=\"color:#333333;line-height:22px;font-size:14px;font-family:微软雅黑, sans-serif;\">公司注册名称：</span><span style=\"color:#333333;line-height:22px;font-size:14px;font-family:微软雅黑, sans-serif;\">北京蜂尚科技有限公司</span><span style=\"color:#333333;line-height:22px;font-size:14px;font-family:微软雅黑, sans-serif;\"><br />\r\n商城地址：北京市海淀区海淀大街3号鼎好大厦B座9层&nbsp;</span><strong><span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#C00000;\"><br />\r\n</span></strong><span style=\"color:#333333;line-height:22px;font-size:14px;font-family:微软雅黑, sans-serif;\">邮政编码：100080&nbsp;<br />\r\n全国客服热线电话：400-678-0068（工作时间周一至周五9：00-18：00，周六周天工作时间10：00-16：00）<br />\r\n传真：010-68979888<br />\r\n全国客服中心邮箱：</span><a href=\"mailto:400@zol.com.cn\"><span style=\"font-size:14px;font-family:微软雅黑, sans-serif;color:#0070C0;\">400@zol.com.cn</span></a>', '1443017294');
INSERT INTO `hd_shop_article` VALUES ('17', '发展历程', 'admin', '<h3 style=\"font-size:16px;font-family:arial;color:#333333;text-align:center;\">\r\n	<strong>2015年03月18日，</strong><span style=\"font-size:14px;font-weight:normal;line-height:1.5;\">慧聪网发布公告称，与中关村在线实际控制方达成收购意向，拟以约15亿元人民币收购后者全部股权。</span>\r\n</h3>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"><strong>&nbsp;</strong></span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;2014年 3月17日，</strong>中关村在线主办，携手中关村商城及Z团举办的“绿色Z通道，畅享Z优惠——2014中关村在线校园行”3月17日北京工业大学正式启航。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"><strong>&nbsp;</strong></span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;2013年4月23日，</strong>由</span><a href=\"http://www.zol.com.cn/\">中关村在线</a><span style=\"font-size:14px;\">主办，携手中关村商城（</span><a href=\"http://tuan.zol.com/\">Z团</a><span style=\"font-size:14px;\">）举办的“Z独享&nbsp;</span><a href=\"http://tuan.zol.com/\">团购</a><span style=\"font-size:14px;\">月——中关村在线校园行活动”将于4月23日在中国邮政大学首次启航。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"><strong>&nbsp; &nbsp;&nbsp;</strong></span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>2011年12月</strong>，商城正式启动年末全网狂购促销活动，全新的四个板块，让买家有玩有乐！</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2011年9月</strong>，中关村商城团购频道和中关村e世界开始第一次合作，开辟了电子商城第一次O2O合作的新纪元。活动历时1个多月，线上线下的互动合作，给消费者带来了全新的体验。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2011年6月14日</strong>，中关村商城团购频道——Z团第三版新版上线！Z团新版在紧锣密鼓进行了2个月后，终于华丽转身！从Z团主题颜色、logo 、导航条、首页版式、最终页展示，全面提升，以科技和时尚为主体元素，向用户传导Z团的新面貌！Z团将继续保持对细节疯狂优化、埋头快速学习的势头，全力打造中关村商城优势品牌。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2011年6月10日</strong>，中关村商城又一个大事件：限时抢购频道上线！在上线的当天，给达商城的销售额提高了一番，取得了非常好的效果。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2011年3月25日</strong>，中关村商城举办：将“爱”进行到底 中关村商城2周年特别奉献活动，借此两周年庆之际，为了最大限度地回馈用户，中关村商城以“将‘爱’进行到底”为主题特别推出了多项庆典活动，为爱新鲜事物、爱团购、爱打折、爱抽奖的朋友们送出最实实在在的优惠与奖品。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2011年3月20日</strong>，中关村商城积分商城上线，标志着购物的同时，也可以用积分获得更多的礼品和娱乐方式。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2010年10月17日</strong>，中关村商城两大最具特色的产品，秒杀与团购深受广大厂商的好评。国美第三届手机节，中关村商城作为主要活动的承办方，圆满完成本次大型活动：《国美第三届手机节落幕 秒杀团购活动空前火热》</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2010年09月17日</strong>，随着团购的战火在全国迅速蔓延，中关村商城凭借坐拥几千家厂商和5万多经销商的资源优势，为用户推出第一个专业的IT产品团购平台：《鏖战金秋 中关村商城团购频道“Z团”火爆开启》</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2010年08月16日</strong>，中关村商城在运营1年零5个月之后，根据自身综合发展需要，升级为开放式平台，作为专业IT类渠道商的电子商务服务提供商，为ZOL五万多家企业级的经销商提供增值服务：《中关村商城升级为开放式平台》</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2010年04月28日</strong>，中关村商城完成第三版改版之后，紧接着推出了1周年庆典大型活动：《中关村商城大回馈 六重好礼贺周年》</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2010年04月15日</strong>&nbsp;，中关村商城，脚步继续不停歇地往前飞奔。用一年的时间，完成了新商城搭建上线，2次大改版：《新增6大元素 中关村商城正式版全新启动》</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2010年01月08日</strong>，在电子商务的历史里，不应用“年”作为单位。中关村商城走过了即将一年，当我们回首看过去走过的300多个日夜时，发现自身也已日新月异：《日新月异 中关村商城的一年历练与成长》</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2010年01月</strong>，中关村商城第一万的成交用户，在本月诞生！同时，这也是商城各类活动各种优惠最频繁的一个月，在本月里，联想小Y的团购，thinkpadsl410的团购、win7的团购、佳能500D、尼康90D、诺基亚E72、森海塞尔耳机、希捷移动硬盘等产品的限时抢购，为我们商城的忠诚用户，提供了更多优惠购物的选择。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年12月</strong>，中关村商城交易额突破300万。在高速发展的同时，中关村商城的售后投诉解决率仍保持100%!&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年11月</strong>，中关村商城活跃用户突破10万，当月注册用户突破2万。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年10月</strong>，再续9月优惠之旅，中关村商城继续推出秒杀活动。联合HP、三星、华硕、技嘉、蓝魔等品牌，连续不断地把中关村商城秒杀活动推向高潮。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年9月</strong>，为答谢广大网友对中关村商城的关注与支持，在启动半年之际，商城正式推出首次盛大商品特卖会。七个活动联袂出演，包括：天天半价买电脑1元秒杀热销品积分换精品免费得购物券买了就送礼写博文得大奖赢泰国双人游。七个活动，得到各大小媒体共129家的传播和推广，为广大用户送去了真实惠！</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年8月</strong>，中关村商城突破百万交易量。聚集运营5个月之功，中关村商城踏上了单月百万量级之路。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年7月</strong>，商城迎来了交易额最大，购买次数最多的用户。一个远在吉林延边延吉的用户，在短短一个月内，在商城消费累计达3万元，交易次数6次。在本月，中关村商城对产品终端页优化完成。优化后的终端页，为购物的用户提供良好的购物体验，优化的效果显著，在当月，交易额同比上月翻2翻。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年6月</strong>，中关村商城对产品列表页进行改进。与此同时，长城显示器、天语手机盛装入驻中关村商城，联合zol一同举办了线上线下相结合的特价促销活动。</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年5月</strong>，商城1.0上线后，根据运行2个月的实际情况，进行二次改进。2.0版首页上线，新增了手机、笔记本、数码相机三个频道页</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年4月</strong>，试运行1个月的中关村商城，突破了10万交易量。虽然这是一个很小的数字，但不积跬步何以至千里？</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\">&nbsp;</span>\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-size:14px;\"> <strong>2009年3月25日</strong>，中关村商城以zolcom的域名正式启动！中关村商城beta版上线。</span>\r\n</p>', '1443017323');
INSERT INTO `hd_shop_article` VALUES ('18', '媒体报道', 'admin', '<h3 style=\"text-align:left;font-size:16px;font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-weight:normal;line-height:1.5;\">2011年3月25日报道</span>\r\n</h3>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">新浪：</span><a href=\"http://tech.sina.com.cn/roll/2011-03-25/14345332177.shtml\">将“爱”进行到底 中关村商城2周年特别奉献</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/222/2223493.html\">将“爱”进行到底 中关村商城2周年特别奉献</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2010年11月17日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/204/2047843.html\"><span style=\"font-family:宋体;\">国美第三届手机节落幕</span><span style=\"font-family:Calibri;\"> </span><span style=\"font-family:宋体;\">秒杀团购活动空前火热</span></a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2010年09月17日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/196/1964372.html\">鏖战金秋 中关村商城团购频道“Z团”火爆开启</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2010年08月16日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/191/1917915.html\">中关村商城升级为开放式平台</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2010年08月06日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/190/1905148.html\">中关村商城将升级为开放式平台</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2010年04月28日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/175/1759844.html\">中关村商城大回馈 六重好礼贺周年</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2010年04月15日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/173/1739202.html\">新增6大元素 中关村商城正式版全新启动</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2010年01月08日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/161/1616843.html\">日新月异 中关村商城的一年历练与成长</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年11月3日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">51callcenter：</span><a href=\"http://www.51callcenter.com/newsinfo/212/43623/\">CBSI副总刘小东：电子商务后台流程更重要</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年09月28日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/150/1502306.html\">中关村商城喜获首届电子商务百佳奖</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年09月25日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://price.zol.com.cn/149/1498693.html\">中关村商城的半年坚守与改变</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年08月19日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/145/1452827.html\" target=\"_blank\">做客百度技术创新大会-电子商务论坛</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年04月16日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">21CN : </span><a href=\"http://it.21cn.com/itnews/zolnews/2009/04/16/6156147.shtml\" target=\"_blank\">刘小东:7亿移动用户与百亿电子商务并</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年03月30日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">艾瑞网: </span><a href=\"http://news.iresearch.cn/viewpoints/92507.shtml\" target=\"_blank\">电子商务新模式案例分析——中关村商城</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年03月27日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">新浪网: </span><a href=\"http://tech.sina.com.cn/i/2009-03-27/10032948636.shtml\" target=\"_blank\">3年投资1亿元 ZOL电子商务平台启动</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年03月26报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">网&nbsp;&nbsp;易: </span><a href=\"http://tech.163.com/09/0326/04/55A9H317000915BF.html\" target=\"_blank\">中关村在线亿元造网上商城</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年03月25日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线: </span><a href=\"http://news.zol.com.cn/127/1272311.html\" target=\"_blank\">刘小东：ZOL未来5大方向 商城只是开始</a><span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年03月25日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中关村在线：</span><a href=\"http://news.zol.com.cn/127/1274425.html\">ZOL电子商城上线 已迎来第一笔交易</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2009年03月20日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">计世网: </span><a href=\"http://www.ccw.com.cn/fortune/news/electron_business/htm2009/20090320_605748.shtml\" target=\"_blank\">刘小东：3年砸1亿 誓建电子商务新标准</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2008年11月05日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">中华网: </span><a href=\"http://tech.china.com/zh_cn/news/net/domestic/11066127/20081105/15171553.html\" target=\"_blank\">中关村在线巨资收回顶级域名背后的意义</a><span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2008年11月05日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">新浪网: </span><a href=\"http://tech.sina.com.cn/i/2008-11-05/17262558926.shtml\" target=\"_blank\">科技市场寒冬 专业媒体各寻出路 斥资百万收购zol.com</a> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">2008年11月04日报道</span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<br />\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<br />\r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">腾讯QQ: </span><a href=\"http://tech.qq.com/a/20081104/000205_1.htm\" target=\"_blank\">CNET刘小东：明年是IT垂直网站最黑暗的日子</a><span style=\"color:#0070C0;font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"><span style=\"color:#000000;\"></span> </span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\"><span style=\"color:#000000;\">2008年11月03日报道</span></span> \r\n</p>\r\n<p style=\"font-family:arial;color:#333333;\">\r\n	<span style=\"font-family:微软雅黑, \'Microsoft YaHei\';font-size:16px;\">搜狐网: </span><a href=\"http://it.sohu.com/20081103/n260411237.shtml\" target=\"_blank\">中关村在线耗资百万收购ZOL.COM域名</a> \r\n</p>', '1443017350');
INSERT INTO `hd_shop_article` VALUES ('19', '全网通与性价比的完美结合 华为荣耀4A评测', 'admin', '<p>\r\n	以往全网通机型仿佛只出现在中高端机型当中，虽然苹果iPhone 6的到来掀起了全网通功能普及的热潮，但是被划分到入门级产品当中的全网通机型还是非常少的。若是出现一款仅售699元的机型，它的配置就不输同价位对手，且同时加上了“高端大气”的全网通功能，还有2GB RAM与Android 5.1.1这两个光环，可否让你心动？\r\n</p>\r\n<p>\r\n	7月21日，荣耀手机家族新增加了一位新成员，它就是之前网上传闻的荣耀4A 全网通(参数 报价 论坛 软件)。荣耀4A的配置上综合来讲属于同价位机型的主流，最基础版本都拥有2GB 的RAM，拥有移动版、电信版与全网通版三个版本，其中前者价格599元，后两者价格为699元。PS：本次参与评测的为全网通版本，机型还处于工程机阶段，在系统界面、硬件性能与拍摄效果等方面可能与正式零售版存在差距。\r\n</p>', '1443057901');
INSERT INTO `hd_shop_article` VALUES ('20', '华为Mate7评测：更高屏占比 指纹识别准确', 'admin', '<p>\r\n	[摘要]华为Mate7延续了之前华为Mate、Mate2大屏的特点，在此基础上增加了指纹传感器。\r\n</p>\r\n<p>\r\n	九月对于手机行业而言是血雨腥风的季节。就在IFA2014开展的前一天，华为正式在全球范围内发布了最新大屏旗舰Ascend Mate7。从起初的机海战术到今天的精品策略，华为开始让自己的智能手机走上世界舞台，与国际手机品牌并肩向全球市场展示华为旗下的最强旗舰。\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">2013年1月7日，华为Mate首次亮相CES。时隔一年，我们又迎来了华为Mate2。对于这次华为Mate7的命名我实在是有些意外，如此大跨度的命名也让人开始大胆猜测。对此华为终端董事长余承东表示这是因为中间迭代的型号因为种种原因被删减掉，而且最终定为华为Mate7也预示它是一款“七项全能”的手机。因此本文我们的评测也将会围绕七项重点来谈。</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">外观：全金属机身紧凑设计</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">回到产品身上，首先我们来看看华为Mate7这款手机的外观设计。华为Mate7机身给人的第一印象是非常高的屏占比，实际上达到了83%的比例。其中上边框高度为10.4毫米，下边框高度为13.7毫米，屏幕边框则为2.9毫米。机身正面比较突出的是配备了LED呼吸灯，当有未读信息时会持续闪烁加以提醒。底部的Android触控按键集成在了屏幕中。</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">华为Mate7的内部结构采用铝合金材质，相比一般金属手机所采用的不锈钢具备更轻便的特点，算是权衡了一些金属手机的利和弊。机身正面配备了一枚500万像素的前置摄像头，机身背部则是1300万像素的后置摄像头，辅以LED闪光灯。</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">三段式的机身背部最显眼的是摄像头下方的指纹识别区域。华为Mate7采用了和苹果iPhone5s一样的点按式指纹识别方式，指纹识别区域被一圈金属加以包裹。背部点按式的设计带来的好处是单手进行持握也可以轻松解锁。机身背部的左下方是扬声器的位置，一般情况下横向持握手机并不会挡住扬声器。</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">细节按键方面，华为Mate7的设计也合情合理。音量键和电源键设计在了机身的右侧，单手持握时可以轻松的用大拇指点按到。华为Mate7支持双卡双待，上面的卡槽支持Micro SIM卡接入，下面卡槽则支持Nano SIM卡与Micro SD卡二合一使用。网络制式上支持4GFDD-LTE、TD-LTE。</span>\r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;\">与此同时，华为Mate7由于具备双麦克风降噪效果，所以通话质量也比较清晰。只是听筒音量依旧可以提升，在有些嘈杂的环境下例如地铁会偶尔出现因声音过小而听不清的情况。另外在机身配色方面，华为Mate7提供曜石黑、月光银、琥珀金三种颜色供选择。</span>\r\n</p>', '1443057971');
INSERT INTO `hd_shop_article` VALUES ('21', '双卡双待超薄机身 华为G6电信版评测', 'admin', '<p>\r\n	今年的MWC2014世界移动通信大会上，华为第一个召开了发布会在会上推出了跨界产品“荣耀X1”以及主打轻薄拍照的“华为G6”。其中华为G6外观和之前的华为P6非常相似，不同的是华为G6的机身工艺以及设计方面都有不同程度的改进，今天就给大家详细的评测一下这款手机。\r\n</p>\r\n<p>\r\n	先来看看外观方面，华为G6延用了Ascend P系列的双C设计，前面板外观上类似一体成型，不同的是后盖变成了一整块并且可以拆卸了。由于外观和P6相差不大，所以看上去和P6非常相似，机身厚度也是非常薄仅为7.5mm。华为G6配备有一块4.5英寸qHD LCD显示屏，内置高通MSM8612四核1.2GHz处理器，1GB的RAM+4GB的ROM，后置800万像素摄像头，前置500万像素摄像头。电池容量2000mAh超大容量锂聚合物电池，运行Android 4.3操作系统以及Emotion UI 2.0 Lite。本次送测的是G6的电信定制的3G版本所以并不支持NFC功能，4G版本后续会推出。\r\n</p>', '1443058021');
INSERT INTO `hd_shop_article` VALUES ('22', '【中奖名单】荣耀4A微信预约专场 预约赢大奖', 'admin', '<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">小伙伴们，荣耀4A微信预约专场预约赢大奖中奖名单出来了！欢迎查看。</span>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">一等奖：荣耀4A全网通手机 共1台</span>\r\n</p>\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"123\" class=\" noBorderTable ke-zeroborder\" style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;font-size:12px;width:123px;background-color:#FFFFFF;\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"18\" width=\"123\">\r\n				186****4533\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">二等奖：荣耀引擎耳机共5副</span>\r\n</p>\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"574\" class=\" noBorderTable ke-zeroborder\" style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;font-size:12px;width:573px;background-color:#FFFFFF;\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"18\" width=\"123\">\r\n				153****5003\r\n			</td>\r\n			<td width=\"103\">\r\n				130****3091\r\n			</td>\r\n			<td width=\"112\">\r\n				187****7284\r\n			</td>\r\n			<td width=\"120\">\r\n				135****4586\r\n			</td>\r\n			<td width=\"116\">\r\n				132****5056\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">三等奖：荣耀4A全网通优购码 共30个</span>\r\n</p>\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"574\" class=\" noBorderTable ke-zeroborder\" style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;font-size:12px;width:573px;background-color:#FFFFFF;\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"18\" width=\"123\">\r\n				137****6915\r\n			</td>\r\n			<td width=\"103\">\r\n				182****8641\r\n			</td>\r\n			<td width=\"112\">\r\n				131****1342\r\n			</td>\r\n			<td width=\"120\">\r\n				170****4857\r\n			</td>\r\n			<td width=\"116\">\r\n				158****9819\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"18\">\r\n				151****8912\r\n			</td>\r\n			<td>\r\n				152****2143\r\n			</td>\r\n			<td>\r\n				139****5511\r\n			</td>\r\n			<td>\r\n				186****9455\r\n			</td>\r\n			<td>\r\n				151****8248\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"18\">\r\n				170****1674\r\n			</td>\r\n			<td>\r\n				130****1266\r\n			</td>\r\n			<td>\r\n				135****8782\r\n			</td>\r\n			<td>\r\n				136****6205\r\n			</td>\r\n			<td>\r\n				135****6143\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"18\">\r\n				185****1696\r\n			</td>\r\n			<td>\r\n				151****7094\r\n			</td>\r\n			<td>\r\n				155****8917\r\n			</td>\r\n			<td>\r\n				170****9705\r\n			</td>\r\n			<td>\r\n				130****0260\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"18\">\r\n				184****2256\r\n			</td>\r\n			<td>\r\n				130****1402\r\n			</td>\r\n			<td>\r\n				183****4605\r\n			</td>\r\n			<td>\r\n				156****4693\r\n			</td>\r\n			<td>\r\n				180****4865\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"18\">\r\n				131****4642\r\n			</td>\r\n			<td>\r\n				135****9335\r\n			</td>\r\n			<td>\r\n				152****0817\r\n			</td>\r\n			<td>\r\n				134****5407\r\n			</td>\r\n			<td>\r\n				159****4859\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">8</span><span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">月18日12:00-8月24日18:00，荣耀4A微信预约专场来袭！活动期间只能在华为商城官方微信预约，预约即有机会免费赢取荣耀4A/引擎耳机等3重大奖！还在等什么，赶紧拿起手机，关注华为商城官方微信参与预约吧！更多详情狂戳</span><a href=\"http://sale.vmall.com/4awxzc.html\"><span style=\"font-size:14px;font-family:微软雅黑, sans-serif;\">http://sale.vmall.com/4awxzc.html</span></a>\r\n</p>', '1443058062');
INSERT INTO `hd_shop_article` VALUES ('23', 'VMALL招聘季| JOIN US，FOR OUR DREAM！', 'admin', '<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;\">VMALL</span><span style=\"font-family:微软雅黑, sans-serif;\">招聘季隆重开启！梦想需要您与我们一起编织，不再犹豫，众多岗位翘首以待其主！</span>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:16px;font-family:微软雅黑, sans-serif;\">【招聘类型】</span>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;\">【运营类】商品拓展经理、商品运营经理、商城销售拓展经理、仓储物流、大数据分析师、WEB平面设计师、运营/活动项目经理、运营/高级文案策划，无线推广经理、无线运营经理、无线数据分析经理、产品经理、自媒体运营、品牌推广经理、客服中心运营经理</span>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<a target=\"_blank\" href=\"http://www.vmall.com/notice-503\"><b><i><u><span style=\"font-family:宋体;color:#365F91;\">运营类请点击此处</span><span style=\"color:#365F91;\">&gt;&gt;</span></u></i></b></a>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<b><i><u><span style=\"color:#365F91;\"></span></u></i></b>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;\">【研发类】系统分析师、测试工程师、java开发工程师、JS开发工程师、页面重构、Android研发</span>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<a target=\"_blank\" href=\"http://www.vmall.com/notice-502\"><b><i><u><span style=\"font-family:宋体;color:#365F91;\">研发类请点击此处</span><span style=\"color:#365F91;\">&gt;&gt;</span></u></i></b></a>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:16px;font-family:微软雅黑, sans-serif;\">【应聘方式】</span>\r\n</p>\r\n<p style=\"color:#333333;font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF;\">\r\n	<span style=\"font-family:微软雅黑, sans-serif;\">应聘的同学还请下载（附件“<a target=\"_blank\" href=\"http://res.vmall.com/notice-link/employment.rar\"><u><span style=\"color:#0070C0;\">应聘人员职位申请表.doc</span></u></a>”）并完成简历信息，如果能在附件文件标题上“VMALL&nbsp;职位名+招聘类型+姓名+期望工作地点”（如VMALL商品拓展经理+运营类+韩梅梅+深圳）将更加好！请投递简历至招聘邮箱:&nbsp;</span><span style=\"text-decoration:none;color:#0070C0;font-family:微软雅黑, sans-serif;\"><a href=\"mailto:vmallhr@huawei.com\">vmallhr@huawei.com</a></span><span style=\"font-family:微软雅黑, sans-serif;\"></span>\r\n</p>\r\n<div>\r\n	<br />\r\n</div>', '1443063236');

-- ----------------------------
-- Table structure for hd_shop_attr
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_attr`;
CREATE TABLE `hd_shop_attr` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_name` char(30) DEFAULT NULL,
  `attr_type` tinyint(1) DEFAULT NULL COMMENT '属性类型 1为普通属性 2为规格属性',
  `show_type` tinyint(1) DEFAULT NULL COMMENT '显示类型 1为单行文本 2单选框 3复选框 4下拉框',
  `attr_value` varchar(200) DEFAULT NULL COMMENT '属性值',
  `shop_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_attr
-- ----------------------------
INSERT INTO `hd_shop_attr` VALUES ('1', '颜色', '2', '4', '黑色\r\n白色\r\n金色', '1');
INSERT INTO `hd_shop_attr` VALUES ('2', '版本', '2', '4', '移动4G版\r\n联通4G版\r\n电信4G版\r\n全网通', '1');
INSERT INTO `hd_shop_attr` VALUES ('3', '内存', '2', '4', '8GB\r\n16GB\r\n32GB\r\n64GB', '1');
INSERT INTO `hd_shop_attr` VALUES ('4', '产地', '1', '1', '', '1');
INSERT INTO `hd_shop_attr` VALUES ('5', 'UPU', '2', '4', '酷睿i7\r\n酷睿i5\r\n酷睿i3\r\n奔腾\r\n赛扬', '2');
INSERT INTO `hd_shop_attr` VALUES ('6', '屏幕', '2', '4', '15英寸\r\n14英寸\r\n13英寸\r\n12英寸\r\n11英寸\r\n10英寸及以下', '2');
INSERT INTO `hd_shop_attr` VALUES ('7', '显卡', '2', '4', '发烧级显卡\r\n性能级显卡\r\n入门级显卡\r\n双显卡\r\n集成显卡', '2');

-- ----------------------------
-- Table structure for hd_shop_brand
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_brand`;
CREATE TABLE `hd_shop_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` char(30) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `brand_order` tinyint(4) DEFAULT NULL COMMENT '//排序',
  `brand_hot` tinyint(1) DEFAULT NULL,
  `brand_desc` varchar(200) DEFAULT NULL,
  `cate_id` int(11) DEFAULT '0',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_brand
-- ----------------------------
INSERT INTO `hd_shop_brand` VALUES ('1', '华为', 'Upload/71631442210534.jpg', null, null, '', '12');
INSERT INTO `hd_shop_brand` VALUES ('2', '小米', 'Upload/58131442210559.jpg', null, null, '', '12');
INSERT INTO `hd_shop_brand` VALUES ('3', '三星', 'Upload/50601442210589.jpg', null, null, '', '12');
INSERT INTO `hd_shop_brand` VALUES ('4', '苹果', 'Upload/36821442210639.jpg', null, null, '', '12');
INSERT INTO `hd_shop_brand` VALUES ('5', 'Acer宏碁', '', null, null, '', '21');
INSERT INTO `hd_shop_brand` VALUES ('6', 'ThinkPad', '', null, null, '', '21');
INSERT INTO `hd_shop_brand` VALUES ('7', '华硕', '', null, null, '', '21');
INSERT INTO `hd_shop_brand` VALUES ('8', '神舟', '', null, null, '', '21');
INSERT INTO `hd_shop_brand` VALUES ('9', '戴尔', '', null, null, '', '21');
INSERT INTO `hd_shop_brand` VALUES ('10', '惠普', '', null, null, '', '21');
INSERT INTO `hd_shop_brand` VALUES ('11', '三星', '', null, null, '', '21');

-- ----------------------------
-- Table structure for hd_shop_cate
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_cate`;
CREATE TABLE `hd_shop_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` char(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT '0',
  `orderby` tinyint(4) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `price_level` varchar(500) DEFAULT '' COMMENT '价格区间',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_cate
-- ----------------------------
INSERT INTO `hd_shop_cate` VALUES ('1', '手机 /手机配件', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('2', '手机', '1', '1', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('3', '手机配件', '1', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('4', '笔记本 /平板 /品牌整机', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('5', '摄影摄像 /相机配件', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('6', '通讯产品', '1', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('7', '充电器', '3', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('8', '耳机', '3', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('9', '保护套', '3', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('10', '移动电源', '3', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('11', '老人机', '2', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('12', '智能机', '2', '1', null, '', '', '0-299\r\n300-699\r\n700-1099\r\n1100-1999\r\n2000-3299\r\n3300-4099\r\n4100');
INSERT INTO `hd_shop_cate` VALUES ('13', '对讲机', '6', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('14', '手持GPS', '6', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('15', '游戏电玩 /游戏本', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('16', ' DIY硬件 /外设配件', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('17', '智能生活 /数码配件', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('18', ' 办公设备 /车载电器', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('19', '生活家电 /家庭影音 /个护', '0', '0', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('20', '笔记本', '4', '2', null, '', '', '');
INSERT INTO `hd_shop_cate` VALUES ('21', '超极本', '20', '2', null, '', '', '0-2999\r\n3000-3499\r\n3500-3999\r\n4000-4999\r\n5000-5999\r\n6000-7999\r\n8000');

-- ----------------------------
-- Table structure for hd_shop_type
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_type`;
CREATE TABLE `hd_shop_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` char(30) DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_type
-- ----------------------------
INSERT INTO `hd_shop_type` VALUES ('1', '手机');
INSERT INTO `hd_shop_type` VALUES ('2', '电脑');
INSERT INTO `hd_shop_type` VALUES ('3', '女装');

-- ----------------------------
-- Table structure for hd_shop_user
-- ----------------------------
DROP TABLE IF EXISTS `hd_shop_user`;
CREATE TABLE `hd_shop_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `token` varchar(20) DEFAULT NULL,
  `login_in` int(11) DEFAULT NULL,
  `login_ip` varchar(20) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hd_shop_user
-- ----------------------------
INSERT INTO `hd_shop_user` VALUES ('6', 'chenhua', '7fef6171469e80d32c0559f88b377245', '6eb98f03', '1442383566', '127.0.0.1', '1442375397');
INSERT INTO `hd_shop_user` VALUES ('7', '123', '202cb962ac59075b964b07152d234b70', '3a3f8b70', '1443363456', '118.198.235.36', '1443363456');
INSERT INTO `hd_shop_user` VALUES ('8', 'dudu', '202cb962ac59075b964b07152d234b70', '99502b71', '1444125293', '113.47.54.159', '1444125293');
INSERT INTO `hd_shop_user` VALUES ('9', 'dsklfj', '980ac217c6b51e7dc41040bec1edfec8', '60b86cb9', '1444465429', '222.35.111.6', '1444465429');
INSERT INTO `hd_shop_user` VALUES ('10', 'huangjun', 'fe2344efd74b506cd671b1054156b639', '48702b38', '1444706802', '58.50.151.163', '1444706802');
INSERT INTO `hd_shop_user` VALUES ('11', 'cy', '4bcbe7892d76569a894260d16728f62f', '31ff056d', '1451550455', '114.111.166.140', '1451550455');
INSERT INTO `hd_shop_user` VALUES ('12', 'cy', '471c1f3fc1dd7bb8cd0341b03e4be59e', 'fe12558c', '1452225764', '114.111.166.142', '1452225764');
