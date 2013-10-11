DROP TABLE IF EXISTS `feed`;
CREATE TABLE `feed` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL default '1' COMMENT '1 代表feed,2代表msg,3代表工作流',
  `type` tinyint(4) default '1',
  `content` varchar(255) NOT NULL,
  `status` int(11) NOT NULL default '1' COMMENT '1 未读(默认) 2已读  3代表已 feed但是未读',
  `mode` int(11) DEFAULT '1' COMMENT '1 代表feed,2代表email,3代表sms ',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;