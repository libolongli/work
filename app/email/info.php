<?php

return array(
    'name'  =>'email',
    'display_name'  =>'email',
    'description'  => '邮件管理',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.project.com',
    'menu'  => array(
        array(
            'text'  => '邮箱配置文件',
            'action'   => 'config.php',
        ),
        array(
            'text'  => '后台邮件发送操作',
            'action'   => 'crond.php',
        ),
    ),
);

?>
