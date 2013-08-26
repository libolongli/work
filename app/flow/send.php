<?php
	class module_flow_send{
		function run(){
			$t=new tpl();
			$data = k::load('user','user')->getUserList();
			$t->assign('json',json_encode($data));
			$t->display('send');
		}
	}
	
