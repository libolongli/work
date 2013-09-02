
<?php
	class module_new_list{
		function run(){
			$t=new tpl();
			$json = k::load('new')->getListJson();
			$t->assign('json',$json);
			$t->display('list');
		}
	}
