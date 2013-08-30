<?php
	class module_flow_send{
		function run(){
			$t=new tpl();
			$data = k::load('user','user')->getUserList();
			$t->assign('value','');
			$t->assign('transmit',0);
			if(isset($_GET['id'])){
				$row = k::load('flow')->getFlowById($_GET['id']);
				$t->assign('value',$row['content']);
				$t->assign('transmit',1);
			}	
			$t->assign('json',json_encode($data));
			$t->display('send');
		}
	}
	
