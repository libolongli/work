DROP TABLE IF EXISTS `flow`;
CREATE TABLE `flow` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `rids` varchar(255) NOT NULL,
  `content` varchar(255) default NULL,
  `percent` int(3) default '0',
  `ts_created` int(11) NOT NULL,
  `ts_updated` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `flow_log`;
CREATE TABLE `flow_log` (
  `id` int(11) NOT NULL auto_increment,
  `comment` varchar(255) default NULL,
  `fid` int(11) NOT NULL,
  `uid` int(11) default NULL,
  `rid` int(11) default NULL,
  `fleg` tinyint(4) NOT NULL default '1' COMMENT '1代表没有处理,2代表已经处理',
  `ts_created` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `common_config`;
CREATE TABLE `common_config` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `format` varchar(255) default NULL,
  `active` tinyint(4) NOT NULL default '1' COMMENT '0代表停用,1代表正在使用',
  `status` tinyint(4) default '1',
  `type` varchar(255) default 'flow',
  `variable` varchar(255) default NULL,
  `rids` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


