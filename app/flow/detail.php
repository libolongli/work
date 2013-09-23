<?php
	class module_flow_detail{
		function run(){
			$t = new tpl();
			$data = k::load('api')->load('flow')->getFlowInfo($_GET['id']);
			$t->assign('json',$data);
			$t->display('info');
		}
	}