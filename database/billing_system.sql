/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : billing_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-26 17:05:44
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `expend`
-- ----------------------------
DROP TABLE IF EXISTS `expend`;
CREATE TABLE `expend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `expend` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '支出',
  `sort` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '分类',
  `account` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '账户',
  `PS` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注',
  `date` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '支出时间',
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of expend
-- ----------------------------

-- ----------------------------
-- Table structure for `income`
-- ----------------------------
DROP TABLE IF EXISTS `income`;
CREATE TABLE `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `income` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '收入',
  `sort` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '分类',
  `account` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '账户',
  `PS` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注',
  `date` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '收入时间',
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of income
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `telephone` char(11) CHARACTER SET utf8 NOT NULL,
  `today_expend` varchar(30) CHARACTER SET utf8 NOT NULL,
  `today_income` varchar(30) CHARACTER SET utf8 NOT NULL,
  `week_expend` varchar(30) CHARACTER SET utf8 NOT NULL,
  `week_income` varchar(30) CHARACTER SET utf8 NOT NULL,
  `month_expend` varchar(30) CHARACTER SET utf8 NOT NULL,
  `month_income` varchar(30) CHARACTER SET utf8 NOT NULL,
  `year_expend` varchar(30) CHARACTER SET utf8 NOT NULL,
  `year_income` varchar(30) CHARACTER SET utf8 NOT NULL,
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
