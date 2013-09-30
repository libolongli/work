DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `rids` varchar(255) NOT NULL,
  `isgroup` tinyint(4) default '0' COMMENT '0代表不是,1代表不是',
  `content` varchar(255) default NULL,
  `ts_created` int(11) NOT NULL,
  `ts_updated` int(11) default NULL,
  `status` tinyint(4) default '1' COMMENT '0代表已删除,1代表未读,2代表已读...',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `msg_log`;
CREATE TABLE `msg_log` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `ts_created` int(11) NOT NULL,
  `fleg` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;


