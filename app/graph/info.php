<?php

return array(
    'name'  =>'flow',
    'display_name'  =>'报表',
    'description'  => '报表各个功能',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.projcet.com',
    'menu'  => array(
        array(
            'text'  => '添加/修改 报表配置文件',
            'action'   => 'addconfig',
        ),
		 array(
            'text'  => '配置文件列表',
            'action'   => 'configlist',
        ),
		 array(
            'text'  => 'index',
            'action'   => '用来查看报表',
        ),
    ),
);

