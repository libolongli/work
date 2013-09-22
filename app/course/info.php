<?php

return array(
    'name'  =>'course',
    'display_name'  =>'课程管理',
    'description'  => '课程的管理',
    'version'   => '1.0',
    'author'    => 'libo',
    'website'   => 'http://www.project.com',
    'menu'  => array(
        array(
            'text'  => '添加教室',
            'action'   => 'classroom',
        ),
        array(
            'text'  => '添加课程',
            'action'   => 'course',
        ),
        array(
            'text'  => '课程表列表',
            'action'   => 'list',
        ),
        array(
            'text'  => '在排课页面预先加载已经排过的课程',
            'action'   => 'loadschedule',
        ),
        array(
            'text'  => '排课页面',
            'action'   => 'schedule',
        ),
    ),
);

?>
