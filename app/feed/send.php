<?php
	class module_feed_send{
		public function run(){
			if($_POST){
				$_POST['uid']=$_SESSION['user']['id'];
				$id = k::load('api')->load('feed')->send($_POST);
				if($id){
					echo "添加成功!请关闭对话框!";
					exit;
				}else{
					echo "添加失败!请关闭对话框!";exit;
				}
			}			
			$t=new tpl();
			$html = array();
			$html[] = k::load('api')->load('form','form')->setPopup(array('name'=>'username','title'=>'收件人','tip'=>'请输入收件人'));
			$html[] = k::load('api')->load('form','form')->setTextarea(array('name'=>'content','title'=>'内容','tip'=>'请填写内容'));
			$html[] = k::load('api')->load('form','form')->setSelect(array('name'=>'mode','title'=>'发送的类型','tip'=>'请选择类型',
				'data'=>array(array('id'=>1,'name'=>'feed'),array('id'=>2,'name'=>'email'),array('id'=>3,'name'=>'sms'))));
			$html[] = k::load('api')->load('form','form')->setHideinput(array('name'=>'rids'));
			$html = join(",",$html);
			$t->assign('html',$html); 
			$t->display('send');
		}

	}
