<?php
	class module_msg_list{
		function run(){
			$t=new tpl();
			$json = k::load('msg')->getListJson();
			$t->assign('json',$json);
			$t->display('list');
		}
	}