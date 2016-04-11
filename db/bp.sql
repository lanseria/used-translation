/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : bp

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-04-11 20:35:58
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
  `gtimgarray` varchar(255) DEFAULT NULL,
  `gdetail` text NOT NULL,
  `gcreate_time` datetime NOT NULL,
  `gis_selloff` int(11) unsigned NOT NULL DEFAULT '0',
  `gview` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_goods
-- ----------------------------

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
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_user
-- ----------------------------

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
