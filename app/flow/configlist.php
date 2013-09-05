<?php
	class module_flow_configlist{
		function run(){
			$t = new tpl();
			$json = k::load('flow')->configlist();
			//print_r($json);exit;
			$t->assign('json',$json);
			$t->display('configlist');
		}

	}
