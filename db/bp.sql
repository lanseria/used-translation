/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : bp

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-04-10 17:07:10
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
