<?php
	class module_flow_send{
		function run(){
			if($_POST){				
				$uid = $_SESSION['user']['id'];
				$array = array(
					'rids'=>$_POST['rids'],
					'content'=>$_POST['content'],
					'uid'=>$uid,
					'transmit'=>$_POST['transmit'],
				);
				k::load('api')->load('task','flow')->add($array);
				echo "添加成功!请关闭对话框!";exit;			
			}
			$t=new tpl();
			$data = k::load('api')->load('user','user')->getUserList();
			$t->assign('value','');
			$t->assign('transmit',0);
			if(isset($_GET['id'])){
				$row = k::load('api')->load('flow')->getFlowById($_GET['id']);
				$t->assign('value',$row['content']);
				$t->assign('transmit',1);
			}	
			$t->assign('json',json_encode($data));
			$t->display('send');
		}
	}
	
