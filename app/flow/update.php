<?php
	class module_flow_update{
		function run(){
			if($_POST){
				require 'task.class.php';
				$task = new task();
				$task->update($_REQUEST);
				header('Location:?m=flow&a=list');
			}
			$t= new tpl();
			$t->assign('fid',$_GET['fid']);
			$t->display('update');
		}
	}