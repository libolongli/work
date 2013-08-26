<?php
	class module_flow_list{
		function run(){
			$t=new tpl();
			$t->display('list');
		}
	}
	//require 'task.class.php';
	//$task = new task();
	//$task->add(array('uid'=>2,'rids'=>'3,4,5,6,7','user'=>'李波'));
	//$task->add(array('uid'=>3,'rids'=>'4,5,6,7,8','user'=>'李波'));
	//echo "已经模拟给用户2,3,4 发送了人任务!";
	//echo "访问<a href='update.php'>update.php</a>";
