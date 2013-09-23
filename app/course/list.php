<?php
	class module_course_list{
		function run(){
			$t = new tpl();
			$this->beforeDisplay();
			$t->assign('title','课程表');
			$t->display('list'); 
		}

		function beforeDisplay(){
			if(isset($_GET['back'])) {
				$map = array('limit'=>$_POST['limit'],'offset'=>$_POST['offset']);
				
				if(isset($_POST['search'])){
					$search = k::load('search','op')->teamSearch();
					$map['search'] = $search;
				}
				
				$data = k::load('api')->load('course')->getSchedule($map);

				foreach($data['records'] as $key => $value){
					$url = k::url('op/update',array('table'=>'schedule','id'=>$value['recid']));
					$data['records'][$key]['op'] = "<a href='javascript:void(0);' onclick=checkinfo('{$url}')>修改</a>";
																														
				}
				echo json_encode($data);exit;
			}

			if($_POST){
				k::load('api')->load('course')->updateSchedule($_POST);exit;
			}

			
		}
	}
