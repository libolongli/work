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
				
				$data = k::load('course')->getSchedule($map);
				$array = array(
					'total'=>$data['total'],
					'page'=>$_POST['offset']/$_POST['limit'],
					'records'=>$data['data']
					);
				echo json_encode($array);exit;
			}

			if($_POST){
				k::load('course')->updateSchedule($_POST);exit;
			}

			
		}
	}
