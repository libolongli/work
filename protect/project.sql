/*
Navicat MySQL Data Transfer

Source Server         : libo
Source Server Version : 50515
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50515
File Encoding         : 65001

Date: 2013-09-02 18:12:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `common_config`
-- ----------------------------
DROP TABLE IF EXISTS `common_config`;
CREATE TABLE `common_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0代表停用,1代表正在使用',
  `status` tinyint(4) DEFAULT '1',
  `type` varchar(255) DEFAULT 'flow',
  `variable` varchar(255) DEFAULT NULL,
  `rids` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_config
-- ----------------------------
INSERT INTO `common_config` VALUES ('1', '付款', 'user/pay', '{content}已经付款', '1', '1', 'flow', 'content', '456');
INSERT INTO `common_config` VALUES ('2', '新闻审核', 'news/add', '{user}新1发送了一篇新闻{title},请审核...', '1', '1', 'flow', 'user,title', '4,5,6');
INSERT INTO `common_config` VALUES ('3', '新闻审核', 'news/add', '{user}新2发送了一篇新闻{title},请审核...', '1', '1', 'flow', 'user,title', '7,8');
INSERT INTO `common_config` VALUES ('5', '测试', 'test/test', '你发的法定是', '0', '1', 'flow', '{}', '5,6,7,8,9,10,11');

-- ----------------------------
-- Table structure for `consult`
-- ----------------------------
DROP TABLE IF EXISTS `consult`;
CREATE TABLE `consult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rpeople` varchar(255) DEFAULT NULL COMMENT '招生人',
  `applydate` int(11) DEFAULT NULL,
  `studynum` int(11) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `englishname` varchar(255) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `comemsg` tinyint(4) DEFAULT NULL COMMENT '考勤短信',
  `status` tinyint(4) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `profession` tinyint(4) DEFAULT NULL COMMENT '职业',
  `introduce` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consult
-- ----------------------------
INSERT INTO `consult` VALUES ('1', '', null, '123', '1', 'ddwd', '1', '123', null, '1', '3', null, '1', null, '12');
INSERT INTO `consult` VALUES ('2', '5', null, '123', '123', 'fadfadsf', '123', '123', null, '2', '1', null, '2', null, '打发打发');
INSERT INTO `consult` VALUES ('3', '5', null, '1', '张三', 'zhangsan', '123', '123', null, '3', '1', null, '1', null, '这是张三');
INSERT INTO `consult` VALUES ('4', '5', null, '123', '李波', 'Nomius', '123456', '123', null, '3', '3', null, '1', null, '这孩子很好');
INSERT INTO `consult` VALUES ('5', '6', null, '123', '李波2', 'Nomius89', '452452425435', '7894545', null, '2', '3', null, '1', null, '很好啊');
INSERT INTO `consult` VALUES ('6', '8', null, '12123243', '发得分', 'fadsfadsf', '1212121212', '123232', null, null, '2', null, '2', null, '发生大幅');
INSERT INTO `consult` VALUES ('7', '8', null, '123', '2323234', 'fadfasdf', '23232', '123', null, null, '2', null, '2', null, '发大水法的说法');
INSERT INTO `consult` VALUES ('8', '8', null, '12345', '李波', 'fasdfad', '123', '123', null, null, '2', null, '2', null, '发噶');
INSERT INTO `consult` VALUES ('9', '7', null, '123', '6565', 'Nomius', '54545', '45656', null, null, '1', null, '1', null, '656565');

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `object` varchar(255) DEFAULT NULL,
  `tech_method` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', 'java', 'IT', '程序开发', '视频授课');
INSERT INTO `course` VALUES ('2', 'c#', 'IT', '程序开发', '视频授课');
INSERT INTO `course` VALUES ('3', '英语', '高中教学', '教学', '面对面');

-- ----------------------------
-- Table structure for `feed`
-- ----------------------------
DROP TABLE IF EXISTS `feed`;
CREATE TABLE `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL DEFAULT '1' COMMENT '1 代表feed,2代表msg,3代表工作流',
  `type` tinyint(4) DEFAULT '1',
  `content` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 未读(默认) 2已读  3代表已 feed但是未读',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feed
-- ----------------------------
INSERT INTO `feed` VALUES ('1', '4', '5', '1', 'hello', '9');
INSERT INTO `feed` VALUES ('2', '4', '6', '1', '新注册用户Nomius2', '3');
INSERT INTO `feed` VALUES ('3', '4', '7', '1', '新注册用户Nomius3', '3');
INSERT INTO `feed` VALUES ('4', '4', '8', '1', '新注册用户nomius4', '3');
INSERT INTO `feed` VALUES ('5', '4', '5', '1', '新注册用户nomius5', '3');
INSERT INTO `feed` VALUES ('6', '4', '6', '1', '新注册用户nomius6', '3');
INSERT INTO `feed` VALUES ('7', '4', '7', '1', '新注册用户Nomius67', '3');
INSERT INTO `feed` VALUES ('8', '4', '8', '1', 'gsdfggsfgsfgsf', '3');
INSERT INTO `feed` VALUES ('9', '4', '5', '1', '232434343', '3');
INSERT INTO `feed` VALUES ('10', '4', '6', '1', '2121212', '3');
INSERT INTO `feed` VALUES ('11', '4', '7', '1', '1232323', '3');
INSERT INTO `feed` VALUES ('12', '4', '8', '1', '23232323', '3');
INSERT INTO `feed` VALUES ('13', '4', '9', '1', '232434343', '3');
INSERT INTO `feed` VALUES ('14', '4', '7', '1', '新注册用户test1', '3');
INSERT INTO `feed` VALUES ('15', '4', '4', '1', 'afadsfadf', '9');
INSERT INTO `feed` VALUES ('16', '4', '11', '1', 'fadfadsfads', '9');
INSERT INTO `feed` VALUES ('17', '4', '4', '1', '412233', '3');
INSERT INTO `feed` VALUES ('18', '4', '11', '1', '789', '9');
INSERT INTO `feed` VALUES ('19', '4', '11', '1', '149', '9');
INSERT INTO `feed` VALUES ('20', '4', '11', '1', 'gaga', '3');
INSERT INTO `feed` VALUES ('21', '4', '11', '1', '12565645454', '3');
INSERT INTO `feed` VALUES ('22', '4', '11', '1', '123', '9');
INSERT INTO `feed` VALUES ('23', '4', '11', '1', '你没', '3');
INSERT INTO `feed` VALUES ('24', '4', '11', '1', '123456', '9');
INSERT INTO `feed` VALUES ('25', '1', '11', '2', '123', '1');
INSERT INTO `feed` VALUES ('26', '1', '4', '2', 'hahhahah', '1');
INSERT INTO `feed` VALUES ('27', '4', '7', '2', '哈哈哈', '3');
INSERT INTO `feed` VALUES ('28', '4', '8', '2', '哈哈哈', '3');
INSERT INTO `feed` VALUES ('29', '4', '9', '2', '哈哈哈', '3');
INSERT INTO `feed` VALUES ('30', '4', '11', '2', '123232323', '3');
INSERT INTO `feed` VALUES ('31', '4', '6', '2', '1234', '3');
INSERT INTO `feed` VALUES ('32', '4', '7', '2', '1234', '3');
INSERT INTO `feed` VALUES ('33', '4', '5', '2', '1', '3');
INSERT INTO `feed` VALUES ('34', '4', '11', '2', '1213232', '3');
INSERT INTO `feed` VALUES ('35', '4', '11', '2', '12323', '3');
INSERT INTO `feed` VALUES ('36', '4', '11', '2', '121212', '3');
INSERT INTO `feed` VALUES ('37', '4', '7', '2', '12121', '3');
INSERT INTO `feed` VALUES ('38', '4', '9', '2', '12121', '3');
INSERT INTO `feed` VALUES ('39', '4', '11', '2', '12121', '3');
INSERT INTO `feed` VALUES ('40', '4', '5', '2', '你好啊', '3');
INSERT INTO `feed` VALUES ('41', '4', '6', '2', '你好啊', '3');
INSERT INTO `feed` VALUES ('42', '4', '7', '2', '你好啊', '3');
INSERT INTO `feed` VALUES ('43', '4', '5', '2', '很好啊', '3');
INSERT INTO `feed` VALUES ('44', '4', '6', '2', '很好啊', '3');
INSERT INTO `feed` VALUES ('45', '4', '7', '2', '很好啊', '3');
INSERT INTO `feed` VALUES ('46', '4', '6', '2', '你好啊', '3');
INSERT INTO `feed` VALUES ('47', '4', '7', '2', '你好啊', '3');
INSERT INTO `feed` VALUES ('48', '4', '8', '2', '你好啊', '3');
INSERT INTO `feed` VALUES ('49', '4', '5', '2', '123454', '3');
INSERT INTO `feed` VALUES ('50', '4', '6', '2', '123454', '3');
INSERT INTO `feed` VALUES ('51', '4', '7', '2', '123454', '3');
INSERT INTO `feed` VALUES ('52', '4', '8', '2', '123454', '3');
INSERT INTO `feed` VALUES ('53', '4', '9', '2', '123454', '3');
INSERT INTO `feed` VALUES ('54', '4', '10', '2', '123454', '3');
INSERT INTO `feed` VALUES ('55', '4', '11', '2', '123454', '3');
INSERT INTO `feed` VALUES ('56', '4', '5', '2', 'heheh', '3');
INSERT INTO `feed` VALUES ('57', '4', '6', '2', 'heheh', '3');
INSERT INTO `feed` VALUES ('58', '4', '7', '2', 'heheh', '3');
INSERT INTO `feed` VALUES ('59', '4', '8', '2', 'heheh', '3');
INSERT INTO `feed` VALUES ('60', '4', '9', '2', 'heheh', '3');
INSERT INTO `feed` VALUES ('61', '4', '10', '2', 'heheh', '3');
INSERT INTO `feed` VALUES ('62', '4', '11', '2', 'heheh', '3');
INSERT INTO `feed` VALUES ('63', '4', '5', '2', 'afasdf', '3');
INSERT INTO `feed` VALUES ('64', '4', '6', '2', 'afasdf', '3');
INSERT INTO `feed` VALUES ('65', '4', '7', '2', 'afasdf', '3');
INSERT INTO `feed` VALUES ('66', '4', '8', '2', 'afasdf', '3');
INSERT INTO `feed` VALUES ('67', '4', '9', '2', 'afasdf', '3');
INSERT INTO `feed` VALUES ('68', '4', '10', '2', 'afasdf', '3');
INSERT INTO `feed` VALUES ('69', '4', '11', '2', 'afasdf', '3');
INSERT INTO `feed` VALUES ('70', '4', '5', '2', '12345545', '3');
INSERT INTO `feed` VALUES ('71', '4', '6', '2', '12345545', '3');
INSERT INTO `feed` VALUES ('72', '4', '7', '2', '12345545', '3');
INSERT INTO `feed` VALUES ('73', '1', '12', '1', '新注册用户Nomius', '1');
INSERT INTO `feed` VALUES ('74', '4', '5', '2', '哈哈哈', '3');
INSERT INTO `feed` VALUES ('75', '4', '6', '2', '哈哈哈', '3');
INSERT INTO `feed` VALUES ('76', '1', '5', '1', '1233', '1');
INSERT INTO `feed` VALUES ('77', '1', '5', '1', '1233', '1');
INSERT INTO `feed` VALUES ('78', '1', '5', '1', '34', '1');

-- ----------------------------
-- Table structure for `flow`
-- ----------------------------
DROP TABLE IF EXISTS `flow`;
CREATE TABLE `flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rids` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `percent` int(3) DEFAULT '0',
  `ts_created` int(11) NOT NULL,
  `ts_updated` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow
-- ----------------------------
INSERT INTO `flow` VALUES ('1', '1', '123,456', '用户李波,已经付款请注意查收!', '90', '1377051468', '1377401983', '1');
INSERT INTO `flow` VALUES ('2', '1', '1,2,3,4', '用户你很好啊,已经付款请注意查收!', '0', '1377051648', '1377051648', '1');
INSERT INTO `flow` VALUES ('3', '1', '123,456', '用户,已经付款请注意查收!', '0', '1377052277', '1377052277', '1');
INSERT INTO `flow` VALUES ('4', '1', 'test', '用户哈哈哈,已经付款请注意查收!', '0', '1377398926', '1377398926', '1');
INSERT INTO `flow` VALUES ('5', '1', '1,2,3,4', '用户你妹的,已经付款请注意查收!', '0', '1377398957', '1377398957', '1');
INSERT INTO `flow` VALUES ('6', '1', '2,3,4', '用户nimeide,已经付款请注意查收!', '0', '1377399061', '1377399061', '1');
INSERT INTO `flow` VALUES ('7', '1', '123', '用户sfsdfds,已经付款请注意查收!', '0', '1377399326', '1377399326', '1');
INSERT INTO `flow` VALUES ('8', '1', '123', '用户sfsdfds,已经付款请注意查收!', '98', '1377399349', '1377411879', '1');
INSERT INTO `flow` VALUES ('9', '1', '123', '用户sfsdfds,已经付款请注意查收!', '100', '1377399356', '1377411887', '1');
INSERT INTO `flow` VALUES ('10', '1', '123', '用户哈哈哈,已经付款请注意查收!', '0', '1377399370', '1377399370', '1');
INSERT INTO `flow` VALUES ('11', '1', '123', '用户121232243434,已经付款请注意查收!', '80', '1377399713', '1377403454', '1');
INSERT INTO `flow` VALUES ('12', '1', 'haha', '用户fadfadsf,已经付款请注意查收!', '90', '1377401256', '1377403426', '1');
INSERT INTO `flow` VALUES ('13', '1', '123,456', '用户dadadad,已经付款请注意查收!', '0', '1377401344', '1377401344', '1');
INSERT INTO `flow` VALUES ('14', '1', '123', '用户hfjahfasd,已经付款请注意查收!', '987', '1377401363', '1377498813', '1');
INSERT INTO `flow` VALUES ('15', '1', '567', '用户15787878,已经付款请注意查收!', '0', '1377417757', '1377417757', '1');
INSERT INTO `flow` VALUES ('16', '1', '4', '用户你妹的,已经付款请注意查收!', '100', '1377418524', '1377499524', '9');
INSERT INTO `flow` VALUES ('17', '1', '4', '用户你好啊,已经付款请注意查收!', '0', '1377418774', '1377499524', '9');
INSERT INTO `flow` VALUES ('18', '1', '4', '用户测试啊,已经付款请注意查收!', '0', '1377418993', '1377502472', '9');
INSERT INTO `flow` VALUES ('19', '1', '4', '用户nihaa ,已经付款请注意查收!', '0', '1377419024', '1377502472', '9');
INSERT INTO `flow` VALUES ('20', '4', '11', '用户henhao,已经付款请注意查收!', '0', '1377419324', '1377419324', '1');
INSERT INTO `flow` VALUES ('21', '4', '11', '用户fadfadfad,已经付款请注意查收!', '0', '1377419402', '1377419402', '1');
INSERT INTO `flow` VALUES ('22', '11', '11', '用户12323232323,已经付款请注意查收!', '0', '1377419480', '1377419480', '1');
INSERT INTO `flow` VALUES ('23', '11', '4', '用户123456,已经付款请注意查收!', '123', '1377419597', '1378112453', '9');
INSERT INTO `flow` VALUES ('24', '4', '11', '用户sdfasdfadsf,已经付款请注意查收!', '0', '1377419627', '1377419627', '1');
INSERT INTO `flow` VALUES ('25', '11', '4', '用户1234,已经付款请注意查收!', '90', '1377419673', '1377767423', '9');
INSERT INTO `flow` VALUES ('26', '11', '1234444', '用户111111,已经付款请注意查收!', '0', '1377419691', '1377419691', '1');
INSERT INTO `flow` VALUES ('27', '4', '11', '用户124444,已经付款请注意查收!', '0', '1377420083', '1377420083', '1');
INSERT INTO `flow` VALUES ('28', '11', '8', '用户11111111,已经付款请注意查收!', '0', '1377422087', '1377422087', '1');
INSERT INTO `flow` VALUES ('29', '11', '8', '用户45555555,已经付款请注意查收!', '0', '1377422111', '1377422111', '1');
INSERT INTO `flow` VALUES ('30', '11', '4', '用户123343434343434,已经付款请注意查收!', '0', '1377422836', '1377582403', '9');
INSERT INTO `flow` VALUES ('31', '4', '11', '用户123455,已经付款请注意查收!', '0', '1377480134', '1377480134', '1');
INSERT INTO `flow` VALUES ('32', '11', '4', '用户12321,已经付款请注意查收!', '89', '1377481427', '1377572725', '9');
INSERT INTO `flow` VALUES ('33', '4', '11', '用户尼达,已经付款请注意查收!', '0', '1377502511', '1377502511', '1');
INSERT INTO `flow` VALUES ('34', '4', '11', '用户这是一个神器,已经付款请注意查收!', '0', '1377503859', '1377503859', '1');
INSERT INTO `flow` VALUES ('35', '4', '11', '用户,已经付款请注意查收!', '0', '1377573559', '1377573559', '1');
INSERT INTO `flow` VALUES ('36', '4', '11', '用户,已经付款请注意查收!', '0', '1377573690', '1377573690', '1');
INSERT INTO `flow` VALUES ('37', '4', '', '用户,已经付款请注意查收!', '0', '1377573874', '1377573874', '1');
INSERT INTO `flow` VALUES ('38', '4', '', '用户789,已经付款请注意查收!', '0', '1377573949', '1377573949', '1');
INSERT INTO `flow` VALUES ('39', '4', '5,6,7,8,9,10,11', '用户344555,已经付款请注意查收!', '0', '1377574017', '1377574017', '1');
INSERT INTO `flow` VALUES ('40', '11', '4,5,6,7,8,9,10', '用户fadfasdfads,已经付款请注意查收!', '0', '1377574175', '1377758355', '9');
INSERT INTO `flow` VALUES ('41', '4', '7', '用户乳房发撒旦发的,已经付款请注意查收!', '0', '1377583421', '1377583421', '1');
INSERT INTO `flow` VALUES ('42', '4', '8', '用户乳房发撒旦发的,已经付款请注意查收!', '0', '1377583421', '1377583421', '1');
INSERT INTO `flow` VALUES ('43', '4', '9', '用户乳房发撒旦发的,已经付款请注意查收!', '0', '1377583421', '1377583421', '1');
INSERT INTO `flow` VALUES ('44', '4', '5', '用户123456,已经付款请注意查收!', '0', '1377833393', '1377833393', '1');
INSERT INTO `flow` VALUES ('45', '4', '6', '用户123456,已经付款请注意查收!', '0', '1377833393', '1377833393', '1');
INSERT INTO `flow` VALUES ('46', '4', '7', '用户123456,已经付款请注意查收!', '0', '1377833393', '1377833393', '1');
INSERT INTO `flow` VALUES ('47', '4', '8', '用户123456,已经付款请注意查收!', '0', '1377833393', '1377833393', '1');
INSERT INTO `flow` VALUES ('48', '4', '9', '用户123456,已经付款请注意查收!', '0', '1377833393', '1377833393', '1');
INSERT INTO `flow` VALUES ('49', '4', '10', '用户123456,已经付款请注意查收!', '0', '1377833393', '1377833393', '1');
INSERT INTO `flow` VALUES ('50', '4', '11', '用户123456,已经付款请注意查收!', '0', '1377833393', '1377833393', '1');
INSERT INTO `flow` VALUES ('51', '4', '7', '用户123456,已经付款请注意查收!', '0', '1377847665', '1377847665', '1');
INSERT INTO `flow` VALUES ('61', '4', '5', '\'用户,已经付款请注意查收!\'', '0', '1378090124', '1378090124', '1');
INSERT INTO `flow` VALUES ('62', '4', '6', '\'用户,已经付款请注意查收!\'', '0', '1378090124', '1378090124', '1');
INSERT INTO `flow` VALUES ('63', '4', '7', '\'用户,已经付款请注意查收!\'', '0', '1378090124', '1378090124', '1');
INSERT INTO `flow` VALUES ('64', '4', '8', '\'用户,已经付款请注意查收!\'', '0', '1378090124', '1378090124', '1');
INSERT INTO `flow` VALUES ('65', '4', '9', '\'用户,已经付款请注意查收!\'', '0', '1378090124', '1378090124', '1');
INSERT INTO `flow` VALUES ('66', '4', '10', '\'用户,已经付款请注意查收!\'', '0', '1378090124', '1378090124', '1');
INSERT INTO `flow` VALUES ('67', '4', '11', '\'用户,已经付款请注意查收!\'', '0', '1378090124', '1378090124', '1');
INSERT INTO `flow` VALUES ('68', '4', '5', '\'用户,已经付款请注意查收!\'', '0', '1378090235', '1378090235', '1');
INSERT INTO `flow` VALUES ('69', '4', '6', '\'用户,已经付款请注意查收!\'', '0', '1378090235', '1378090235', '1');
INSERT INTO `flow` VALUES ('70', '4', '7', '\'用户,已经付款请注意查收!\'', '0', '1378090235', '1378090235', '1');
INSERT INTO `flow` VALUES ('71', '4', '8', '\'用户,已经付款请注意查收!\'', '0', '1378090235', '1378090235', '1');
INSERT INTO `flow` VALUES ('72', '4', '9', '\'用户,已经付款请注意查收!\'', '0', '1378090235', '1378090235', '1');
INSERT INTO `flow` VALUES ('73', '4', '10', '\'用户,已经付款请注意查收!\'', '0', '1378090235', '1378090235', '1');
INSERT INTO `flow` VALUES ('74', '4', '11', '\'用户,已经付款请注意查收!\'', '0', '1378090235', '1378090235', '1');
INSERT INTO `flow` VALUES ('75', '4', '5', '\'用户发的法定,已经付款请注意查收!\'', '0', '1378090476', '1378090476', '1');
INSERT INTO `flow` VALUES ('76', '4', '5', '\'用户你好啊,已经付款请注意查收!\'', '0', '1378090500', '1378090500', '1');
INSERT INTO `flow` VALUES ('77', '4', '6', '\'用户你妹啊,已经付款请注意查收!\'', '0', '1378090637', '1378090637', '1');
INSERT INTO `flow` VALUES ('78', '4', '9', '\'用户123,已经付款请注意查收!\'', '0', '1378090756', '1378090756', '1');
INSERT INTO `flow` VALUES ('79', '4', '5', '\'用户nfsadfasdfad,已经付款请注意查收!\'', '0', '1378092061', '1378092061', '1');
INSERT INTO `flow` VALUES ('80', '4', '6', '\'用户nfsadfasdfad,已经付款请注意查收!\'', '0', '1378092061', '1378092061', '1');
INSERT INTO `flow` VALUES ('81', '4', '7', '\'用户nfsadfasdfad,已经付款请注意查收!\'', '0', '1378092061', '1378092061', '1');
INSERT INTO `flow` VALUES ('82', '4', '8', '\'用户nfsadfasdfad,已经付款请注意查收!\'', '0', '1378092061', '1378092061', '1');
INSERT INTO `flow` VALUES ('83', '4', '9', '\'用户nfsadfasdfad,已经付款请注意查收!\'', '0', '1378092061', '1378092061', '1');
INSERT INTO `flow` VALUES ('84', '4', '10', '\'用户nfsadfasdfad,已经付款请注意查收!\'', '0', '1378092061', '1378092061', '1');
INSERT INTO `flow` VALUES ('85', '4', '11', '\'用户nfsadfasdfad,已经付款请注意查收!\'', '0', '1378092061', '1378092061', '1');
INSERT INTO `flow` VALUES ('86', '4', '5', '\'用户请查看,已经付款请注意查收!\'', '0', '1378092697', '1378092697', '1');
INSERT INTO `flow` VALUES ('87', '4', '5', '\'用户惆怅,已经付款请注意查收!\'', '0', '1378092759', '1378092759', '1');
INSERT INTO `flow` VALUES ('88', '4', '11', '\'123新1发送了一篇新闻{title},请审核...\'', '0', '1378111679', '1378111679', '1');
INSERT INTO `flow` VALUES ('89', '4', '11', '\'123新2发送了一篇新闻{title},请审核...\'', '0', '1378111679', '1378111679', '1');
INSERT INTO `flow` VALUES ('114', '1', '4', '\'Nomius新1发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114021', '1378114021', '1');
INSERT INTO `flow` VALUES ('115', '1', '5', '\'Nomius新1发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114021', '1378114021', '1');
INSERT INTO `flow` VALUES ('116', '1', '6', '\'Nomius新1发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114021', '1378114021', '1');
INSERT INTO `flow` VALUES ('117', '1', '4', '\'Nomius新2发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114021', '1378114021', '1');
INSERT INTO `flow` VALUES ('118', '1', '5', '\'Nomius新2发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114021', '1378114021', '1');
INSERT INTO `flow` VALUES ('119', '1', '6', '\'Nomius新2发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114021', '1378114021', '1');
INSERT INTO `flow` VALUES ('120', '1', '4', '\'Nomius新1发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114101', '1378114101', '1');
INSERT INTO `flow` VALUES ('121', '1', '5', '\'Nomius新1发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114101', '1378114101', '1');
INSERT INTO `flow` VALUES ('122', '1', '6', '\'Nomius新1发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114101', '1378114101', '1');
INSERT INTO `flow` VALUES ('123', '1', '4', '\'Nomius新2发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114102', '1378114102', '1');
INSERT INTO `flow` VALUES ('124', '1', '5', '\'Nomius新2发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114102', '1378114102', '1');
INSERT INTO `flow` VALUES ('125', '1', '6', '\'Nomius新2发送了一篇新闻工作流测试1,请审核...\'', '0', '1378114102', '1378114102', '1');
INSERT INTO `flow` VALUES ('126', '1', '4', 'Nomius新1发送了一篇新闻123,请审核...', '0', '1378114632', '1378114632', '1');
INSERT INTO `flow` VALUES ('127', '1', '5', 'Nomius新1发送了一篇新闻123,请审核...', '0', '1378114632', '1378114632', '1');
INSERT INTO `flow` VALUES ('128', '1', '6', 'Nomius新1发送了一篇新闻123,请审核...', '0', '1378114632', '1378114632', '1');
INSERT INTO `flow` VALUES ('129', '1', '4', 'Nomius新2发送了一篇新闻123,请审核...', '0', '1378114632', '1378114632', '1');
INSERT INTO `flow` VALUES ('130', '1', '5', 'Nomius新2发送了一篇新闻123,请审核...', '0', '1378114632', '1378114632', '1');
INSERT INTO `flow` VALUES ('131', '1', '6', 'Nomius新2发送了一篇新闻123,请审核...', '0', '1378114632', '1378114632', '1');
INSERT INTO `flow` VALUES ('132', '11', '4', '已经付款', '0', '1378115004', '1378115004', '1');
INSERT INTO `flow` VALUES ('133', '11', '5', '已经付款', '0', '1378115004', '1378115004', '1');
INSERT INTO `flow` VALUES ('134', '1', '4', 'Nomius新1发送了一篇新闻test2,请审核...', '0', '1378115043', '1378115043', '1');
INSERT INTO `flow` VALUES ('135', '1', '5', 'Nomius新1发送了一篇新闻test2,请审核...', '0', '1378115043', '1378115043', '1');
INSERT INTO `flow` VALUES ('136', '1', '6', 'Nomius新1发送了一篇新闻test2,请审核...', '0', '1378115043', '1378115043', '1');
INSERT INTO `flow` VALUES ('137', '1', '4', 'Nomius新2发送了一篇新闻test2,请审核...', '0', '1378115043', '1378115043', '1');
INSERT INTO `flow` VALUES ('138', '1', '5', 'Nomius新2发送了一篇新闻test2,请审核...', '0', '1378115043', '1378115043', '1');
INSERT INTO `flow` VALUES ('139', '1', '6', 'Nomius新2发送了一篇新闻test2,请审核...', '0', '1378115043', '1378115043', '1');
INSERT INTO `flow` VALUES ('140', '4', '8', '小王已经付款', '0', '1378115171', '1378115171', '1');
INSERT INTO `flow` VALUES ('141', '4', '9', '小王已经付款', '0', '1378115171', '1378115171', '1');

-- ----------------------------
-- Table structure for `flow_log`
-- ----------------------------
DROP TABLE IF EXISTS `flow_log`;
CREATE TABLE `flow_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `ts_created` int(11) NOT NULL,
  `fleg` tinyint(4) NOT NULL DEFAULT '1',
  `ts_updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_log
-- ----------------------------
INSERT INTO `flow_log` VALUES ('1', '1', '123', '1377051468', '1', '0');
INSERT INTO `flow_log` VALUES ('2', '1', '456', '1377051468', '1', '0');
INSERT INTO `flow_log` VALUES ('3', '1', '1', '1377051648', '1', '0');
INSERT INTO `flow_log` VALUES ('4', '1', '2', '1377051648', '1', '0');
INSERT INTO `flow_log` VALUES ('5', '1', '3', '1377051648', '1', '0');
INSERT INTO `flow_log` VALUES ('6', '1', '4', '1377051648', '1', '0');
INSERT INTO `flow_log` VALUES ('7', '1', '123', '1377052277', '1', '0');
INSERT INTO `flow_log` VALUES ('8', '1', '456', '1377052277', '1', '0');
INSERT INTO `flow_log` VALUES ('9', '1', '1', '1377398957', '1', '0');
INSERT INTO `flow_log` VALUES ('10', '1', '2', '1377398957', '1', '0');
INSERT INTO `flow_log` VALUES ('11', '1', '3', '1377398957', '1', '0');
INSERT INTO `flow_log` VALUES ('12', '1', '4', '1377398957', '1', '0');
INSERT INTO `flow_log` VALUES ('13', '1', '2', '1377399061', '1', '0');
INSERT INTO `flow_log` VALUES ('14', '1', '3', '1377399061', '1', '0');
INSERT INTO `flow_log` VALUES ('15', '1', '4', '1377399061', '1', '0');
INSERT INTO `flow_log` VALUES ('16', '1', '123', '1377399356', '1', '0');
INSERT INTO `flow_log` VALUES ('17', '1', '123', '1377399370', '1', '0');
INSERT INTO `flow_log` VALUES ('18', '1', '123', '1377399713', '1', '0');
INSERT INTO `flow_log` VALUES ('19', '1', '123', '1377401344', '1', '0');
INSERT INTO `flow_log` VALUES ('20', '1', '456', '1377401344', '1', '0');
INSERT INTO `flow_log` VALUES ('21', '1', '123', '1377401363', '1', '0');
INSERT INTO `flow_log` VALUES ('22', '1', '567', '1377417757', '1', '0');
INSERT INTO `flow_log` VALUES ('23', '1', '4', '1377418524', '1', '0');
INSERT INTO `flow_log` VALUES ('24', '1', '4', '1377418774', '1', '0');
INSERT INTO `flow_log` VALUES ('25', '1', '4', '1377418993', '1', '0');
INSERT INTO `flow_log` VALUES ('26', '1', '4', '1377419024', '1', '0');
INSERT INTO `flow_log` VALUES ('27', '4', '11', '1377419324', '1', '0');
INSERT INTO `flow_log` VALUES ('28', '4', '11', '1377419402', '1', '0');
INSERT INTO `flow_log` VALUES ('29', '11', '11', '1377419480', '1', '0');
INSERT INTO `flow_log` VALUES ('30', '11', '4', '1377419597', '1', '0');
INSERT INTO `flow_log` VALUES ('31', '4', '11', '1377419627', '1', '0');
INSERT INTO `flow_log` VALUES ('32', '11', '4', '1377419673', '1', '0');
INSERT INTO `flow_log` VALUES ('33', '11', '1234444', '1377419691', '1', '0');
INSERT INTO `flow_log` VALUES ('34', '4', '11', '1377420083', '1', '0');
INSERT INTO `flow_log` VALUES ('35', '11', '8', '1377422087', '1', '0');
INSERT INTO `flow_log` VALUES ('36', '11', '8', '1377422111', '1', '0');
INSERT INTO `flow_log` VALUES ('37', '11', '4', '1377422836', '1', '0');
INSERT INTO `flow_log` VALUES ('38', '4', '11', '1377480134', '1', '0');
INSERT INTO `flow_log` VALUES ('39', '11', '4', '1377481427', '1', '0');
INSERT INTO `flow_log` VALUES ('40', '4', '11', '1377502511', '1', '0');
INSERT INTO `flow_log` VALUES ('41', '4', '11', '1377503859', '1', '0');
INSERT INTO `flow_log` VALUES ('42', '4', '11', '1377573559', '1', '0');
INSERT INTO `flow_log` VALUES ('43', '4', '11', '1377573690', '1', '0');
INSERT INTO `flow_log` VALUES ('44', '4', '5', '1377574017', '1', '0');
INSERT INTO `flow_log` VALUES ('45', '4', '6', '1377574017', '1', '0');
INSERT INTO `flow_log` VALUES ('46', '4', '7', '1377574017', '1', '0');
INSERT INTO `flow_log` VALUES ('47', '4', '8', '1377574017', '1', '0');
INSERT INTO `flow_log` VALUES ('48', '4', '9', '1377574017', '1', '0');
INSERT INTO `flow_log` VALUES ('49', '4', '10', '1377574017', '1', '0');
INSERT INTO `flow_log` VALUES ('50', '4', '11', '1377574017', '1', '0');
INSERT INTO `flow_log` VALUES ('51', '11', '4', '1377574175', '1', '0');
INSERT INTO `flow_log` VALUES ('52', '11', '5', '1377574175', '1', '0');
INSERT INTO `flow_log` VALUES ('53', '11', '6', '1377574175', '1', '0');
INSERT INTO `flow_log` VALUES ('54', '11', '7', '1377574175', '1', '0');
INSERT INTO `flow_log` VALUES ('55', '11', '8', '1377574175', '1', '0');
INSERT INTO `flow_log` VALUES ('56', '11', '9', '1377574175', '1', '0');
INSERT INTO `flow_log` VALUES ('57', '11', '10', '1377574175', '1', '0');
INSERT INTO `flow_log` VALUES ('58', '4', '5', '1378092759', '1', '1378092759');
INSERT INTO `flow_log` VALUES ('59', '4', '11', '1378111679', '1', '1378111679');
INSERT INTO `flow_log` VALUES ('60', '4', '11', '1378111679', '1', '1378111679');
INSERT INTO `flow_log` VALUES ('61', '1', '4', '1378113515', '1', '1378113515');
INSERT INTO `flow_log` VALUES ('62', '1', '5', '1378113515', '1', '1378113515');
INSERT INTO `flow_log` VALUES ('63', '1', '6', '1378113515', '1', '1378113515');
INSERT INTO `flow_log` VALUES ('64', '1', '4', '1378113515', '1', '1378113515');
INSERT INTO `flow_log` VALUES ('65', '1', '5', '1378113515', '1', '1378113515');
INSERT INTO `flow_log` VALUES ('66', '1', '6', '1378113515', '1', '1378113515');
INSERT INTO `flow_log` VALUES ('67', '1', '4', '1378113670', '1', '1378113670');
INSERT INTO `flow_log` VALUES ('68', '1', '5', '1378113670', '1', '1378113670');
INSERT INTO `flow_log` VALUES ('69', '1', '6', '1378113670', '1', '1378113670');
INSERT INTO `flow_log` VALUES ('70', '1', '4', '1378113670', '1', '1378113670');
INSERT INTO `flow_log` VALUES ('71', '1', '5', '1378113670', '1', '1378113670');
INSERT INTO `flow_log` VALUES ('72', '1', '6', '1378113670', '1', '1378113670');
INSERT INTO `flow_log` VALUES ('73', '1', '4', '1378113792', '1', '1378113792');
INSERT INTO `flow_log` VALUES ('74', '1', '5', '1378113792', '1', '1378113792');
INSERT INTO `flow_log` VALUES ('75', '1', '6', '1378113792', '1', '1378113792');
INSERT INTO `flow_log` VALUES ('76', '1', '4', '1378113792', '1', '1378113792');
INSERT INTO `flow_log` VALUES ('77', '1', '5', '1378113792', '1', '1378113792');
INSERT INTO `flow_log` VALUES ('78', '1', '6', '1378113792', '1', '1378113792');
INSERT INTO `flow_log` VALUES ('79', '1', '4', '1378113851', '1', '1378113851');
INSERT INTO `flow_log` VALUES ('80', '1', '5', '1378113851', '1', '1378113851');
INSERT INTO `flow_log` VALUES ('81', '1', '6', '1378113851', '1', '1378113851');
INSERT INTO `flow_log` VALUES ('82', '1', '4', '1378113851', '1', '1378113851');
INSERT INTO `flow_log` VALUES ('83', '1', '5', '1378113851', '1', '1378113851');
INSERT INTO `flow_log` VALUES ('84', '1', '6', '1378113851', '1', '1378113851');
INSERT INTO `flow_log` VALUES ('85', '1', '4', '1378114021', '1', '1378114021');
INSERT INTO `flow_log` VALUES ('86', '1', '5', '1378114021', '1', '1378114021');
INSERT INTO `flow_log` VALUES ('87', '1', '6', '1378114021', '1', '1378114021');
INSERT INTO `flow_log` VALUES ('88', '1', '4', '1378114021', '1', '1378114021');
INSERT INTO `flow_log` VALUES ('89', '1', '5', '1378114021', '1', '1378114021');
INSERT INTO `flow_log` VALUES ('90', '1', '6', '1378114021', '1', '1378114021');
INSERT INTO `flow_log` VALUES ('91', '1', '4', '1378114101', '1', '1378114101');
INSERT INTO `flow_log` VALUES ('92', '1', '5', '1378114101', '1', '1378114101');
INSERT INTO `flow_log` VALUES ('93', '1', '6', '1378114101', '1', '1378114101');
INSERT INTO `flow_log` VALUES ('94', '1', '4', '1378114102', '1', '1378114102');
INSERT INTO `flow_log` VALUES ('95', '1', '5', '1378114102', '1', '1378114102');
INSERT INTO `flow_log` VALUES ('96', '1', '6', '1378114102', '1', '1378114102');
INSERT INTO `flow_log` VALUES ('97', '1', '4', '1378114632', '1', '1378114632');
INSERT INTO `flow_log` VALUES ('98', '1', '5', '1378114632', '1', '1378114632');
INSERT INTO `flow_log` VALUES ('99', '1', '6', '1378114632', '1', '1378114632');
INSERT INTO `flow_log` VALUES ('100', '1', '4', '1378114632', '1', '1378114632');
INSERT INTO `flow_log` VALUES ('101', '1', '5', '1378114632', '1', '1378114632');
INSERT INTO `flow_log` VALUES ('102', '1', '6', '1378114632', '1', '1378114632');
INSERT INTO `flow_log` VALUES ('103', '11', '4', '1378115004', '1', '1378115004');
INSERT INTO `flow_log` VALUES ('104', '11', '5', '1378115004', '1', '1378115004');
INSERT INTO `flow_log` VALUES ('105', '1', '4', '1378115043', '1', '1378115043');
INSERT INTO `flow_log` VALUES ('106', '1', '5', '1378115043', '1', '1378115043');
INSERT INTO `flow_log` VALUES ('107', '1', '6', '1378115043', '1', '1378115043');
INSERT INTO `flow_log` VALUES ('108', '1', '4', '1378115043', '1', '1378115043');
INSERT INTO `flow_log` VALUES ('109', '1', '5', '1378115043', '1', '1378115043');
INSERT INTO `flow_log` VALUES ('110', '1', '6', '1378115043', '1', '1378115043');
INSERT INTO `flow_log` VALUES ('111', '4', '8', '1378115171', '1', '1378115171');
INSERT INTO `flow_log` VALUES ('112', '4', '9', '1378115171', '1', '1378115171');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `url` varchar(254) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '菜单', '0', 'home.html', null);
INSERT INTO `menu` VALUES ('2', '个人事务', '1', 'c_new.html', 'http://admin.zg10010.net/resources/images/menu/finance.png');
INSERT INTO `menu` VALUES ('3', '下载管理', '2', 'c_new.html', null);
INSERT INTO `menu` VALUES ('4', '费用管理', '1', 'c_from.html', 'http://admin.zg10010.net/resources/images/menu/400.png');
INSERT INTO `menu` VALUES ('5', '通话管理', '1', 'c_new.html', 'http://admin.zg10010.net/resources/images/menu/addfun.png');
INSERT INTO `menu` VALUES ('6', '我的列表', '2', 'grid-tree.html', null);
INSERT INTO `menu` VALUES ('7', '呼叫中心', '1', 'c_new.html', 'http://admin.zg10010.net/resources/images/menu/crm.png');
INSERT INTO `menu` VALUES ('8', '添加学生信息', '2', 'c_from.html', '');
INSERT INTO `menu` VALUES ('9', 'CRM系统', '1', '', 'http://admin.zg10010.net/resources/images/menu/report.png');
INSERT INTO `menu` VALUES ('10', '统计报表', '1', '', 'http://admin.zg10010.net/resources/images/menu/sys.png');
INSERT INTO `menu` VALUES ('11', '系统管理', '1', '', 'http://admin.zg10010.net/resources/images/menu/work.png');
INSERT INTO `menu` VALUES ('12', 'OA办公', '1', '', 'http://admin.zg10010.net/resources/images/menu/callcenter.png');
INSERT INTO `menu` VALUES ('13', '工作流', '12', '?m=flow&a=list', '');
INSERT INTO `menu` VALUES ('14', 'feed', '12', '?m=feed&a=list', '');
INSERT INTO `menu` VALUES ('15', '短信息', '12', '?m=msg&a=list', '');
INSERT INTO `menu` VALUES ('16', '学生信息', '2', 'c_detailed.html', '');
INSERT INTO `menu` VALUES ('17', '添加菜单', '11', '?m=menu&a=add', '');
INSERT INTO `menu` VALUES ('18', '添加feed', '14', 'http://www.baidu.com', '');
INSERT INTO `menu` VALUES ('19', '删除feed', '14', 'www.baidu.com', '');
INSERT INTO `menu` VALUES ('20', '添加feed1', '18', 'www.baidu.com', '');
INSERT INTO `menu` VALUES ('21', '删除feed1', '19', 'no', '');
INSERT INTO `menu` VALUES ('22', '学生在线统计', '10', '', '');
INSERT INTO `menu` VALUES ('23', '121232323', '3', '', '');
INSERT INTO `menu` VALUES ('24', '454545', '2', '', '');
INSERT INTO `menu` VALUES ('25', '工作流管理', '1', null, 'http://admin.zg10010.net/resources/images/menu/finance.png');
INSERT INTO `menu` VALUES ('26', '配置管理', '25', '?m=flow&a=configlist', '');
INSERT INTO `menu` VALUES ('27', '新闻管理', '11', '?m=new&a=list', '');

-- ----------------------------
-- Table structure for `msg`
-- ----------------------------
DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rids` varchar(255) NOT NULL,
  `isgroup` tinyint(4) DEFAULT '0' COMMENT '0代表不是,1代表不是',
  `content` varchar(255) DEFAULT NULL,
  `ts_created` int(11) NOT NULL,
  `ts_updated` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0代表已删除,1代表未读,2代表已读...',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg
-- ----------------------------
INSERT INTO `msg` VALUES ('1', '1', '4', '0', '发的法定', '1377052406', '1377052406', '1');
INSERT INTO `msg` VALUES ('2', '1', '5', '0', '232', '1377161175', '1377161175', '1');
INSERT INTO `msg` VALUES ('3', '1', '6', '0', '2423', '1377164359', '1377164359', '1');
INSERT INTO `msg` VALUES ('4', '1', '123', '0', null, '1377244681', '1377244681', '1');
INSERT INTO `msg` VALUES ('5', '1', '123', '0', null, '1377244735', '1377244735', '1');
INSERT INTO `msg` VALUES ('6', '1', '123', '0', null, '1377244758', '1377244758', '1');
INSERT INTO `msg` VALUES ('7', '1', '123', '0', null, '1377244891', '1377244891', '1');
INSERT INTO `msg` VALUES ('8', '1', 'fasdf', '0', 'fasdfads', '1377245094', '1377245094', '1');
INSERT INTO `msg` VALUES ('9', '1', '12343', '0', '1244545454', '1377245120', '1377245120', '1');
INSERT INTO `msg` VALUES ('10', '1', '123', '0', 'test', '1377245192', '1377245192', '1');
INSERT INTO `msg` VALUES ('11', '1', '11111', '0', '12344', '1377245327', '1377245327', '1');
INSERT INTO `msg` VALUES ('12', '1', '3455', '0', '12344', '1377245367', '1377245367', '1');
INSERT INTO `msg` VALUES ('14', '1', '3456', '0', '15677', '1377250975', '1377250975', '1');
INSERT INTO `msg` VALUES ('15', '1', '434343q', '0', 'afadsfasdfadsf', '1377251571', '1377251571', '1');
INSERT INTO `msg` VALUES ('16', '1', '123', '0', 'sdgfsfgs', '1377400076', '1377400076', '1');
INSERT INTO `msg` VALUES ('17', '1', '1234', '0', 'afadfadsf', '1377400170', '1377400170', '1');
INSERT INTO `msg` VALUES ('18', '1', '12', '0', 'fsdfsdffsd', '1377417653', '1377417653', '1');
INSERT INTO `msg` VALUES ('19', '4', '3', '0', '你好', '1377418238', '1377418238', '1');
INSERT INTO `msg` VALUES ('20', '11', '4', '0', '123456', '1377422519', '1377422519', '1');
INSERT INTO `msg` VALUES ('21', '4', '11', '0', '1123456112', '1377504388', '1377504388', '1');
INSERT INTO `msg` VALUES ('22', '4', '11', '0', 'hahhaha', '1377504423', '1377504423', '1');
INSERT INTO `msg` VALUES ('23', '4', '11', '0', 'test1', '1377504484', '1377504484', '1');
INSERT INTO `msg` VALUES ('24', '11', '4', '0', 'nomius', '1377505088', '1377505088', '1');
INSERT INTO `msg` VALUES ('27', '4', '5,6,7,8,9,10,11', '1', '跟法国', '1377568514', '1377568514', '1');
INSERT INTO `msg` VALUES ('28', '4', '5,6,7,8,9,10,11', '1', '这是一个神器的世界', '1377569259', '1377569259', '1');
INSERT INTO `msg` VALUES ('29', '4', '5,6', '1', '123', '1377569497', '1377569497', '1');
INSERT INTO `msg` VALUES ('30', '4', '5,6,7,8,9,10,11', '1', 'test2', '1377572108', '1377572108', '1');
INSERT INTO `msg` VALUES ('31', '4', '5,6', '1', '1212121212121', '1377572597', '1377572597', '1');
INSERT INTO `msg` VALUES ('32', '4', '11', '1', '123', '1377585381', '1377585381', '1');
INSERT INTO `msg` VALUES ('33', '11', '4', '1', 'hahhahah', '1377585465', '1377585465', '1');
INSERT INTO `msg` VALUES ('34', '4', '7,8,9', '1', '哈哈哈', '1377586440', '1377586440', '1');
INSERT INTO `msg` VALUES ('35', '4', '11', '1', '123232323', '1377586530', '1377586530', '1');
INSERT INTO `msg` VALUES ('36', '4', '6,7', '1', '1234', '1377586594', '1377586594', '1');
INSERT INTO `msg` VALUES ('37', '4', '5', '1', '1', '1377586639', '1377586639', '1');
INSERT INTO `msg` VALUES ('38', '4', '11', '1', '1213232', '1377586728', '1377586728', '1');
INSERT INTO `msg` VALUES ('39', '4', '11', '1', '12323', '1377586758', '1377586758', '1');
INSERT INTO `msg` VALUES ('40', '4', '11', '1', '121212', '1377586794', '1377586794', '1');
INSERT INTO `msg` VALUES ('41', '4', '7', '1', '12121', '1377586879', '1377586879', '1');
INSERT INTO `msg` VALUES ('42', '4', '9,11', '1', '12121', '1377586960', '1377586960', '1');
INSERT INTO `msg` VALUES ('43', '4', '5,6,7', '1', '你好啊', '1377658382', '1377658382', '1');
INSERT INTO `msg` VALUES ('44', '4', '5,6,7', '1', '很好啊', '1377661534', '1377661534', '1');
INSERT INTO `msg` VALUES ('45', '4', '6,7,8', '1', '你好啊', '1377746864', '1377746864', '1');
INSERT INTO `msg` VALUES ('46', '4', '5,6,7,8,9,10,11', '1', '123454', '1377757256', '1377757256', '1');
INSERT INTO `msg` VALUES ('47', '4', '5,6,7,8,9,10,11', '1', 'heheh', '1377761234', '1377761234', '1');
INSERT INTO `msg` VALUES ('48', '4', '5,6,7,8,9,10,11', '1', 'afasdf', '1377761612', '1377761612', '1');
INSERT INTO `msg` VALUES ('49', '4', '5,6,7', '1', '12345545', '1377767468', '1377767468', '1');
INSERT INTO `msg` VALUES ('50', '4', '5,6', '1', '哈哈哈', '1378115418', '1378115418', '1');

-- ----------------------------
-- Table structure for `msg_log`
-- ----------------------------
DROP TABLE IF EXISTS `msg_log`;
CREATE TABLE `msg_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `ts_created` int(11) NOT NULL,
  `fleg` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg_log
-- ----------------------------
INSERT INTO `msg_log` VALUES ('1', '1', '1', '1377052406', '1');
INSERT INTO `msg_log` VALUES ('2', '1', '456', '1377052406', '1');
INSERT INTO `msg_log` VALUES ('3', '1', '12', '1377161175', '1');
INSERT INTO `msg_log` VALUES ('4', '1', '2', '1377164359', '1');
INSERT INTO `msg_log` VALUES ('5', '1', '3', '1377164359', '1');
INSERT INTO `msg_log` VALUES ('6', '1', '4', '1377164359', '1');
INSERT INTO `msg_log` VALUES ('7', '4', '5', '1377569259', '1');
INSERT INTO `msg_log` VALUES ('8', '4', '6', '1377569259', '1');
INSERT INTO `msg_log` VALUES ('9', '4', '7', '1377569259', '1');
INSERT INTO `msg_log` VALUES ('10', '4', '8', '1377569259', '1');
INSERT INTO `msg_log` VALUES ('11', '4', '9', '1377569259', '1');
INSERT INTO `msg_log` VALUES ('12', '4', '10', '1377569259', '1');
INSERT INTO `msg_log` VALUES ('13', '4', '11', '1377569259', '1');
INSERT INTO `msg_log` VALUES ('14', '4', '5', '1377569497', '9');
INSERT INTO `msg_log` VALUES ('15', '4', '6', '1377569497', '9');
INSERT INTO `msg_log` VALUES ('16', '4', '5', '1377572108', '9');
INSERT INTO `msg_log` VALUES ('17', '4', '6', '1377572108', '9');
INSERT INTO `msg_log` VALUES ('18', '4', '7', '1377572108', '9');
INSERT INTO `msg_log` VALUES ('19', '4', '8', '1377572108', '9');
INSERT INTO `msg_log` VALUES ('20', '4', '9', '1377572108', '9');
INSERT INTO `msg_log` VALUES ('21', '4', '10', '1377572108', '9');
INSERT INTO `msg_log` VALUES ('22', '4', '11', '1377572108', '9');
INSERT INTO `msg_log` VALUES ('23', '4', '5', '1377572597', '1');
INSERT INTO `msg_log` VALUES ('24', '4', '6', '1377572597', '1');
INSERT INTO `msg_log` VALUES ('25', '4', '11', '1377585381', '1');
INSERT INTO `msg_log` VALUES ('26', '11', '4', '1377585465', '1');
INSERT INTO `msg_log` VALUES ('27', '4', '7', '1377586440', '1');
INSERT INTO `msg_log` VALUES ('28', '4', '8', '1377586440', '1');
INSERT INTO `msg_log` VALUES ('29', '4', '9', '1377586440', '1');
INSERT INTO `msg_log` VALUES ('30', '4', '11', '1377586530', '1');
INSERT INTO `msg_log` VALUES ('31', '4', '6', '1377586594', '1');
INSERT INTO `msg_log` VALUES ('32', '4', '7', '1377586594', '1');
INSERT INTO `msg_log` VALUES ('33', '4', '5', '1377586639', '1');
INSERT INTO `msg_log` VALUES ('34', '4', '11', '1377586728', '1');
INSERT INTO `msg_log` VALUES ('35', '4', '11', '1377586758', '9');
INSERT INTO `msg_log` VALUES ('36', '4', '11', '1377586794', '9');
INSERT INTO `msg_log` VALUES ('37', '4', '7', '1377586879', '1');
INSERT INTO `msg_log` VALUES ('38', '4', '9', '1377586960', '9');
INSERT INTO `msg_log` VALUES ('39', '4', '11', '1377586960', '9');
INSERT INTO `msg_log` VALUES ('40', '4', '5', '1377658382', '9');
INSERT INTO `msg_log` VALUES ('41', '4', '6', '1377658382', '9');
INSERT INTO `msg_log` VALUES ('42', '4', '7', '1377658382', '9');
INSERT INTO `msg_log` VALUES ('43', '4', '5', '1377661534', '9');
INSERT INTO `msg_log` VALUES ('44', '4', '6', '1377661534', '9');
INSERT INTO `msg_log` VALUES ('45', '4', '7', '1377661534', '9');
INSERT INTO `msg_log` VALUES ('46', '4', '6', '1377746864', '9');
INSERT INTO `msg_log` VALUES ('47', '4', '7', '1377746864', '9');
INSERT INTO `msg_log` VALUES ('48', '4', '8', '1377746864', '9');
INSERT INTO `msg_log` VALUES ('49', '4', '5', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('50', '4', '6', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('51', '4', '7', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('52', '4', '8', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('53', '4', '9', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('54', '4', '10', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('55', '4', '11', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('56', '4', '5', '1377761234', '1');
INSERT INTO `msg_log` VALUES ('57', '4', '6', '1377761234', '1');
INSERT INTO `msg_log` VALUES ('58', '4', '7', '1377761234', '1');
INSERT INTO `msg_log` VALUES ('59', '4', '8', '1377761234', '1');
INSERT INTO `msg_log` VALUES ('60', '4', '9', '1377761234', '1');
INSERT INTO `msg_log` VALUES ('61', '4', '10', '1377761234', '1');
INSERT INTO `msg_log` VALUES ('62', '4', '11', '1377761234', '1');
INSERT INTO `msg_log` VALUES ('63', '4', '5', '1377761612', '1');
INSERT INTO `msg_log` VALUES ('64', '4', '6', '1377761612', '1');
INSERT INTO `msg_log` VALUES ('65', '4', '7', '1377761612', '1');
INSERT INTO `msg_log` VALUES ('66', '4', '8', '1377761612', '1');
INSERT INTO `msg_log` VALUES ('67', '4', '9', '1377761612', '9');
INSERT INTO `msg_log` VALUES ('68', '4', '10', '1377761612', '9');
INSERT INTO `msg_log` VALUES ('69', '4', '11', '1377761612', '9');
INSERT INTO `msg_log` VALUES ('70', '4', '5', '1377767468', '9');
INSERT INTO `msg_log` VALUES ('71', '4', '6', '1377767468', '9');
INSERT INTO `msg_log` VALUES ('72', '4', '7', '1377767468', '9');
INSERT INTO `msg_log` VALUES ('73', '4', '5', '1378115418', '1');
INSERT INTO `msg_log` VALUES ('74', '4', '6', '1378115418', '1');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(254) NOT NULL,
  `ts_created` int(11) NOT NULL,
  `type` int(255) NOT NULL DEFAULT '3' COMMENT '1为news2为upgrade3为其他',
  `status` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '关于中秋开会的通知', '关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知，，关于中秋开会的通知关于中秋开会的通知', '16', '1', '0');
INSERT INTO `news` VALUES ('2', 'd', 'd', '0', '1', '9');
INSERT INTO `news` VALUES ('3', 'dsada', 'dsadsasa', '0', '1', '9');
INSERT INTO `news` VALUES ('4', 'dsada', 'dsadsasa', '0', '1', '9');
INSERT INTO `news` VALUES ('5', 'dsada', 'dsadsasa', '0', '1', '9');
INSERT INTO `news` VALUES ('6', '关于中秋开会的通知', '开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知', '0', '1', '0');
INSERT INTO `news` VALUES ('7', '关于中秋开会的通知', '开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知', '0', '1', '0');
INSERT INTO `news` VALUES ('15', '2012级化学班', '2012级化学班同学全部结业', '0', '2', '9');
INSERT INTO `news` VALUES ('19', '2012级语文班', '恭喜2012级语文班全体同学顺利结业！！', '0', '2', '0');
INSERT INTO `news` VALUES ('20', '2012级语物理提高班', '热烈祝贺2012级语物理提高班全体同学顺利升班', '0', '2', '0');
INSERT INTO `news` VALUES ('21', '祝贺2012级语历史班同学顺利结业', '祝贺2012级语历史班同学顺利结业', '0', '2', '9');
INSERT INTO `news` VALUES ('22', '恭喜2012级语数学提高班顺利升班', '恭喜2012级语数学提高班顺利升班', '0', '2', '9');
INSERT INTO `news` VALUES ('33', '关于开展项目对接的通知', '关于开展项目对接的通知，关于开展项目对接的通知，关于开展项目对接的通知，关于开展项目对接的通知，关于开展项目对接的通知', '0', '1', '9');
INSERT INTO `news` VALUES ('32', '关于周末加班的通知', '关于周末加班的通知关于周末加班的通知关于周末加班的通知关于周末加班的通知', '0', '1', '0');
INSERT INTO `news` VALUES ('34', '恭喜2012级语英语提高班', '恭喜2012级语英语提高班恭喜2012级语英语提高班恭喜2012级语英语提高班', '0', '2', '9');
INSERT INTO `news` VALUES ('60', '紧急通知！！！（关于中秋节值班事宜的通知）', '关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）', '0', '1', '9');
INSERT INTO `news` VALUES ('64', 'dsadsa ', 'd aas dd as dsa das', '0', '1', '9');
INSERT INTO `news` VALUES ('65', 'fdsfdsfdsf', 'f dsf dsf dsf sf s', '0', '1', '9');
INSERT INTO `news` VALUES ('66', '李波', '李波1', '1378110469', '1', '9');
INSERT INTO `news` VALUES ('67', '123', '123', '1378110502', '2', '9');
INSERT INTO `news` VALUES ('68', '工作流测试1', '工作流测试111111', '1378113453', '1', '0');
INSERT INTO `news` VALUES ('69', '工作流测试1', '工作流测试111111', '1378113470', '1', '0');
INSERT INTO `news` VALUES ('70', '工作流测试1', '工作流测试111111', '1378114101', '1', '0');
INSERT INTO `news` VALUES ('71', '123', '12345', '1378114610', '1', '0');
INSERT INTO `news` VALUES ('72', '123', '123456', '1378114632', '1', '0');
INSERT INTO `news` VALUES ('73', 'test2', 'zheshi ceshi 2', '1378115043', '1', '0');

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', 'hahaha1');
INSERT INTO `test` VALUES ('2', 'hahaha2');
INSERT INTO `test` VALUES ('3', 'hahaha');
INSERT INTO `test` VALUES ('4', 'hahaha');
INSERT INTO `test` VALUES ('5', 'hahaha');
INSERT INTO `test` VALUES ('6', 'hahaha');
INSERT INTO `test` VALUES ('7', 'hahaha');
INSERT INTO `test` VALUES ('8', 'hahaha');
INSERT INTO `test` VALUES ('9', 'hahaha');

-- ----------------------------
-- Table structure for `trace_log`
-- ----------------------------
DROP TABLE IF EXISTS `trace_log`;
CREATE TABLE `trace_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `o_id` int(11) NOT NULL,
  `field` varchar(50) NOT NULL,
  `table` varchar(50) NOT NULL,
  `db` varchar(50) NOT NULL,
  `ts_updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trace_log
-- ----------------------------
INSERT INTO `trace_log` VALUES ('1', '97', '14', 'percent', 'flow', 'project', '1377414546');

-- ----------------------------
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titles` varchar(255) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `cate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '公告栏', 'news', '1', '1', 'type');
INSERT INTO `type` VALUES ('2', '最近升班', 'news', '2', '1', 'type');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(254) NOT NULL,
  `pass` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('4', 'Nomius', '111111');
INSERT INTO `user` VALUES ('5', 'qianduan', '111111');
INSERT INTO `user` VALUES ('6', 'admin', '111111');
INSERT INTO `user` VALUES ('7', 'nomius4', '111111');
INSERT INTO `user` VALUES ('8', 'nomius5', '111111');
INSERT INTO `user` VALUES ('9', 'nomius6', '123456');
INSERT INTO `user` VALUES ('10', 'Nomius67', '1234567');
INSERT INTO `user` VALUES ('11', 'test1', '111111');
