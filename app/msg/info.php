<?php

return array(
    'name'  =>'msg',
    'display_name'  =>'短消息',
    'description'  => '短消息的发送,和列表',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.projcet.com',
    'menu'  => array(
        array(
            'text'  => '发送短消息',
            'action'   => 'send',
        ),
		 array(
            'text'  => '列表',
            'action'   => 'list',
        ),
		 array(
            'text'  => '修改信息',
            'action'   => 'update',
        ),
		 array(
            'text'  => '生成树形',
            'action'   => 'tree',
        ),
		
		
    ),
);

?>
