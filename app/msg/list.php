<?php
	class module_msg_list{
		function run(){
			$t=new tpl();
			if(isset($_SESSION['user']['id'])) $id = $_SESSION['user']['id'];
			else header("Location:  ?m=home");
			$map = array();

			if(isset($_GET['model'])){
				$model = $_GET['model'];
				switch ($model) {
					case 'unread':
						$map['l.rid']=$id;$map['l.fleg']=1;break;
					case 'send':
						$map['m.uid']=$id;break;
					case 'res':
						$map['l.rid']=$id;break;
				} 

			}else{
				$map['l.rid']=$id;
			}

			$json = k::load('msg')->getListJson($map);
			$t->assign('json',$json);
			$t->assign('title','短消息');
			$t->assign('formurl','?m=msg&a=update');
			$t->assign('frameurl','?m=msg&a=send');	
			$t->display('list');
		}
	}