<?php
	class module_flow_update{
		function run(){
			if($_POST){
				require 'model/task.php';
				$task = new k_model_flow_task();
				$map = array();
				$map['id'] = $_REQUEST['id'];
				$map['percent'] = $_REQUEST['percent'];
				$task->update($map);
				header('Location:?m=flow&a=list');
			}
			$t= new tpl();
			$t->assign('fid',$_GET['fid']);
			$t->display('update');
		}
	}