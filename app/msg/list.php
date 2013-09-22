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
			$this->beforeDisplay($map);
			$t->assign('title','短消息');
			$t->assign('formurl','?m=msg&a=update');
			$t->assign('frameurl','?m=msg&a=send');	
			$t->display('list');
		}

		function beforeDisplay($map){
			if(isset($_GET['back'])) {
				$map['limit'] = $_POST['limit'];
				$map['offset'] = $_POST['offset'];
				if(isset($_POST['search'])){
					$search = k::load('search','op')->teamSearch();
					$map['search'] = $search;
				}
				$data = k::load('msg')->getListJson($map);
				echo json_encode($data);exit;
			}
			
		}
	}