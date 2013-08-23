<?php
	class module_msg_send{
		function run(){
			if($_POST){
				$id = k::load('msg')->addMsg($_POST);
				if($id){
					echo $id;exit;
				}else{
					echo 0;exit;
				}
			}
			$t=new tpl();
			$t->display('send');
		}
	}
