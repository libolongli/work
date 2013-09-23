<?php
	class module_menu_list{
		
		function run(){
			$this->beforeDisplay();
			$t=new tpl();
			$t->assign('title','菜单列表');
			$t->assign('frameurl',k::url('menu/add'));
			$t->assign('title','菜单列表');
			// $t->assign();
			$t->display('list');
		}

		function beforeDisplay(){
			if(isset($_GET['back'])){
			 	$map = array();
			 	if(isset($_POST['search'])){
			 		$map['search'] = k::load('api')->load('search','op')->teamSearch();
			 	}
			 	$data = k::load('api')->load('menu')->getJsonList($map);
			 	echo json_encode($data);
			 	exit;
			}

			if(isset($_POST['status']) && isset($_POST['id'])){
				$map = array('id'=>$_POST['id'],'status'=>$_POST['status']);
				// print_r($map);exit;
			 	k::load('api')->load('menu')->update($map);
			 	exit;
			}
		}
	}