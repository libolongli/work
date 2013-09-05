<?php

return array(
    'name'  =>'home',
    'display_name'  =>'后台主页',
    'description'  => '后台的各个功能',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.projcet.com',
    'menu'  => array(
        array(
            'text'  => '后台主页',
            'action'   => 'index',
        ),
		 array(
            'text'  => '新闻列表',
            'action'   => 'listinfo',
        ),
		 array(
            'text'  => '新闻',
            'action'   => 'news',
        ),
		 array(
            'text'  => '模板管理',
            'action'   => 'template',
        ),	
    ),
);

?>
