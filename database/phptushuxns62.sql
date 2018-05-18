/*
Navicat MySQL Data Transfer

Source Server         : 腾讯云
Source Server Version : 50626
Source Host           : 139.199.100.228:3306
Source Database       : phptushuxns62

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-07-03 15:35:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `allusers`
-- ----------------------------
DROP TABLE IF EXISTS `allusers`;
CREATE TABLE `allusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `cx` varchar(50) DEFAULT '普通管理员',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of allusers
-- ----------------------------
INSERT INTO `allusers` VALUES ('2', 'hsg', 'hsg', '系统管理员', '2013-01-10 10:51:02');
INSERT INTO `allusers` VALUES ('3', '12345', 'qwer', '物资管理员', '2017-06-23 11:25:08');
INSERT INTO `allusers` VALUES ('4', '34567', '123', '系统管理员', '2017-06-23 13:06:54');

-- ----------------------------
-- Table structure for `jieyuejilu`
-- ----------------------------
DROP TABLE IF EXISTS `jieyuejilu`;
CREATE TABLE `jieyuejilu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qicainame` varchar(50) NOT NULL,
  `qicaifenlei` varchar(50) NOT NULL,
  `jiename` varchar(50) NOT NULL,
  `stu_number` varchar(50) NOT NULL,
  `jienumber` varchar(50) NOT NULL,
  `isguihuan` varchar(50) NOT NULL DEFAULT 'no',
  `guihuanshijian` datetime DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of jieyuejilu
-- ----------------------------
INSERT INTO `jieyuejilu` VALUES ('8', 'TEST2', '五金工具', 'ssa', '123456', '23', 'yes', '2017-05-28 17:32:34', '2017-05-28 12:47:21');
INSERT INTO `jieyuejilu` VALUES ('9', 'TEST2', '元件类', 'ssa', '123456', '2', 'yes', '2017-06-07 22:59:39', '2017-06-07 22:55:09');
INSERT INTO `jieyuejilu` VALUES ('10', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:47:39', '2017-06-07 23:01:01');
INSERT INTO `jieyuejilu` VALUES ('12', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:47:35', '2017-06-08 09:28:58');
INSERT INTO `jieyuejilu` VALUES ('13', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:47:32', '2017-06-08 09:30:53');
INSERT INTO `jieyuejilu` VALUES ('14', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:47:27', '2017-06-08 09:31:33');
INSERT INTO `jieyuejilu` VALUES ('15', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:47:22', '2017-06-08 11:49:41');
INSERT INTO `jieyuejilu` VALUES ('16', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:47:17', '2017-06-08 11:49:53');
INSERT INTO `jieyuejilu` VALUES ('17', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:47:03', '2017-06-08 11:59:10');
INSERT INTO `jieyuejilu` VALUES ('18', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 12:46:22', '2017-06-08 11:59:52');
INSERT INTO `jieyuejilu` VALUES ('19', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 16:13:08', '2017-06-08 16:04:52');
INSERT INTO `jieyuejilu` VALUES ('20', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-08 16:13:04', '2017-06-08 16:09:43');
INSERT INTO `jieyuejilu` VALUES ('21', 'TEST2', '元件类', 'zhaoyang', '123456', '13', 'yes', '2017-06-08 16:13:01', '2017-06-08 16:12:01');
INSERT INTO `jieyuejilu` VALUES ('22', 'TEST2', '元件类', 'zhaoyang', '123456', '6', 'yes', '2017-06-20 11:34:25', '2017-06-09 10:19:12');
INSERT INTO `jieyuejilu` VALUES ('23', '示波器', '五金工具', 'zhaoyang', '123456', '4', 'yes', '2017-06-20 11:34:18', '2017-06-09 10:27:23');
INSERT INTO `jieyuejilu` VALUES ('24', '示波器', '五金工具', 'zhaoyang', '123456', '8', 'yes', '2017-06-20 11:34:12', '2017-06-09 10:27:57');
INSERT INTO `jieyuejilu` VALUES ('25', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-20 11:34:08', '2017-06-09 12:27:56');
INSERT INTO `jieyuejilu` VALUES ('27', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-20 11:34:03', '2017-06-09 15:01:11');
INSERT INTO `jieyuejilu` VALUES ('28', 'TEST2', '元件类', 'zhaoyang', '123456', '1', 'yes', '2017-06-20 11:33:59', '2017-06-09 15:03:38');
INSERT INTO `jieyuejilu` VALUES ('29', 'TEST2', '元件类', 'ssa', '123456', '1', 'yes', '2017-06-19 15:29:50', '2017-06-09 16:45:24');
INSERT INTO `jieyuejilu` VALUES ('36', '示波器', '五金工具', 'ssa', '123456', '2', 'yes', '2017-06-20 11:22:55', '2017-06-20 11:22:06');
INSERT INTO `jieyuejilu` VALUES ('37', '示波器', '五金工具', 'ssa', '123456', '2', 'yes', '2017-06-20 11:22:51', '2017-06-20 11:22:43');
INSERT INTO `jieyuejilu` VALUES ('39', '示波器', '五金工具', 'ssa', '123456', '2', 'yes', '2017-06-23 11:32:11', '2017-06-23 10:34:30');
INSERT INTO `jieyuejilu` VALUES ('40', '示波器', '五金工具', 'ssa', '123456', '5', 'yes', '2017-06-23 13:08:35', '2017-06-23 11:33:24');
INSERT INTO `jieyuejilu` VALUES ('41', '示波器', '五金工具', 'ssa', '123456', '2', 'no', null, '2017-06-23 13:10:33');
INSERT INTO `jieyuejilu` VALUES ('42', '示波器', '五金工具', 'hhh', '33456', '4', 'no', null, '2017-06-23 13:26:04');
INSERT INTO `jieyuejilu` VALUES ('43', '示波器', '五金工具', 'ssa', '123456', '3', 'no', null, '2017-06-24 23:03:44');

-- ----------------------------
-- Table structure for `shangpinleibie`
-- ----------------------------
DROP TABLE IF EXISTS `shangpinleibie`;
CREATE TABLE `shangpinleibie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leibie` varchar(50) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of shangpinleibie
-- ----------------------------
INSERT INTO `shangpinleibie` VALUES ('17', '元件类', '2017-04-16 15:29:37');
INSERT INTO `shangpinleibie` VALUES ('18', '五金工具', '2017-04-16 15:29:48');
INSERT INTO `shangpinleibie` VALUES ('21', '测试', '2017-06-23 11:31:31');
INSERT INTO `shangpinleibie` VALUES ('22', '测试一下', '2017-06-23 13:07:44');

-- ----------------------------
-- Table structure for `tushuxinxi`
-- ----------------------------
DROP TABLE IF EXISTS `tushuxinxi`;
CREATE TABLE `tushuxinxi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qicainame` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `qicaifenlei` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kucunxinxi` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `qicaiprice` varchar(255) DEFAULT NULL,
  `test2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tushuxinxi
-- ----------------------------
INSERT INTO `tushuxinxi` VALUES ('8', 'TEST2', '元件类', '15', '120', null);
INSERT INTO `tushuxinxi` VALUES ('9', '示波器', '五金工具', '18', '200', null);

-- ----------------------------
-- Table structure for `yonghuzhuce`
-- ----------------------------
DROP TABLE IF EXISTS `yonghuzhuce`;
CREATE TABLE `yonghuzhuce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET gb2312 NOT NULL,
  `password` varchar(50) CHARACTER SET gb2312 NOT NULL,
  `name` varchar(255) CHARACTER SET gb2312 NOT NULL,
  `stu_number` varchar(50) CHARACTER SET gb2312 NOT NULL,
  `sex` varchar(255) CHARACTER SET gb2312 NOT NULL,
  `email` varchar(50) CHARACTER SET gb2312 DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET gb2312 DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yonghuzhuce
-- ----------------------------
INSERT INTO `yonghuzhuce` VALUES ('1', '3134515', '123', 'ssa', '123456', '', '', '', '2017-05-27 01:23:54');
INSERT INTO `yonghuzhuce` VALUES ('2', '3134511', '1234', '远远', '1234', '男', '752167890@qq.com', '18332588025', '2017-06-06 20:50:39');
INSERT INTO `yonghuzhuce` VALUES ('4', '1234', '234', '大大', '232423', '男', '752167890@qq.com', '18332588025', '2017-06-06 21:34:20');
INSERT INTO `yonghuzhuce` VALUES ('5', 'zhaoyang', '123456', 'zhaoyang', '123456', '男', '123456@qq.com', '15467899876', '2017-06-07 11:24:35');
INSERT INTO `yonghuzhuce` VALUES ('6', 'zhaoyang11', '123456', 'zhaoyang', '123456', '男', '123456@qq.com', '15467899876', '2017-06-07 16:23:42');
INSERT INTO `yonghuzhuce` VALUES ('7', 'zhaoyang45', '123456', 'zhaoyang', '123456', '男', '123456@qq.com', '15467899876', '2017-06-07 16:25:49');
INSERT INTO `yonghuzhuce` VALUES ('8', 'zhaoyang543543', '123456', 'zhaoyang', '123456', '男', '123456@qq.com', '15467899876', '2017-06-07 16:27:37');
INSERT INTO `yonghuzhuce` VALUES ('9', 'zhaoyang33', '123456', 'zhaoyang', '123456', '男', '123456@qq.com', '15467899876', '2017-06-07 17:06:51');
INSERT INTO `yonghuzhuce` VALUES ('10', 'zhaoyang234', '123456', 'zhaoyang', '123456', '男', '123456@qq.com', '15467899876', '2017-06-07 17:06:56');
INSERT INTO `yonghuzhuce` VALUES ('11', 'zhaoyang67', '123456', 'zhaoyangwe', '1234568', '女', '123456@qq.com', '15467899876', '2017-06-09 15:04:03');
INSERT INTO `yonghuzhuce` VALUES ('12', 'houboran', '123', '侯博然', '3134515', '男', '752167890@qq.com', '18332588025', '2017-06-20 18:09:24');
INSERT INTO `yonghuzhuce` VALUES ('13', '31345166', '123', 'hhh', '33456', '男', '752167890 @qq.com', '1345566788', '2017-06-23 13:25:44');

-- ----------------------------
-- Table structure for `ziduanshuxing`
-- ----------------------------
DROP TABLE IF EXISTS `ziduanshuxing`;
CREATE TABLE `ziduanshuxing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ziduanid` varchar(255) NOT NULL,
  `ziduanname` varchar(255) NOT NULL,
  `ismoren` varchar(255) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ziduanshuxing
-- ----------------------------
INSERT INTO `ziduanshuxing` VALUES ('1', 'qicainame', '器材名称', 'yes');
INSERT INTO `ziduanshuxing` VALUES ('2', 'qicaifenlei', '器材分类', 'yes');
INSERT INTO `ziduanshuxing` VALUES ('11', 'qicaiprice', '价格', 'no');
INSERT INTO `ziduanshuxing` VALUES ('4', 'kucunxinxi', '库存信息', 'yes');
INSERT INTO `ziduanshuxing` VALUES ('17', 'test2', '测试字段2', 'no');
