/*
Navicat MySQL Data Transfer

Source Server         : libo
Source Server Version : 50515
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50515
File Encoding         : 65001

Date: 2013-09-30 15:33:00
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `ltablename` varchar(255) DEFAULT NULL,
  `gtype` varchar(255) DEFAULT NULL COMMENT '图表类型',
  `field` text COMMENT '查看的字段',
  `samm` varchar(255) DEFAULT NULL COMMENT 'avg,sum,max,min',
  `w` varchar(255) DEFAULT NULL COMMENT '其它条件',
  `g` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of graph
-- ----------------------------
INSERT INTO `graph` VALUES ('1', null, null, null, 'kc_course', 'a:1:{s:22:\"kc_course_pack_element\";a:4:{s:2:\"on\";s:16:\"element_courseId\";s:7:\"ontable\";s:9:\"kc_course\";s:4:\"join\";s:10:\"inner join\";s:3:\"on1\";s:9:\"course_id\";}}', 'kc_course_pack_element', null, 'course_name,course_teacherId,course_hit,element_packId,element_courseId', 'a:2:{s:15:\"course_studyNum\";s:15:\"min,max,avg,sum\";s:10:\"course_hit\";s:15:\"min,max,avg,sum\";}', 'course_name like \'%高中%\'', '', '1');
INSERT INTO `graph` VALUES ('2', null, null, null, 'kc_course', 'a:1:{s:22:\"kc_course_pack_element\";a:4:{s:2:\"on\";s:16:\"element_courseId\";s:7:\"ontable\";s:9:\"kc_course\";s:4:\"join\";s:10:\"inner join\";s:3:\"on1\";s:9:\"course_id\";}}', 'kc_course_pack_element', null, 'course_teacherId,course_name,element_packId', 'a:2:{s:15:\"course_studyNum\";s:15:\"min,max,avg,sum\";s:10:\"course_hit\";s:15:\"min,max,avg,sum\";}', 'course_name like \'%高中%\'', '', '1');
