/*
Navicat MySQL Data Transfer

Source Server         : libo
Source Server Version : 50515
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50515
File Encoding         : 65001

Date: 2013-09-17 21:47:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `classroom`
-- ----------------------------
DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classroom
-- ----------------------------
INSERT INTO `classroom` VALUES ('1', '教室3');
INSERT INTO `classroom` VALUES ('2', '教室2');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_config
-- ----------------------------
INSERT INTO `common_config` VALUES ('1', '付款', 'user/pay', '{content}已经付款', '1', '1', 'flow', 'content', '9');
INSERT INTO `common_config` VALUES ('2', '新闻审核', 'news/add', '{user}新发送了一篇新闻{title},请审核...', '1', '1', 'flow', 'user,title', '4,5,6');
INSERT INTO `common_config` VALUES ('3', '请假环节', 'user/leave', null, '1', '1', 'flow', null, null);
INSERT INTO `common_config` VALUES ('5', '测试', 'test/test', '你发的法定是', '0', '1', 'flow', '{}', '5,6,7,8,9,10,11');
INSERT INTO `common_config` VALUES ('6', 'test1', 'test/test', '{test},{test1}', '1', '1', 'flow', 'test,test1', '5,6,7,8,9,10,11');

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
  `long` int(11) DEFAULT NULL,
  `times` int(11) DEFAULT NULL,
  `t_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('2', 'C++2', '4300', '30', '11', '1');
INSERT INTO `course` VALUES ('3', 'JAVA课程', '3600', '10', '9', '1');
INSERT INTO `course` VALUES ('4', 'C#课程', '7200', '15', '10', '1');
INSERT INTO `course` VALUES ('5', 'PHP课程', '2400', '18', '11', '1');
INSERT INTO `course` VALUES ('6', 'Ruby', '1800', '12', '8', '1');
INSERT INTO `course` VALUES ('7', 'C语言', '3600', '10', '5', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feed
-- ----------------------------
INSERT INTO `feed` VALUES ('1', '4', '5', '1', 'hello', '9');
INSERT INTO `feed` VALUES ('2', '4', '6', '1', '新注册用户Nomius2', '9');
INSERT INTO `feed` VALUES ('3', '4', '7', '1', '新注册用户Nomius3', '9');
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
INSERT INTO `feed` VALUES ('79', '4', '5', '2', '121212', '3');
INSERT INTO `feed` VALUES ('80', '4', '6', '2', 'pp', '9');
INSERT INTO `feed` VALUES ('81', '6', '4', '2', '你好啊', '3');
INSERT INTO `feed` VALUES ('82', '4', '5', '2', '123', '3');
INSERT INTO `feed` VALUES ('83', '4', '5', '2', '123', '3');
INSERT INTO `feed` VALUES ('84', '1', '5', '1', '1234566', '1');
INSERT INTO `feed` VALUES ('85', '4', '5', '2', '09131626', '3');
INSERT INTO `feed` VALUES ('86', '4', '6', '2', '09131626', '3');
INSERT INTO `feed` VALUES ('87', '4', '7', '2', '09131626', '3');
INSERT INTO `feed` VALUES ('88', '4', '8', '2', '09131626', '3');
INSERT INTO `feed` VALUES ('89', '4', '9', '2', '09131626', '3');
INSERT INTO `feed` VALUES ('90', '4', '10', '2', '09131626', '3');
INSERT INTO `feed` VALUES ('91', '4', '11', '2', '09131626', '3');
INSERT INTO `feed` VALUES ('92', '1', '5', '1', '发发达地方', '1');
INSERT INTO `feed` VALUES ('93', '1', '5', '1', '1234565', '1');
INSERT INTO `feed` VALUES ('94', '1', '6', '1', '1234565', '1');
INSERT INTO `feed` VALUES ('95', '1', '7', '1', '1234565', '1');
INSERT INTO `feed` VALUES ('96', '1', '8', '1', '1234565', '1');
INSERT INTO `feed` VALUES ('97', '1', '9', '1', '1234565', '1');
INSERT INTO `feed` VALUES ('98', '1', '10', '1', '1234565', '1');
INSERT INTO `feed` VALUES ('99', '1', '11', '1', '1234565', '1');
INSERT INTO `feed` VALUES ('100', '4', '6', '1', 'sds', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow
-- ----------------------------
INSERT INTO `flow` VALUES ('1', '4', '11', 'Nomius新发送了一篇新闻test1,请审核...', '90', '1378449286', '1378449286', '1');
INSERT INTO `flow` VALUES ('2', '4', '11', 'Nomius新发送了一篇新闻1243343,请审核...', '0', '1379066560', '1379066560', '1');
INSERT INTO `flow` VALUES ('3', '4', '11', 'Nomius新发送了一篇新闻dafadsf,请审核...', '0', '1379066619', '1379066619', '1');
INSERT INTO `flow` VALUES ('4', '4', '5', 'Nomius新发送了一篇新闻dafadf,请审核...', '0', '1379066651', '1379066651', '1');

-- ----------------------------
-- Table structure for `flow_log`
-- ----------------------------
DROP TABLE IF EXISTS `flow_log`;
CREATE TABLE `flow_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `fid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `fleg` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1代表没有处理,2代表已经处理',
  `ts_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_log
-- ----------------------------
INSERT INTO `flow_log` VALUES ('1', 'Nomius新发送了一篇新闻test1,请审核...', '1', '4', '11', '1', '1378449286');
INSERT INTO `flow_log` VALUES ('2', 'Nomius新发送了一篇新闻1243343,请审核...', '2', '4', '11', '1', '1379066560');
INSERT INTO `flow_log` VALUES ('3', 'Nomius新发送了一篇新闻dafadsf,请审核...', '3', '4', '11', '1', '1379066619');
INSERT INTO `flow_log` VALUES ('4', 'Nomius新发送了一篇新闻dafadf,请审核...', '4', '4', '5', '1', '1379066651');

-- ----------------------------
-- Table structure for `grade`
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO `grade` VALUES ('1', '大一2班');
INSERT INTO `grade` VALUES ('4', '大班三班');

-- ----------------------------
-- Table structure for `graph`
-- ----------------------------
DROP TABLE IF EXISTS `graph`;
CREATE TABLE `graph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `mtable` varchar(255) DEFAULT NULL COMMENT '主表',
  `ltable` text COMMENT '关联表',
  `gtype` varchar(255) DEFAULT NULL COMMENT '图表类型',
  `field` varchar(255) DEFAULT NULL COMMENT '查看的字段',
  `samm` varchar(255) DEFAULT NULL COMMENT 'avg,sum,max,min',
  `where` varchar(255) DEFAULT NULL COMMENT '其它条件',
  `group` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of graph
-- ----------------------------
INSERT INTO `graph` VALUES ('3', '报表1', '2', '这是一个很好的表啊', 'kc_course_pack', 'a:2:{s:22:\"kc_course_pack_element\";a:4:{s:2:\"on\";s:14:\"element_packId\";s:7:\"ontable\";s:14:\"kc_course_pack\";s:4:\"join\";s:10:\"inner join\";s:3:\"on1\";s:7:\"pack_id\";}s:9:\"kc_course\";a:4:{s:2:\"on\";s:9:\"course_id\";s:7:\"ontable\";s:22:\"kc_course_pack_element\";s:4:\"join\";s:10:\"inner join\";s:3:\"on1\";s:16:\"element_courseId\";}}', '1', null, 'a:2:{s:10:\"pack_price\";s:15:\"avg,sum,max,min\";s:14:\"pack_courseNum\";s:7:\"avg,sum\";}', 'pack_type=1', 'pack_type');

-- ----------------------------
-- Table structure for `holiday`
-- ----------------------------
DROP TABLE IF EXISTS `holiday`;
CREATE TABLE `holiday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ts_start` int(11) DEFAULT NULL,
  `ts_end` int(11) DEFAULT NULL,
  `isplay` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of holiday
-- ----------------------------
INSERT INTO `holiday` VALUES ('5', '中秋节', '1379520000', '1379692800', '1');
INSERT INTO `holiday` VALUES ('6', '国庆节', '1380556800', '1381075200', '1');
INSERT INTO `holiday` VALUES ('10', '周末上班', '1379779200', '1379779200', '0');
INSERT INTO `holiday` VALUES ('11', '周末上班2', '1380297600', '1380384000', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

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
INSERT INTO `menu` VALUES ('13', '工作流', '12', '?m=flow&a=tree', '');
INSERT INTO `menu` VALUES ('14', 'feed', '12', '?m=feed&a=list', '');
INSERT INTO `menu` VALUES ('15', '短信息', '12', '?m=msg&a=tree', '');
INSERT INTO `menu` VALUES ('16', '学生信息', '2', 'c_detailed.html', '');
INSERT INTO `menu` VALUES ('17', '添加菜单', '11', '?m=menu&a=add', '');
INSERT INTO `menu` VALUES ('18', '添加feed', '14', '?m=feed&a=send', '');
INSERT INTO `menu` VALUES ('22', 'feed列表', '14', '?m=feed&a=list', '');
INSERT INTO `menu` VALUES ('25', '工作流管理', '1', null, 'http://admin.zg10010.net/resources/images/menu/finance.png');
INSERT INTO `menu` VALUES ('26', '配置管理', '25', '?m=flow&a=configlist', '');
INSERT INTO `menu` VALUES ('27', '新闻管理', '11', '?m=new&a=list', '');
INSERT INTO `menu` VALUES ('28', '收件箱', '15', '?m=msg&a=list&model=res', '');
INSERT INTO `menu` VALUES ('29', '发件箱', '15', '?m=msg&a=list&model=send', '');
INSERT INTO `menu` VALUES ('30', '未读短信', '15', '?m=msg&a=list&model=unread', '');
INSERT INTO `menu` VALUES ('31', '我发送的', '13', '?m=flow&a=list&model=send', '');
INSERT INTO `menu` VALUES ('32', '我处理的', '13', '?m=flow&a=list&model=deal', '');
INSERT INTO `menu` VALUES ('33', '待处理的', '13', '?m=flow&a=list&model=undeal', '');
INSERT INTO `menu` VALUES ('34', 'test', '2', '', '');
INSERT INTO `menu` VALUES ('35', 'test1', '9', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg
-- ----------------------------
INSERT INTO `msg` VALUES ('1', '1', '4', '0', '发的法定', '1377052406', '1377052406', '1');
INSERT INTO `msg` VALUES ('2', '1', '5', '0', '2324', '1378915200', '1377161175', '1');
INSERT INTO `msg` VALUES ('3', '1', '6', '0', '2423', '1377164359', '1377164359', '1');
INSERT INTO `msg` VALUES ('4', '1', '123', '0', null, '1377244681', '1377244681', '1');
INSERT INTO `msg` VALUES ('5', '1', '123', '0', null, '1377244735', '1377244735', '1');
INSERT INTO `msg` VALUES ('6', '1', '123', '0', '居然没内容 不科学啊', '1377244758', '1377244758', '1');
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
INSERT INTO `msg` VALUES ('51', '4', '5', '1', '123', '1378264019', '1378264019', '1');
INSERT INTO `msg` VALUES ('52', '4', '5', '1', '121212', '1378264075', '1378264075', '1');
INSERT INTO `msg` VALUES ('53', '4', '5', '1', '121212', '1378264141', '1378264141', '1');
INSERT INTO `msg` VALUES ('54', '4', '5', '1', '121212', '1378264180', '1378264180', '1');
INSERT INTO `msg` VALUES ('55', '4', '6', '1', 'pp', '1378452848', '1378452848', '1');
INSERT INTO `msg` VALUES ('56', '6', '4', '1', '你好啊', '1378454752', '1378454752', '1');
INSERT INTO `msg` VALUES ('57', '4', '5', '1', '123', '1378457978', '1378457978', '1');
INSERT INTO `msg` VALUES ('58', '4', '5', '1', null, '1378868461', '1378868461', '1');
INSERT INTO `msg` VALUES ('59', '4', '5', '1', '123', '1378868492', '1378868492', '1');
INSERT INTO `msg` VALUES ('60', '4', '5,6,7,8,9,10,11', '1', '09131626', '1379060772', '1379060772', '1');
INSERT INTO `msg` VALUES ('61', '4', '5,6,7,8,9,10,11', '1', '09131626', '1379061016', '1379061016', '1');
INSERT INTO `msg` VALUES ('62', '4', '6', '1', 'sds', '1379066212', '1379066212', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg_log
-- ----------------------------
INSERT INTO `msg_log` VALUES ('1', '1', '1', '1377052406', '1');
INSERT INTO `msg_log` VALUES ('2', '1', '456', '1377052406', '1');
INSERT INTO `msg_log` VALUES ('3', '1', '12', '1377161175', '1');
INSERT INTO `msg_log` VALUES ('4', '1', '2', '1377164359', '1');
INSERT INTO `msg_log` VALUES ('5', '1', '3', '1377164359', '1');
INSERT INTO `msg_log` VALUES ('6', '1', '4', '1377164359', '2');
INSERT INTO `msg_log` VALUES ('7', '4', '5', '1377569259', '2');
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
INSERT INTO `msg_log` VALUES ('26', '11', '4', '1377585465', '9');
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
INSERT INTO `msg_log` VALUES ('49', '4', '5', '1377757256', '2');
INSERT INTO `msg_log` VALUES ('50', '4', '6', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('51', '4', '7', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('52', '4', '8', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('53', '4', '9', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('54', '4', '10', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('55', '4', '11', '1377757256', '1');
INSERT INTO `msg_log` VALUES ('56', '4', '5', '1377761234', '2');
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
INSERT INTO `msg_log` VALUES ('73', '4', '5', '1378115418', '2');
INSERT INTO `msg_log` VALUES ('74', '4', '6', '1378115418', '1');
INSERT INTO `msg_log` VALUES ('75', '4', '5', '1378264019', '1');
INSERT INTO `msg_log` VALUES ('76', '4', '5', '1378264075', '1');
INSERT INTO `msg_log` VALUES ('77', '4', '5', '1378264141', '9');
INSERT INTO `msg_log` VALUES ('78', '4', '5', '1378264180', '1');
INSERT INTO `msg_log` VALUES ('79', '4', '6', '1378452848', '1');
INSERT INTO `msg_log` VALUES ('80', '6', '4', '1378454752', '2');
INSERT INTO `msg_log` VALUES ('81', '4', '5', '1378457978', '2');
INSERT INTO `msg_log` VALUES ('82', '4', '5', '1378868461', '1');
INSERT INTO `msg_log` VALUES ('83', '4', '5', '1378868492', '1');
INSERT INTO `msg_log` VALUES ('84', '4', '5', '1379060772', '1');
INSERT INTO `msg_log` VALUES ('85', '4', '5', '1379061016', '1');
INSERT INTO `msg_log` VALUES ('86', '4', '6', '1379061016', '1');
INSERT INTO `msg_log` VALUES ('87', '4', '7', '1379061016', '1');
INSERT INTO `msg_log` VALUES ('88', '4', '8', '1379061016', '1');
INSERT INTO `msg_log` VALUES ('89', '4', '9', '1379061016', '1');
INSERT INTO `msg_log` VALUES ('90', '4', '10', '1379061016', '1');
INSERT INTO `msg_log` VALUES ('91', '4', '11', '1379061016', '1');
INSERT INTO `msg_log` VALUES ('92', '4', '6', '1379066212', '1');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL DEFAULT '系统管理员' COMMENT '1系统管理员',
  `title` varchar(255) NOT NULL,
  `content` varchar(254) NOT NULL,
  `ts_created` int(11) NOT NULL,
  `type` int(255) NOT NULL DEFAULT '3' COMMENT '1为news2为upgrade3为其他',
  `status` int(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `top` int(11) NOT NULL DEFAULT '1' COMMENT '1为置顶',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '', '关于中秋开会的通知', '关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知关于中秋开会的通知，，关于中秋开会的通知关于中秋开会的通知', '0', '1', '0', '3', '0');
INSERT INTO `news` VALUES ('67', '', '2012级语物理提高班', '2012级语物理提高班2012级语物理提高班', '0', '1', '0', '3', '1');
INSERT INTO `news` VALUES ('6', '', '关于中秋开会的通知', '开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知', '0', '1', '0', '3', '0');
INSERT INTO `news` VALUES ('7', '', '关于中秋开会的通知', '开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知开会的通知', '0', '1', '0', '3', '0');
INSERT INTO `news` VALUES ('15', '', '2012级化学班', '2012级化学班同学全部结业', '0', '2', '9', '3', '0');
INSERT INTO `news` VALUES ('19', '', '2012级语文班', '恭喜2012级语文班全体同学顺利结业！！', '0', '2', '0', '3', '0');
INSERT INTO `news` VALUES ('20', '', '2012级语物理提高班', '热烈祝贺2012级语物理提高班全体同学顺利升班', '0', '2', '0', '3', '0');
INSERT INTO `news` VALUES ('21', '', '祝贺2012级语历史班同学顺利结业', '祝贺2012级语历史班同学顺利结业', '0', '2', '0', '3', '0');
INSERT INTO `news` VALUES ('22', '', '恭喜2012级语数学提高班顺利升班', '恭喜2012级语数学提高班顺利升班', '0', '2', '9', '1', '0');
INSERT INTO `news` VALUES ('33', '', '关于开展项目对接的通知', '关于开展项目对接的通知，关于开展项目对接的通知，关于开展项目对接的通知，关于开展项目对接的通知，关于开展项目对接的通知', '0', '1', '0', '3', '0');
INSERT INTO `news` VALUES ('32', '', '关于周末加班的通知', '关于周末加班的通知关于周末加班的通知关于周末加班的通知关于周末加班的通知', '0', '1', '0', '3', '0');
INSERT INTO `news` VALUES ('34', '', '恭喜2012级语英语提高班', '恭喜2012级语英语提高班恭喜2012级语英语提高班恭喜2012级语英语提高班', '0', '2', '9', '3', '0');
INSERT INTO `news` VALUES ('60', '', '紧急通知！！！（关于中秋节值班事宜的通知）', '关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）关于中秋节值班事宜的通知）', '0', '1', '9', '3', '0');
INSERT INTO `news` VALUES ('73', '', '2012级语物理提高班', '2012级语物理提高班2012级语物理提高班', '0', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('74', '', '你好', '整的 阿达', '0', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('75', '', 'NIHAO ', 'NIHAO 11', '0', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('71', '', '的萨达萨达', '2012级语物理提高班2012级语物理提高班2012级语物理提高班', '0', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('72', '', '你好', '你镇海', '0', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('70', '', '2012级语物理提高班', '2012级语物理提高班2012级语物理提高班2012级语物理提高班', '0', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('76', '', 'dsadsadsa sa dsa', 'DSADSADADSA', '2013', '2', '9', '1', '0');
INSERT INTO `news` VALUES ('77', '', 'FDSFS F DS', 'FDS FDS S ', '2013', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('78', '', 'dsadsadsa sa dsa', 'dsadsad', '1378112820', '1', '9', '1', '0');
INSERT INTO `news` VALUES ('79', '', '恭喜2012级语物理提高班', '恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班恭喜2012级语物理提高班,.', '1378171402', '2', '0', '3', '0');
INSERT INTO `news` VALUES ('80', '系统管理员', '恭喜2012级语英语提高班顺利升班', '恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班恭喜2012级语英语提高班顺利升班', '1378173436', '2', '0', '3', '0');
INSERT INTO `news` VALUES ('81', '南瓜', '2012级语物理提高班', '2012级语物理提高班2012级语物理提高班2012级语物理提高班2012级语物理提高班2012级语物理提高班2012级语物理提高班2012级语物理提高班', '1378175723', '2', '0', '1', '0');
INSERT INTO `news` VALUES ('82', '系统管理员', '123', '你哈珀啊', '1378370718', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('83', '系统管理员', '工作流测试', '123', '1378370908', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('84', '系统管理员', '工作流测试', '你好啊', '1378371056', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('85', '系统管理员', '你好啊', '你好啊', '1378372351', '1', '0', '3', '0');
INSERT INTO `news` VALUES ('86', '系统管理员', '哈哈', '123234344', '1378372388', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('87', '系统管理员', '123', '你好啊', '1378375707', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('88', '系统管理员', '很好啊', '很好啊', '1378430934', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('89', '系统管理员', '123434', 'efaefraer', '1378449233', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('90', '系统管理员', 'test1', 'test1', '1378449287', '1', '0', '3', '0');
INSERT INTO `news` VALUES ('91', '系统管理员', '的萨达萨达', 'dsadadadada', '1379004772', '1', '0', '1', '0');
INSERT INTO `news` VALUES ('92', '系统管理员', '121323', '12121212121', '1379065823', '1', '0', '1', '1');

-- ----------------------------
-- Table structure for `schedule`
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL COMMENT '课程id',
  `t_id` int(11) DEFAULT NULL COMMENT '教师id',
  `r_id` int(11) DEFAULT NULL COMMENT '教室的id',
  `g_id` int(11) DEFAULT NULL COMMENT '班级id',
  `ts_start` int(11) DEFAULT NULL,
  `ts_end` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES ('1', '5', '10', '1', '1', '1379347200', '1379606400', '1');
INSERT INTO `schedule` VALUES ('2', '7', '11', '2', '2', '1378828800', '1378832400', '1');
INSERT INTO `schedule` VALUES ('3', '4', '11', '2', '2', '1378224000', '1378231200', '1');
INSERT INTO `schedule` VALUES ('4', '4', '11', '2', '2', '1378137600', '1378144800', '1');
INSERT INTO `schedule` VALUES ('5', '7', '10', '1', '1', '1379606400', '1379610000', '1');
INSERT INTO `schedule` VALUES ('6', '7', '10', '1', '1', '1379520000', '1379523600', '1');
INSERT INTO `schedule` VALUES ('7', '2', '10', '1', '1', '1378828800', '1378833100', '1');
INSERT INTO `schedule` VALUES ('8', '2', '10', '1', '1', '1378742400', '1378746700', '1');
INSERT INTO `schedule` VALUES ('9', '6', '10', '2', '4', '1379433600', '1380297600', '1');
INSERT INTO `schedule` VALUES ('10', '7', '10', '1', '1', '1381248000', '1381251600', '1');
INSERT INTO `schedule` VALUES ('11', '7', '10', '1', '1', '1381161600', '1381165200', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '公告栏', 'news', '1', '1', 'type');
INSERT INTO `type` VALUES ('2', '最近升班', 'news', '2', '1', 'type');
INSERT INTO `type` VALUES ('3', '待审核', 'news', '1', '1', 'active');
INSERT INTO `type` VALUES ('4', '审核未通过', 'news', '2', '1', 'active');
INSERT INTO `type` VALUES ('5', '审核通过', 'news', '3', '1', 'active');

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
