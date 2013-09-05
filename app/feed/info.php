<?php

return array(
    'name'  =>'feed',
    'display_name'  =>'消息推送',
    'description'  => '消息推送添加和列表',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.projcet.com',
    'menu'  => array(
        array(
            'text'  => 'home页面推送,返回数据',
            'action'   => 'get',
        ),
		 array(
            'text'  => 'feed列表',
            'action'   => 'list',
        ),
		 array(
            'text'  => '修改feed',
            'action'   => 'update',
        ),
		array(
            'text'  => '发送feed',
            'action'   => 'send',
        ),
    ),
);

?>
