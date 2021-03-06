DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `author` varchar(255) NOT NULL default '系统管理员' COMMENT '1系统管理员',
  `title` varchar(255) NOT NULL,
  `content` varchar(254) NOT NULL,
  `ts_created` int(11) NOT NULL,
  `type` int(255) NOT NULL default '3' COMMENT '1为news2为upgrade3为其他',
  `status` int(255) NOT NULL,
  `active` int(11) NOT NULL default '1',
  `top` int(11) NOT NULL default '1' COMMENT '1为置顶',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL auto_increment,
  `titles` varchar(255) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `cate` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;