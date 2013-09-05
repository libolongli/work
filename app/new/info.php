<?php

return array(
    'name'  =>'new',
    'display_name'  =>'新闻',
    'description'  => '新闻添加',
    'version'   => '1.0',
    'author'    => 'mafei',
    'website'   => 'http://www.project.com',
    'menu'  => array(
        array(
            'action'   => 'add',
			'text'  => '添加表单',
        ),
		 array(        
            'action'   => 'list',
			'text'  => '新闻列表',
        ),
		 array(
            'action'   => 'update',
			'text'  => '删除，修改，审核信息',
        ),	
    ),
);

?>
