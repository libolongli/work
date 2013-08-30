<?php
	class module_msg_send{
		function run(){
		
			$writer = R::getWriter();
			$data = array('uid'=>1,'rid'=>1,'fleg'=>1);
			$tmp = array();
			$i=0;
			foreach($data as $key => $value){
				$tmp[$i]['property']=$key;
				$tmp[$i]['value']=$value;
				$i++;
			}
			//print_R($tmp);
			$writer->updateRecord('msg_log',$tmp,1);exit;
			$msg_log = R::dispense('msg_log');
			$msg_log->uid=1;
			$msg_log->rid=1;
			$msg_log->fleg=1;
			$msg_log->ts_created=time();
			$cid = R::store($msg_log);
		
			
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
