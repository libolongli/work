<?php
	class module_flow_update{
		function run(){
			if($_POST){
				//require 'model/task.php';
				$task =k::load('api')->load('task','flow');
				$map = array();
				$map['id'] = $_REQUEST['id'];
				$map['percent'] = $_REQUEST['percent'];
				$task->update($map);
				header('Location: '.k::url('flow/list'));
			}
			$t= new tpl();
			$t->assign('fid',$_GET['fid']);
			$t->display('update');
		}
	}