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
				$array = array();
				$data = k::load('course')->getSchedule($map);
				$holiday = $this->getHoliday();
				
				foreach ($data['records'] as $key => $value) {
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

				$tmp = array_merge($array,$holiday);
				echo json_encode($tmp);exit;
			}
		}

		function getHoliday(){
			$year = date("Y",time());
			$fday = time();
			$date = explode("-",date("Y-m-d-w",$fday));
			$week = (int) $date[3];
			$data = array();
			if($week==0){
				array_push($data,date("Y-m-d",$fday));	
			 	$firstsun = $fday;
			 	$firstsat = $fday+86400*6;	
			}else{
				$leave = 86400*(6-$week);
			 	$firstsat = $fday+$leave;	
			 	$firstsun = $firstsat+86400;
			 	array_push($data,date("Y-m-d",$firstsat));	
			 	array_push($data,date("Y-m-d",$firstsun));
			 }
			$lyear = $year;
			while($lyear==$year){
			 	$firstsat =$firstsat+7*86400;
			 	$lyear =  date("Y",$firstsat);
			 	if($lyear==$year){
			 		 array_push($data,date("Y-m-d",$firstsat));
			 	}
			 	$firstsun =$firstsun+7*86400;
			 	$lyear =  date("Y",$firstsun);
			 	if($lyear==$year){
			 		 array_push($data,date("Y-m-d",$firstsun));
			 	}

			}
			 $array = array();
			 $holiday = k::load('course')->getHoliday('1');
			 $noworkdate = array();
			 foreach ($holiday as $key => $value) {
			 	 $noworkdate[] = date('Y-m-d',$value['ts_start']);
			 	 if($value['ts_start']<= $value['ts_end']){
				 	 $start = $value['ts_start']+86400;
				 	 while($start!=$value['ts_end']){
				 	 	 $noworkdate[] = date('Y-m-d',$start);
				 	 	 $start =$start + 86400;
				 	 }
				 	$noworkdate[] = date('Y-m-d',$value['ts_end']);
			 	 }
			 }
			$work = k::load('course')->getHoliday('0');
			$workdate = array();
			foreach ($work as $key => $value) {
				 $workdate[] = date('Y-m-d',$value['ts_start']);
			 	 if($value['ts_start']< $value['ts_end']){
				 	 $start = $value['ts_start']+86400;
				 	 while($start!=$value['ts_end']){
				 	 	 $workdate[] = date('Y-m-d',$start);
				 	 	 $start =$start + 86400;
				 	 }
				 	if($value['ts_end']!=$value['ts_start']) $workdate[] = date('Y-m-d',$value['ts_end']);
			 	 }
			}
			$data = array_diff(array_unique(array_merge($noworkdate,$data)),$workdate);
			foreach ($data as $key => $value) {
			 	$arr['id'] = $key;
			 	$arr['title'] = "假期";
			 	$arr['start'] = $value." 00:00:00";
			 	$arr['end'] = $value." 23:59:59";
			 	$arr['editable'] = false;
			 	$arr['allDay'] = false;
			 	$arr['color'] = "#dd0000";
			 	$arr['borderColor'] = "#dd0000";
			 	$arr['textColor'] = "#ffffff";
			 	$arr['className'] = "fc_clock";
			 	array_push($array, $arr);
			}


			return $array;
		}
	}
