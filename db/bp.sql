/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : bp

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-04-09 00:24:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for b_cart
-- ----------------------------
DROP TABLE IF EXISTS `b_cart`;
CREATE TABLE `b_cart` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `cnum` int(11) unsigned NOT NULL DEFAULT '1',
  `cprice` float NOT NULL,
  `ccreate_time` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_cart
-- ----------------------------
INSERT INTO `b_cart` VALUES ('12', '1', '7', '1', '100', '2016-04-07 23:34:14');
INSERT INTO `b_cart` VALUES ('13', '1', '14', '4', '25.5', '2016-04-08 18:41:47');
INSERT INTO `b_cart` VALUES ('14', '1', '13', '1', '20.5', '2016-04-08 18:43:07');

-- ----------------------------
-- Table structure for b_goods
-- ----------------------------
DROP TABLE IF EXISTS `b_goods`;
CREATE TABLE `b_goods` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) NOT NULL,
  `gtypeid` int(11) NOT NULL,
  `gprice` decimal(10,2) NOT NULL,
  `goldprice` decimal(10,2) NOT NULL,
  `guid` int(11) NOT NULL,
  `gadname` varchar(255) NOT NULL,
  `gadtel` varchar(255) NOT NULL,
  `gimgarray` varchar(255) NOT NULL,
  `gtimgarray` varchar(255) DEFAULT NULL,
  `gdetail` text NOT NULL,
  `gcreate_time` datetime NOT NULL,
  `gis_selloff` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_goods
-- ----------------------------
INSERT INTO `b_goods` VALUES ('1', 'Edifier/漫步者 2.1低音炮电脑木质音箱小音响', '12', '50.00', '120.00', '1', '奶牛同学', '15089341149 ', '1/1.jpg', null, 'Edifier/漫步者 2.1低音炮电脑木质音箱小音响 （同款详见天猫-宁美国度R101V） 购买年份：2012下半年，购于正规门店（品质与外观均完好无损） 票据和箱子都没有保存了 门店价120+，现卖50不刀 和纳伟仕那台是舍友 他毕业先回家了帮忙出掉，性价比真的很高 漫步者的机子随便战10来年杠杠的还可以卖电器铺', '2016-04-05 21:45:01', '0');
INSERT INTO `b_goods` VALUES ('2', '9成新iphone5', '10', '1100.00', '4600.00', '1', '李泽林', '15768656802', '2/1.jpg', null, '颜值超高，品相超好！', '2016-04-06 22:21:00', '0');
INSERT INTO `b_goods` VALUES ('3', '四级词汇', '1', '20.00', '25.00', '1', '盛大', '18564896431', '3/1.jpg', null, '2015大学英语四级词汇完整版_英语考试_外语学习_教育专区。艾俊中学生交流 QQ 群:308167632, 高考学霸每周线上交流| 高考学霸高中学习笔记| 验证码:群', '2016-04-13 22:26:03', '0');
INSERT INTO `b_goods` VALUES ('4', '信号与系统', '2', '20.00', '30.00', '1', '撒旦', '12343456543', '4/1.jpg', null, '信号与线性系统分析，简称信号与系统，是面向电子信息学科的专业基础课，它的基本概念、基本分析方法已经渗透到了信息与通信工程，电路与系统，集成电路工程，生物医学工程', '2016-04-15 22:28:16', '0');
INSERT INTO `b_goods` VALUES ('5', '水浒传', '3', '5.00', '50.00', '1', '第三方', '16567898764', '5/1.jpg', null, '《走遍中国·水浒》系列', '2016-04-20 22:30:30', '0');
INSERT INTO `b_goods` VALUES ('6', '废物三小姐', '4', '22.00', '33.00', '1', '萨达', '12343678765', '6/1.jpg', null, '言情小说古典馆- 小说频道- 红袖添香', '2016-04-20 22:32:05', '0');
INSERT INTO `b_goods` VALUES ('7', '男生冬季搭配', '5', '100.00', '200.00', '1', '愈合', '14565456787', '7/1.jpg', null, '男生冬季搭配图片::欧美图片男生::男生冬季衣服搭配图片', '2016-04-14 22:33:22', '0');
INSERT INTO `b_goods` VALUES ('8', '2014新款韩版夏季女生衣服可爱学院风', '6', '200.00', '300.00', '1', '安定', '12343654567', '8/1.jpg', null, '2014新款韩版夏季女生衣服可爱学院风休闲大码宽松露肩中长款t恤', '2016-04-13 22:35:02', '0');
INSERT INTO `b_goods` VALUES ('9', '女生卡通动物头饰', '6', '10.00', '20.00', '1', '爱囚', '15456787656', '9/1.jpg', null, '布朗熊兔发箍韩国卖萌发饰可爱头饰时尚头箍手工发夹边', '2016-04-20 22:36:24', '0');
INSERT INTO `b_goods` VALUES ('10', '圣诞大胡子', '8', '15.00', '35.00', '1', '奥迪', '12423456764', '10/1.jpg', null, '今年的英国圣诞节，人们对于胡子的装饰尤其狂热，像装饰圣诞树一般装饰他们的胡子成了新的节日时尚趋势。创意代理公司Grey London用各种装饰品装饰胡子拍照，制作成 ...', '2016-04-13 22:37:38', '0');
INSERT INTO `b_goods` VALUES ('12', 'aids', '2', '2000.00', '2000.00', '1', '张超', '188858395625', '2016-04-07/57062f2f9e925.png', null, '12321多个', '2016-04-07 17:58:07', '1');
INSERT INTO `b_goods` VALUES ('13', '话语留声', '1', '20.50', '30.46', '1', '张超', '188858395625', '2016-04-08/5707833acad22.png', null, '國立臺灣圖書館臺灣學研究中心「2014年臺灣學研究書展」以語言類書籍為主題，特別規劃「話語留聲─館藏舊籍語言類書展」，展示臺灣豐富的語言文化資源。', '2016-04-08 18:08:59', '0');
INSERT INTO `b_goods` VALUES ('14', '显规则潜规则', '1', '25.50', '30.00', '1', '张超', '188858395625', '2016-04-08/570783767ba09.jpg', null, '大学生大学里应该读哪些书籍', '2016-04-08 18:09:58', '0');
INSERT INTO `b_goods` VALUES ('15', '概率与统计（理工类）（英文版·原书第六版）', '2', '40.00', '50.00', '1', '张超', '188858395625', '2016-04-08/570783d6e855c.jpg', null, '概率与统计（理工类）（英文版·原书第六版', '2016-04-08 18:11:35', '0');
INSERT INTO `b_goods` VALUES ('16', '高等数学', '2', '20.00', '30.00', '1', '张超', '188858395625', '2016-04-08/570783fe0b367.jpg', null, '刘浩荣编著的《高等数学理工类上普通高等教育数学基础课程十二五规划教材》系统全面的介绍了高等数学相关知识，本书可作为普通高等院校特别是“二本”及“三本”院校或成人 ...', '2016-04-08 18:12:14', '0');
INSERT INTO `b_goods` VALUES ('17', '百万英镑', '3', '100.00', '200.00', '1', '张超', '188858395625', '2016-04-08/5707844587d58.jpg', null, '中文导读英文版) 经典世界文学名著', '2016-04-08 18:13:25', '0');
INSERT INTO `b_goods` VALUES ('18', 'Art——Design', '4', '150.00', '300.00', '1', '张超', '188858395625', '2016-04-08/570784ee88dc7.jpg', null, '绚丽艺术类书籍封面设计', '2016-04-08 18:16:14', '0');
INSERT INTO `b_goods` VALUES ('19', '冬季男士韩版风衣', '5', '150.00', '350.50', '1', '张超', '188858395625', '2016-04-08/5707853f47320.jpg', null, '以棉男装冬季男士韩版风衣潮男纯色中长款外套男生英伦', '2016-04-08 18:17:35', '0');
INSERT INTO `b_goods` VALUES ('20', '1件束发带日本猫耳朵可爱头饰', '7', '5.50', '8.80', '1', '张超', '188858395625', '2016-04-09/5707d64cd63fd.jpg', null, '1件 束发带日本猫耳朵可爱头饰韩国超萌洗漱化妆洗脸卸妆发箍', '2016-04-09 00:03:24', '0');
INSERT INTO `b_goods` VALUES ('21', '笔记本电脑', '9', '400.00', '5000.00', '1', '张超', '188858395625', '2016-04-09/5707d68ecb8ee.jpg', null, '精美的笔记本电脑', '2016-04-09 00:04:30', '0');
INSERT INTO `b_goods` VALUES ('22', '索尼笔记本电脑', '9', '500.00', '1000.00', '1', '张超', '188858395625', '2016-04-09/5707d6b37db8e.jpg', null, '索尼笔记本电脑', '2016-04-09 00:05:07', '0');
INSERT INTO `b_goods` VALUES ('23', '苹果iPhone5S', '10', '2000.00', '3000.00', '1', '张超', '188858395625', '2016-04-09/5707d7015d52e.jpg', null, '在茫茫中大屏手机的“机海”市场中，小屏手机一直以部分用户的喜爱迟迟没有退出智能手机的舞台。从苹果iPhone5s的销量和果粉们对iPhoneSE的期待可以看出，小屏手机依然受到市场的欢迎。苹果公司CEO蒂姆·库克显然不会让安卓等其他系统的智能手机统治小屏市场，小屏iPhone也要分一杯羹。', '2016-04-09 00:06:25', '0');
INSERT INTO `b_goods` VALUES ('24', '数码单反', '11', '5000.00', '6000.00', '1', '张超', '188858395625', '2016-04-09/5707d741364eb.jpg', null, '不仅首次在EOS数码单反相机系列中搭载了相当于约7倍数码增距拍摄效果的短片裁切功能，还可以PAL制式最高约25帧/秒、NTSC制式最高约30帧/秒进行全高清（分辨 ...', '2016-04-09 00:07:29', '0');
INSERT INTO `b_goods` VALUES ('25', '三脚架', '12', '500.00', '800.00', '1', '张超盛大', '188858395625', '2016-04-09/5707d778800f6.jpg', null, '易创国际- 捷宝三脚架碳纤维GT-2804相机支架单反数码', '2016-04-09 00:08:24', '0');
INSERT INTO `b_goods` VALUES ('26', '铜雀台', '13', '50.00', '55.00', '1', '张超', '188858395625', '2016-04-09/5707d7a439aba.jpg', null, '转让电影票3', '2016-04-09 00:09:08', '0');
INSERT INTO `b_goods` VALUES ('27', '寻宝奖品再升级“歌者归来”演唱会门票', '14', '300.00', '400.00', '1', '张超', '188858395625', '2016-04-09/5707d7d42710e.jpg', null, '寻宝奖品再升级“歌者归来”演唱会门票', '2016-04-09 00:09:56', '0');
INSERT INTO `b_goods` VALUES ('28', '烟台春季车展抢票', '15', '0.00', '10.00', '1', '张超', '188858395625', '2016-04-09/5707d80272521.jpg', null, '烟台车友圈为了答谢新老粉丝的厚爱，特准备了门票若干张，免费送哦！还在等什么，赶快来参与吧！动动手指头，门票就到手啦，就是这么简单。', '2016-04-09 00:10:42', '0');
INSERT INTO `b_goods` VALUES ('29', '钢琴', '17', '10000.00', '15000.00', '1', '张超', '188858395625', '2016-04-09/5707d838bdfa9.jpg', null, '平台鋼琴是鋼琴最原始的形態，現在一般都用於音樂會的演奏，打擊槌是上下運動靠地新引力就能回覆到打擊槌應有的位子，是一件笨重的龐然大物。為瞭解決佔地的問題，立式 .', '2016-04-09 00:11:36', '0');

-- ----------------------------
-- Table structure for b_type
-- ----------------------------
DROP TABLE IF EXISTS `b_type`;
CREATE TABLE `b_type` (
  `tid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tname` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_type
-- ----------------------------
INSERT INTO `b_type` VALUES ('1', '语言类');
INSERT INTO `b_type` VALUES ('2', '理工科类');
INSERT INTO `b_type` VALUES ('3', '文学类');
INSERT INTO `b_type` VALUES ('4', '艺术类');
INSERT INTO `b_type` VALUES ('5', '男生');
INSERT INTO `b_type` VALUES ('6', '女生');
INSERT INTO `b_type` VALUES ('7', '宝宝');
INSERT INTO `b_type` VALUES ('8', '大叔');
INSERT INTO `b_type` VALUES ('9', '笔记本');
INSERT INTO `b_type` VALUES ('10', '通讯类');
INSERT INTO `b_type` VALUES ('11', '摄影');
INSERT INTO `b_type` VALUES ('12', '配件');
INSERT INTO `b_type` VALUES ('13', '电影票');
INSERT INTO `b_type` VALUES ('14', '演唱会门票');
INSERT INTO `b_type` VALUES ('15', '免费票');
INSERT INTO `b_type` VALUES ('16', '其他票');
INSERT INTO `b_type` VALUES ('17', 'Other');

-- ----------------------------
-- Table structure for b_user
-- ----------------------------
DROP TABLE IF EXISTS `b_user`;
CREATE TABLE `b_user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `upwd` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_user
-- ----------------------------
INSERT INTO `b_user` VALUES ('1', 'zc', '564265135@qq.com', 'c6f057b86584942e415435ffb1fa93d4');

-- ----------------------------
-- View structure for b_vcart
-- ----------------------------
DROP VIEW IF EXISTS `b_vcart`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `b_vcart` AS SELECT
	cid,
	C.uid,
	G.gid,
	cnum,
	ccreate_time,
	gname,
	uname,
	gprice,
	gimgarray,
	gdetail,
	gadname
FROM
	b_cart AS C
LEFT JOIN b_goods AS G ON ((`C`.`gid` = `G`.`gid`))
LEFT JOIN b_user AS U ON ((`C`.`uid` = `U`.`uid`)) ;
