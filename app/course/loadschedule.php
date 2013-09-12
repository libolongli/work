<?php
	class module_course_loadschedule{
		function run(){
			$this->beforeDisplay();
		}

		function beforeDisplay(){
			if($_GET){
				//$map['s.t_id'] = $_GET['t_id'];
				$map['s.r_id'] = $_GET['r_id'];
				//$map['s.g_id'] = $_GET['g_id'];
				$data = k::load('course')->getSchedule($map);
				$array = array();
				foreach ($data['data'] as $key => $value) {
				 	$arr['id'] = $key;
				 	$arr['title'] = $value['course_name'];
				 	$arr['start'] = $value['ts_start'];
				 	$arr['end'] = $value['ts_end'];
				 	$arr['editable'] = false;
				 	$arr['allDay'] = false;
				 	$arr['color'] = "#dd0000";
				 	$arr['borderColor'] = "#dd0000";
				 	$arr['textColor'] = "#ffffff";
				 	$arr['className'] = "fc_clock";
				 	array_push($array, $arr);
				}
				echo json_encode($array);exit;
			}
		}
	}
