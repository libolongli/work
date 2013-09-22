<?php
	class module_flow_deal{
		function run(){
			$data = $this->beforeDisplay();
			$t = new tpl();
			$t->assign('status',$data);
			$t->assign('id',$_GET['id']);
			$t->display('deal');
		}
		
		function beforeDisplay(){
			if($_POST){
				$map = array();
				$map['fid'] = $_POST['id'];
				$map['comment'] = $_POST['comment'];
				$map['status'] = $_POST['status'];
				if(isset($_POST['rids'])) $map['rids'] = $_POST['rids'];
				$id = k::load('flow')->addlog($map);
				if($id) {echo "操作成功!请关闭对话框!";exit;}
			}
			if($_GET['id']){
				$fid = $_GET['id'];
				$flow = k::load('flow')->getFlowById($fid);
				$uid = $_SESSION['user']['id'];
				$json = "{value:2, name:'通过'}, {value:1, name:'未通过'}";
				return $json;
			}
			
			
		}

	}