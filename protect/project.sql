/*
Navicat MySQL Data Transfer

Source Server         : libo
Source Server Version : 50515
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50515
File Encoding         : 65001

Date: 2013-08-23 18:10:00
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
  `uids` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0代表停用,1代表正在使用',
  `status` tinyint(4) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of common_config
-- ----------------------------
INSERT INTO `common_config` VALUES ('1', '付款', 'user/pay', '用户{user},已经付款请注意查收!', '0', '1', '1', 'flow');

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
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of consult
-- ----------------------------
INSERT INTO `consult` VALUES ('1', '小王', '1376621843', '1', '王明', 'wangming', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子');
INSERT INTO `consult` VALUES ('2', '小王2', '1376621843', '1', '王明2', 'wangming2', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子2');
INSERT INTO `consult` VALUES ('3', '小王3', '1376621843', '1', '王明3', 'wangming3', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子3');
INSERT INTO `consult` VALUES ('4', '小王4', '1376621843', '1', '王明4', 'wangming4', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子4');
INSERT INTO `consult` VALUES ('5', '小王5', '1376621843', '1', '王明5', 'wangming5', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子5');
INSERT INTO `consult` VALUES ('6', '小王6', '1376621843', '1', '王明6', 'wangming6', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子6');
INSERT INTO `consult` VALUES ('7', '小王7', '1376621843', '1', '王明7', 'wangming7', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子7');
INSERT INTO `consult` VALUES ('8', '小王8', '1376621843', '1', '王明8', 'wangming8', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子8');
INSERT INTO `consult` VALUES ('9', '小王9', '1376621843', '1', '王明9', 'wangming9', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子9');
INSERT INTO `consult` VALUES ('10', '小王10', '1376621843', '1', '王明10', 'wangming10', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子10');
INSERT INTO `consult` VALUES ('11', '小王11', '1376621843', '1', '王明11', 'wangming11', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子11');
INSERT INTO `consult` VALUES ('12', '小王12', '1376621843', '1', '王明12', 'wangming12', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子12');
INSERT INTO `consult` VALUES ('13', '小王13', '1376621843', '1', '王明13', 'wangming13', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子13');
INSERT INTO `consult` VALUES ('14', '小王14', '1376621843', '1', '王明14', 'wangming14', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子14');
INSERT INTO `consult` VALUES ('15', '小王15', '1376621843', '1', '王明15', 'wangming15', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子15');
INSERT INTO `consult` VALUES ('16', '小王16', '1376621843', '1', '王明16', 'wangming16', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子16');
INSERT INTO `consult` VALUES ('17', '小王17', '1376621843', '1', '王明17', 'wangming17', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子17');
INSERT INTO `consult` VALUES ('18', '小王18', '1376621843', '1', '王明18', 'wangming18', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子18');
INSERT INTO `consult` VALUES ('19', '小王19', '1376621843', '1', '王明19', 'wangming19', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子19');
INSERT INTO `consult` VALUES ('20', '小王20', '1376621843', '1', '王明20', 'wangming20', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子20');
INSERT INTO `consult` VALUES ('21', '小王21', '1376621843', '1', '王明21', 'wangming21', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子21');
INSERT INTO `consult` VALUES ('22', '小王22', '1376621843', '1', '王明22', 'wangming22', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子22');
INSERT INTO `consult` VALUES ('23', '小王23', '1376621843', '1', '王明23', 'wangming23', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子23');
INSERT INTO `consult` VALUES ('24', '小王24', '1376621843', '1', '王明24', 'wangming24', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子24');
INSERT INTO `consult` VALUES ('25', '小王25', '1376621843', '1', '王明25', 'wangming25', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子25');
INSERT INTO `consult` VALUES ('26', '小王26', '1376621843', '1', '王明26', 'wangming26', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子26');
INSERT INTO `consult` VALUES ('27', '小王27', '1376621843', '1', '王明27', 'wangming27', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子27');
INSERT INTO `consult` VALUES ('28', '小王28', '1376621843', '1', '王明28', 'wangming28', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子28');
INSERT INTO `consult` VALUES ('29', '小王29', '1376621843', '1', '王明29', 'wangming29', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子29');
INSERT INTO `consult` VALUES ('30', '小王30', '1376621843', '1', '王明30', 'wangming30', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子30');
INSERT INTO `consult` VALUES ('31', '小王31', '1376621843', '1', '王明31', 'wangming31', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子31');
INSERT INTO `consult` VALUES ('32', '小王32', '1376621843', '1', '王明32', 'wangming32', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子32');
INSERT INTO `consult` VALUES ('33', '小王33', '1376621843', '1', '王明33', 'wangming33', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子33');
INSERT INTO `consult` VALUES ('34', '小王34', '1376621843', '1', '王明34', 'wangming34', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子34');
INSERT INTO `consult` VALUES ('35', '小王35', '1376621843', '1', '王明35', 'wangming35', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子35');
INSERT INTO `consult` VALUES ('36', '小王36', '1376621843', '1', '王明36', 'wangming36', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子36');
INSERT INTO `consult` VALUES ('37', '小王37', '1376621843', '1', '王明37', 'wangming37', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子37');
INSERT INTO `consult` VALUES ('38', '小王38', '1376621843', '1', '王明38', 'wangming38', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子38');
INSERT INTO `consult` VALUES ('39', '小王39', '1376621843', '1', '王明39', 'wangming39', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子39');
INSERT INTO `consult` VALUES ('40', '小王40', '1376621843', '1', '王明40', 'wangming40', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子40');
INSERT INTO `consult` VALUES ('41', '小王41', '1376621843', '1', '王明41', 'wangming41', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子41');
INSERT INTO `consult` VALUES ('42', '小王42', '1376621843', '1', '王明42', 'wangming42', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子42');
INSERT INTO `consult` VALUES ('43', '小王43', '1376621843', '1', '王明43', 'wangming43', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子43');
INSERT INTO `consult` VALUES ('44', '小王44', '1376621843', '1', '王明44', 'wangming44', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子44');
INSERT INTO `consult` VALUES ('45', '小王45', '1376621843', '1', '王明45', 'wangming45', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子45');
INSERT INTO `consult` VALUES ('46', '小王46', '1376621843', '1', '王明46', 'wangming46', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子46');
INSERT INTO `consult` VALUES ('47', '小王47', '1376621843', '1', '王明47', 'wangming47', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子47');
INSERT INTO `consult` VALUES ('48', '小王48', '1376621843', '1', '王明48', 'wangming48', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子48');
INSERT INTO `consult` VALUES ('49', '小王49', '1376621843', '1', '王明49', 'wangming49', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子49');
INSERT INTO `consult` VALUES ('50', '小王50', '1376621843', '1', '王明50', 'wangming50', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子50');
INSERT INTO `consult` VALUES ('51', '小王51', '1376621843', '1', '王明51', 'wangming51', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子51');
INSERT INTO `consult` VALUES ('52', '小王52', '1376621843', '1', '王明52', 'wangming52', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子52');
INSERT INTO `consult` VALUES ('53', '小王53', '1376621843', '1', '王明53', 'wangming53', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子53');
INSERT INTO `consult` VALUES ('54', '小王54', '1376621843', '1', '王明54', 'wangming54', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子54');
INSERT INTO `consult` VALUES ('55', '小王55', '1376621843', '1', '王明55', 'wangming55', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子55');
INSERT INTO `consult` VALUES ('56', '小王56', '1376621843', '1', '王明56', 'wangming56', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子56');
INSERT INTO `consult` VALUES ('57', '小王57', '1376621843', '1', '王明57', 'wangming57', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子57');
INSERT INTO `consult` VALUES ('58', '小王58', '1376621843', '1', '王明58', 'wangming58', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子58');
INSERT INTO `consult` VALUES ('59', '小王59', '1376621843', '1', '王明59', 'wangming59', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子59');
INSERT INTO `consult` VALUES ('60', '小王60', '1376621843', '1', '王明60', 'wangming60', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子60');
INSERT INTO `consult` VALUES ('61', '小王61', '1376621843', '1', '王明61', 'wangming61', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子61');
INSERT INTO `consult` VALUES ('62', '小王62', '1376621843', '1', '王明62', 'wangming62', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子62');
INSERT INTO `consult` VALUES ('63', '小王63', '1376621843', '1', '王明63', 'wangming63', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子63');
INSERT INTO `consult` VALUES ('64', '小王64', '1376621843', '1', '王明64', 'wangming64', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子64');
INSERT INTO `consult` VALUES ('65', '小王65', '1376621843', '1', '王明65', 'wangming65', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子65');
INSERT INTO `consult` VALUES ('66', '小王66', '1376621843', '1', '王明66', 'wangming66', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子66');
INSERT INTO `consult` VALUES ('67', '小王67', '1376621843', '1', '王明67', 'wangming67', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子67');
INSERT INTO `consult` VALUES ('68', '小王68', '1376621843', '1', '王明68', 'wangming68', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子68');
INSERT INTO `consult` VALUES ('69', '小王69', '1376621843', '1', '王明69', 'wangming69', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子69');
INSERT INTO `consult` VALUES ('70', '小王70', '1376621843', '1', '王明70', 'wangming70', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子70');
INSERT INTO `consult` VALUES ('71', '小王71', '1376621843', '1', '王明71', 'wangming71', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子71');
INSERT INTO `consult` VALUES ('72', '小王72', '1376621843', '1', '王明72', 'wangming72', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子72');
INSERT INTO `consult` VALUES ('73', '小王73', '1376621843', '1', '王明73', 'wangming73', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子73');
INSERT INTO `consult` VALUES ('74', '小王74', '1376621843', '1', '王明74', 'wangming74', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子74');
INSERT INTO `consult` VALUES ('75', '小王75', '1376621843', '1', '王明75', 'wangming75', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子75');
INSERT INTO `consult` VALUES ('76', '小王76', '1376621843', '1', '王明76', 'wangming76', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子76');
INSERT INTO `consult` VALUES ('77', '小王77', '1376621843', '1', '王明77', 'wangming77', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子77');
INSERT INTO `consult` VALUES ('78', '小王78', '1376621843', '1', '王明78', 'wangming78', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子78');
INSERT INTO `consult` VALUES ('79', '小王79', '1376621843', '1', '王明79', 'wangming79', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子79');
INSERT INTO `consult` VALUES ('80', '小王80', '1376621843', '1', '王明80', 'wangming80', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子80');
INSERT INTO `consult` VALUES ('81', '小王81', '1376621843', '1', '王明81', 'wangming81', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子81');
INSERT INTO `consult` VALUES ('82', '小王82', '1376621843', '1', '王明82', 'wangming82', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子82');
INSERT INTO `consult` VALUES ('83', '小王83', '1376621843', '1', '王明83', 'wangming83', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子83');
INSERT INTO `consult` VALUES ('84', '小王84', '1376621843', '1', '王明84', 'wangming84', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子84');
INSERT INTO `consult` VALUES ('85', '小王85', '1376621843', '1', '王明85', 'wangming85', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子85');
INSERT INTO `consult` VALUES ('86', '小王86', '1376621843', '1', '王明86', 'wangming86', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子86');
INSERT INTO `consult` VALUES ('87', '小王87', '1376621843', '1', '王明87', 'wangming87', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子87');
INSERT INTO `consult` VALUES ('88', '小王88', '1376621843', '1', '王明88', 'wangming88', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子88');
INSERT INTO `consult` VALUES ('89', '小王89', '1376621843', '1', '王明89', 'wangming89', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子89');
INSERT INTO `consult` VALUES ('90', '小王90', '1376621843', '1', '王明90', 'wangming90', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子90');
INSERT INTO `consult` VALUES ('91', '小王91', '1376621843', '1', '王明91', 'wangming91', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子91');
INSERT INTO `consult` VALUES ('92', '小王92', '1376621843', '1', '王明92', 'wangming92', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子92');
INSERT INTO `consult` VALUES ('93', '小王93', '1376621843', '1', '王明93', 'wangming93', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子93');
INSERT INTO `consult` VALUES ('94', '小王94', '1376621843', '1', '王明94', 'wangming94', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子94');
INSERT INTO `consult` VALUES ('95', '小王95', '1376621843', '1', '王明95', 'wangming95', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子95');
INSERT INTO `consult` VALUES ('96', '小王96', '1376621843', '1', '王明96', 'wangming96', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子96');
INSERT INTO `consult` VALUES ('97', '小王97', '1376621843', '1', '王明97', 'wangming97', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子97');
INSERT INTO `consult` VALUES ('98', '小王98', '1376621843', '1', '王明98', 'wangming98', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子98');
INSERT INTO `consult` VALUES ('99', '小王99', '1376621843', '1', '王明99', 'wangming99', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子99');
INSERT INTO `consult` VALUES ('100', '小王100', '1376621843', '1', '王明100', 'wangming100', '111111', '100', '1', '1', '数学', '绵阳', '1', '1', '这是个很好的孩子100');
INSERT INTO `consult` VALUES ('101', '自己', '1376633301', '111111', '李波', 'nomius', '111111', '111111', '1', '2', '数学', '1', '1', '3', '你好');
INSERT INTO `consult` VALUES ('102', '自己', '1376633349', '111111', '李波', 'nomius', '111111', '111111', '1', '2', '数学', '1', '1', '3', '你好');
INSERT INTO `consult` VALUES ('103', '自己12', '1376633469', '222222', '李波李波', 'nomius', '222222', '222222', '2', '2', '语文', '1', '1', '3', '很好骄傲的噶');
INSERT INTO `consult` VALUES ('104', '张三', '1376637615', '333333', '李四', 'nomius4', '444444', '444444', '2', '3', '英语', '2', '1', '3', '很好的说');
INSERT INTO `consult` VALUES ('105', '张三', '1376637753', '333333', '李四', 'nomius4', '444444', '444444', '2', '3', '英语', '2', '1', '3', '很好的说');
INSERT INTO `consult` VALUES ('106', '张三', '1376637882', '333333', '李四', 'nomius4', '444444', '444444', '2', '3', '英语', '2', '1', '3', '很好的说');
INSERT INTO `consult` VALUES ('107', '张三', '1376637884', '333333', '李四', 'nomius4', '444444', '444444', '2', '3', '英语', '2', '1', '3', '很好的说');
INSERT INTO `consult` VALUES ('108', '张三', '1376637895', '333333', '李四', 'nomius4', '444444', '444444', '2', '3', '英语', '2', '1', '3', '很好的说');
INSERT INTO `consult` VALUES ('109', '王麻子', '1376639610', '555555', '王麻子', 'nomius', '555555', '555555', '2', '3', '英语', '2', '1', '2', '好东西啊');
INSERT INTO `consult` VALUES ('110', '王麻子', '1376639633', '555555', '王麻子', 'nomius', '555555', '555555', '2', '3', '英语', '2', '1', '2', '好东西啊');
INSERT INTO `consult` VALUES ('111', '王麻子', '1376639807', '555555', '王麻子', 'nomius', '555555', '555555', '2', '3', '英语', '2', '1', '2', '好东西啊');
INSERT INTO `consult` VALUES ('112', '李波马', '1376643258', '333333', '李波', 'omius', '333333', '333333', '2', '2', '语文', '1', '1', '3', '李波李波李波李波李波');
INSERT INTO `consult` VALUES ('113', '李波', '1356883200', '111111', '李波', 'nomius', '111111', '111111', '2', '3', '111111', '123111111', null, null, '111111');
INSERT INTO `consult` VALUES ('114', '李波', '1356883200', '111111', '李波', 'qqqqqq', '111111', '111111', '1', '3', '111111', '111111', null, null, '111111');
INSERT INTO `consult` VALUES ('115', '李波', '1356883200', '111111', '李波', 'nomius', '111111', '111111111', '2', '3', '111111', '111111', null, null, '111111');

-- ----------------------------
-- Table structure for `feed`
-- ----------------------------
DROP TABLE IF EXISTS `feed`;
CREATE TABLE `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `getname` varchar(40) NOT NULL,
  `content` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 未读(默认) 2已读  3代表已 feed但是未读',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feed
-- ----------------------------
INSERT INTO `feed` VALUES ('1', 'livo', 'rose', 'hello', '3');
INSERT INTO `feed` VALUES ('2', 'system', 'admin', '新注册用户Nomius2', '3');
INSERT INTO `feed` VALUES ('3', 'system', 'admin', '新注册用户Nomius3', '3');
INSERT INTO `feed` VALUES ('4', 'system', 'admin', '新注册用户nomius4', '3');
INSERT INTO `feed` VALUES ('5', 'system', 'admin', '新注册用户nomius5', '3');
INSERT INTO `feed` VALUES ('6', 'system', 'admin', '新注册用户nomius6', '3');
INSERT INTO `feed` VALUES ('7', 'system', 'admin', '新注册用户Nomius67', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow
-- ----------------------------
INSERT INTO `flow` VALUES ('1', '1', '123,456', '用户李波,已经付款请注意查收!', '0', '1377051468', '1377051468', '1');
INSERT INTO `flow` VALUES ('2', '1', '1,2,3,4', '用户你很好啊,已经付款请注意查收!', '0', '1377051648', '1377051648', '1');
INSERT INTO `flow` VALUES ('3', '1', '123,456', '用户,已经付款请注意查收!', '0', '1377052277', '1377052277', '1');

-- ----------------------------
-- Table structure for `flow_log`
-- ----------------------------
DROP TABLE IF EXISTS `flow_log`;
CREATE TABLE `flow_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `ts_created` int(11) NOT NULL,
  `fleg` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flow_log
-- ----------------------------
INSERT INTO `flow_log` VALUES ('1', '1', '123', '1377051468', '0');
INSERT INTO `flow_log` VALUES ('2', '1', '456', '1377051468', '0');
INSERT INTO `flow_log` VALUES ('3', '1', '1', '1377051648', '0');
INSERT INTO `flow_log` VALUES ('4', '1', '2', '1377051648', '0');
INSERT INTO `flow_log` VALUES ('5', '1', '3', '1377051648', '0');
INSERT INTO `flow_log` VALUES ('6', '1', '4', '1377051648', '0');
INSERT INTO `flow_log` VALUES ('7', '1', '123', '1377052277', '0');
INSERT INTO `flow_log` VALUES ('8', '1', '456', '1377052277', '0');

-- ----------------------------
-- Table structure for `leaflet`
-- ----------------------------
DROP TABLE IF EXISTS `leaflet`;
CREATE TABLE `leaflet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of leaflet
-- ----------------------------
INSERT INTO `leaflet` VALUES ('1', 'Hello World');
INSERT INTO `leaflet` VALUES ('2', 'Hello World');
INSERT INTO `leaflet` VALUES ('3', '日你妹,这也行?');
INSERT INTO `leaflet` VALUES ('4', '日你妹,这也行?');
INSERT INTO `leaflet` VALUES ('5', '日你妹,这也行1234455?');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
INSERT INTO `menu` VALUES ('8', '我的表单', '2', 'c_from.html', '');
INSERT INTO `menu` VALUES ('9', 'CRM系统', '1', '', 'http://admin.zg10010.net/resources/images/menu/report.png');
INSERT INTO `menu` VALUES ('10', '统计报表', '1', '', 'http://admin.zg10010.net/resources/images/menu/sys.png');
INSERT INTO `menu` VALUES ('11', '系统管理', '1', '', 'http://admin.zg10010.net/resources/images/menu/work.png');
INSERT INTO `menu` VALUES ('12', 'OA办公', '1', '', 'http://admin.zg10010.net/resources/images/menu/callcenter.png');
INSERT INTO `menu` VALUES ('13', '工作流', '12', '', '');
INSERT INTO `menu` VALUES ('14', 'feed', '12', '', '');
INSERT INTO `menu` VALUES ('15', '短信息', '12', '?m=msg&a=list', '');

-- ----------------------------
-- Table structure for `msg`
-- ----------------------------
DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rids` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `ts_created` int(11) NOT NULL,
  `ts_updated` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0代表已删除,1代表未读,2代表已读...',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg
-- ----------------------------
INSERT INTO `msg` VALUES ('1', '1', '4', '发的法定', '1377052406', '1377052406', '1');
INSERT INTO `msg` VALUES ('2', '1', '5', '232', '1377161175', '1377161175', '1');
INSERT INTO `msg` VALUES ('3', '1', '6', '2423', '1377164359', '1377164359', '1');
INSERT INTO `msg` VALUES ('4', '1', '123', null, '1377244681', '1377244681', '1');
INSERT INTO `msg` VALUES ('5', '1', '123', null, '1377244735', '1377244735', '1');
INSERT INTO `msg` VALUES ('6', '1', '123', null, '1377244758', '1377244758', '1');
INSERT INTO `msg` VALUES ('7', '1', '123', null, '1377244891', '1377244891', '1');
INSERT INTO `msg` VALUES ('8', '1', 'fasdf', 'fasdfads', '1377245094', '1377245094', '1');
INSERT INTO `msg` VALUES ('9', '1', '12343', '1244545454', '1377245120', '1377245120', '1');
INSERT INTO `msg` VALUES ('10', '1', '123', 'test', '1377245192', '1377245192', '1');
INSERT INTO `msg` VALUES ('11', '1', '11111', '12344', '1377245327', '1377245327', '1');
INSERT INTO `msg` VALUES ('12', '1', '3455', '12344', '1377245367', '1377245367', '1');
INSERT INTO `msg` VALUES ('14', '1', '3456', '15677', '1377250975', '1377250975', '1');
INSERT INTO `msg` VALUES ('15', '1', '434343q', 'afadsfasdfadsf', '1377251571', '1377251571', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg_log
-- ----------------------------
INSERT INTO `msg_log` VALUES ('1', '1', '123', '1377052406', null);
INSERT INTO `msg_log` VALUES ('2', '1', '456', '1377052406', null);
INSERT INTO `msg_log` VALUES ('3', '1', '12', '1377161175', null);
INSERT INTO `msg_log` VALUES ('4', '1', '2', '1377164359', null);
INSERT INTO `msg_log` VALUES ('5', '1', '3', '1377164359', null);
INSERT INTO `msg_log` VALUES ('6', '1', '4', '1377164359', null);

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
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(254) NOT NULL,
  `pass` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', '3');
INSERT INTO `user` VALUES ('2', '1', '44');
INSERT INTO `user` VALUES ('3', '1', '1');
INSERT INTO `user` VALUES ('4', 'Nomius', '111111');
INSERT INTO `user` VALUES ('5', 'Nomius2', '111111');
INSERT INTO `user` VALUES ('6', 'Nomius3', '111111');
INSERT INTO `user` VALUES ('7', 'nomius4', '111111');
INSERT INTO `user` VALUES ('8', 'nomius5', '111111');
INSERT INTO `user` VALUES ('9', 'nomius6', '123456');
INSERT INTO `user` VALUES ('10', 'Nomius67', '1234567');
