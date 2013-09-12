<?php
	class module_msg_detail{
		function run(){
			$t = new tpl();
			$data = k::load('msg')->getMsgInfo($_GET['id']);
			$t->assign('json',$data);
			$t->display('info');
		}
	}