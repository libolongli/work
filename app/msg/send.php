<?php
	class module_msg_send{
		function run(){
			if($_POST){
				$id = k::load('msg')->addMsg($_POST);
				if($id){		
					echo "添加成功!请关闭对话框!";exit;
				}else{
					echo "添加失败!请关闭对话框!";exit;
				}
			}			
			$t=new tpl();
			$data = k::load('user','user')->getUserList();
			$t->assign('json',json_encode($data));
			$t->display('send');
		}
	}
