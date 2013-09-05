<?php
	class module_flow_list{
		function run(){
			$t=new tpl();
			if(isset($_SESSION['user']['id'])) $id = $_SESSION['user']['id'];
			else header("Location:  ?m=home");
			$map = array();

			if(isset($_GET['model'])){
				$model = $_GET['model'];
				switch ($model) {
					case 'deal':
						$map['rids']=$id;$map['status']=8;break;
					case 'send':
						$map['uid']=$id;break;
					case 'undeal':
						$map['rids']=$id;$map['status']=1;break;
				} 

			}else{
				$map['uid']=$id;
			}

			$json = k::load('flow')->getListJson($map);
			$t->assign('json',$json);
			$t->display('list');
		}
	}
	