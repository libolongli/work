<?php
	class module_flow_log{
		function run(){
			$fid = $_GET['id'];
			$log = k::load('api')->load('flow')->getLog(array('fid'=>$fid));
			$t= new tpl();
			$t->assign('data',$log);
			//print_R($log);exit;
			$t->display('log');
		}

	}