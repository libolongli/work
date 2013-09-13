<?php

return array(
    'name'  =>'user',
    'display_name'  =>'用户管理',
    'description'  => '用户管理',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.projcet.com',
    'menu'  => array(
        array(
            'text'  => '用户登录',
            'action'   => 'login',
        ),
		 array(
            'text'  => '用户注册',
            'action'   => 'register',
        ),
		 array(
            'text'  => '用户JSON列表',
            'action'   => 'userlist',
        ),
		
    ),
);

?>
