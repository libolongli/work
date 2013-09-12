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
			$html = array();
			$html[] = k::load('form','form')->setPopup(array('name'=>'username','title'=>'收件人','tip'=>'请输入收件人'));
			$html[] = k::load('form','form')->setTextarea(array('name'=>'content','title'=>'内容','tip'=>'请填写内容'));
			$html[] = k::load('form','form')->setHideinput(array('name'=>'rids'));
			$html = join(",",$html);
			$t->assign('html',$html); 
			$t->display('send');
		}


		
	}
