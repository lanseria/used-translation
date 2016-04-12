/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : bp

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-04-12 19:36:01
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_cart
-- ----------------------------

-- ----------------------------
-- Table structure for b_goods
-- ----------------------------
DROP TABLE IF EXISTS `b_goods`;
CREATE TABLE `b_goods` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) NOT NULL,
  `gtypeid` int(11) unsigned NOT NULL,
  `gprice` decimal(10,2) NOT NULL,
  `goldprice` decimal(10,2) NOT NULL,
  `guid` int(11) unsigned NOT NULL,
  `gadname` varchar(255) NOT NULL,
  `gadtel` varchar(255) NOT NULL,
  `gimgarray` varchar(255) NOT NULL,
  `gdetail` text NOT NULL,
  `gcreate_time` datetime NOT NULL,
  `gis_selloff` int(11) unsigned NOT NULL DEFAULT '0',
  `gview` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_goods
-- ----------------------------
INSERT INTO `b_goods` VALUES ('1', 'ZZhen女王节新品韩版个性哭脸loser印花宽松短袖T恤半截袖打底衫', '6', '78.00', '85.00', '1', '张超', '188858395625', '2016-04-12/570c49ee63bb6.jpg?2016-04-12/570c49ee6afc9.jpg?2016-04-12/570c49ee6c618.jpg?2016-04-12/570c49ee6de6a.jpg?2016-04-12/570c49ee6f083.jpg', '看起来就很萌的一款短袖T 经典的小圆领，非常的方便穿脱的哦 袖子也是常规的短袖长度，不管是做内搭还是外穿都是没问题的 衣身上卫衣的团就是左侧的难过表情图案哦 看起来真的超萌的 这款衣服的面料也是好的没话说 优质的棉质面料 很亲肤的那种，还很柔软 深蓝、白色、黄色三色可选。', '2016-04-12 09:05:51', '0', '0');

-- ----------------------------
-- Table structure for b_message
-- ----------------------------
DROP TABLE IF EXISTS `b_message`;
CREATE TABLE `b_message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mgid` int(11) NOT NULL,
  `muid` int(11) NOT NULL,
  `mcontent` text,
  `mcreate_time` datetime NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_message
-- ----------------------------

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
  `uavatar` varchar(255) NOT NULL DEFAULT 'avatars/avatar.png',
  `utype` int(255) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_user
-- ----------------------------
INSERT INTO `b_user` VALUES ('1', 'Lanseria', '564265135@qq.com', '837cd2d7fc81976168c62096f71ecebb', 'avatars/user.jpg', '0');

-- ----------------------------
-- View structure for b_vcart
-- ----------------------------
DROP VIEW IF EXISTS `b_vcart`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `b_vcart` AS SELECT
	cid,
	C.uid,
	G.gid,
	guid,
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

-- ----------------------------
-- View structure for b_vmessage
-- ----------------------------
DROP VIEW IF EXISTS `b_vmessage`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `b_vmessage` AS SELECT
	mid,
	mcontent,
	uid,
	uname,
	gid,
	mcreate_time,
	uavatar,
	guid
FROM
	b_message AS M
LEFT JOIN b_user AS U ON ((`M`.`muid` = `U`.`uid`))
LEFT JOIN b_goods AS G ON ((`M`.`mgid` = `G`.`gid`)) ;
