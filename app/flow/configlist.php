<?php
	class module_flow_configlist{
		function run(){
			$t = new tpl();
			$json = k::load('api')->load('flow')->configlist();
			//print_r($json);exit;
			$t->assign('title',"工作流配置列表");
			$t->assign('json',$json);
			$t->display('configlist');
		}

	}
