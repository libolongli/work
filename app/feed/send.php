<?php
	class module_feed_send{
		public function run(){
			if($_POST){
				$_POST['uid']='1';
				$id = k::load('feed')->send($_POST);
				if($id){
					echo "添加成功!请关闭对话框!";
					echo $_POST;
					exit;
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
