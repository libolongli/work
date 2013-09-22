<?php

return array(
    'name'  =>'flow',
    'display_name'  =>'工作流',
    'description'  => '工作流的各个功能',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.projcet.com',
    'menu'  => array(
        array(
            'text'  => '添加工作流配置',
            'action'   => 'configadd',
        ),
		 array(
            'text'  => '工作流配置列表',
            'action'   => 'configlist',
        ),
		 array(
            'text'  => '用户处理工作流',
            'action'   => 'deal',
        ),
		 array(
            'text'  => '树形结构',
            'action'   => 'tree',
        ),	
		array(
            'text'  => '工作流列表',
            'action'   => 'list',
        ),
		array(
            'text'  => '工作流日志',
            'action'   => 'log',
        ),
		array(
            'text'  => '发送工作流',
            'action'   => 'send',
        ),
		array(
            'text'  => '修改工作流',
            'action'   => 'update',
        ),
		array(
            'text'  => '工作流详情页面',
            'action'   => 'detail',
        ),
    ),
);

