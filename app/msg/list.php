<?php
	class module_msg_list{
		function run(){
			$t=new tpl();
			$json = k::load('msg')->getListJson();
			$t->assign('json',$json);
			$t->assign('title','短消息');
			$t->assign('formurl','?m=msg&a=update');
			$t->assign('frameurl','?m=msg&a=send');	
			$t->display('list');
		}
	}