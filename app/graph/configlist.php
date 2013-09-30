<?php
	class module_graph_configlist{
		function run(){
			$this->beforeDisplay();
			$t = new tpl();
			$t->assign('title','配置列表');
			$t->display('list');
		}

		function beforeDisplay(){
			if(isset($_GET['back'])){
				$map['limit'] = $_POST['limit'];
				$map['offset'] = $_POST['offset'];
				if(isset($_POST['search'])){
					$search = k::load('api')->load('search','op')->teamSearch();
					$map['search'] = $search;
				}
				$data = k::load('api')->load('graph')->getListJson($map);
				echo json_encode($data);exit;
			}
			if(isset($_POST['status']) && isset($_POST['id'])){
				foreach ($_POST['id'] as $key => $gid) {
					k::load('api')->load('graph','graph')->updateGraph(array('status'=>$_POST['status']),$gid);
					
				}

			}
		}
	}