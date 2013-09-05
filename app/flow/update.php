<?php
	class module_flow_update{
		function run(){
			if($_POST){
				require 'model/task.php';
				$task = new k_model_flow_task();
				$task->update($_REQUEST);
				header('Location:?m=flow&a=list');
			}
			$t= new tpl();
			$t->assign('fid',$_GET['fid']);
			$t->display('update');
		}
	}