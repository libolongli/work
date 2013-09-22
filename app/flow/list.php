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
						$map['l.rid']=$id;$map['l.fleg']=2;break;
					case 'send':
						$map['f.uid']=$id;break;
					case 'undeal':
						$map['l.rid']=$id;$map['l.fleg']=1;break;
				} 
			}else{
				$model = 'send';
				$map['f.uid']=$id;
			}
			$this->beforeDisplay($map,$model);
			//$json = k::load('flow')->getListJson($map,$model);
			$t->assign('title',"工作流");
			$t->display('list');
		
		}

		function beforeDisplay($map,$model){
			if(isset($_GET['back'])) {
				$map['limit'] = $_POST['limit'];
				$map['offset'] = $_POST['offset'];
				if(isset($_POST['search'])){
					$search = k::load('search','op')->teamSearch();
					$map['search'] = $search;
				}
				$data = k::load('flow')->getListJson($map,$model);
				// $array = array(
				// 	'total'=>$data['total'],
				// 	'page'=>$_POST['offset']/$_POST['limit'],
				// 	'records'=>$data['data']
				// 	);
				echo json_encode($data);exit;
			}
			
		}
	}
	