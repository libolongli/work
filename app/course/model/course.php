<?php
	class k_model_course_course{
		private $_db;
		function __construct(){
			$this->_db = new db();

		}
		function getCourseJosn(){
			$sql = "SELECT id as recid,name,category,object,tech_method from course";
			$data = R::getAll($sql);
			$array = array(
				'page'=>0,
				'records'=>$data,
				'total'=>count($data)
			);
			echo json_encode($data);
		}

		function add($table,$map){
			$data = array();
			foreach ($map as $key => $value) {
				array_push($data, "{$key}=>{$value}");
			}
			return $this->_db->add($table,$data);
		}

		function addSchedule($map=array()){
			$data = array("course_id=>{$map['course_id']}","t_id=>{$map['t_id']}","r_id=>{$map['r_id']}",
            	"g_id=>{$map['g_id']}","ts_start=>{$map['ts_start']}","ts_end=>{$map['ts_end']}");
            return $this->_db->add('schedule',$data);
		}

		/**
		Get schedule infomation
		*/
		function getSchedule($map = array()){
			$where = " WHERE ";
			$arr1 = array();
			if(isset($map['search'])){
				foreach($map['search']['search'] as $key=>$value){
					if($value['field'] == 'course_name'){
						array_push($arr1,"c.name ".$value['like']);
					}elseif($value['field'] == 'room_name'){
						array_push($arr1, "r.name ".$value['like']);
					}else{
						array_push($arr1, $value['field'].$value['like']);
					}
				}
				$where .= join(" ".$map['search']['logic']." ",$arr1);
			}

			foreach ($map as $key => $value) {
				if(($key!='offset') && ($key!='limit') && ($key!='search')){
					$where .= " AND {$key}={$value} ";
				}
			}

			$sql = "SELECT s.id as recid,c.name as course_name,r.name as room_name,u.`user`,
					FROM_UNIXTIME(ts_start,'%Y-%m-%d %H:%i') as ts_start,
					FROM_UNIXTIME(ts_end,'%Y-%m-%d %H:%i') as ts_end from schedule as s 
					INNER JOIN course as c on s.course_id=c.id 
					INNER JOIN classroom as r on s.r_id = r.id 
					INNER JOIN `user` as u on s.t_id=u.id";
			if($where == " WHERE "){
				$sql .=$where." s.status != 9 ";
			}else{
				$sql .=$where." AND s.status != 9 ";
			}
			
			$total =count(R::getAll($sql));
			if(isset($map['limit']) && isset($map['offset'])){
				$start = $map['offset'];
				$limit = "limit {$start},{$map['limit']}";
				$sql .= $limit;
			}
			$data = R::getAll($sql);
			$arr = array(
				'total'=>$total,
				'data'=>$data
			);
			return $arr;
		}
		
		function updateSchedule($map){
			$data = array();
			foreach ($map as $key => $value) {
				if($key !="id"){
					array_push($data,"{$key}=>{$value}");
				}
			}
			foreach ($map['id'] as $k => $id) {
				$this->_db->update('schedule',$data,$id);
			}
		}

		function getCourse(){
			return $this->_db->find('course');
		}
	
		function addSchedules($data){
			$calender = $data['calender'];
			$course = $data['course'];
			$tmpcourse = array();
			foreach ($course as $key => $value) {
				$tmpcourse[$value['name']] = $value['id'];
			}

			foreach ($calender as $k => $v) {
				if(!isset($v['editable'])){
					$tmp['ts_start'] = strtotime($v['start']);
					$tmp['ts_end'] = strtotime($v['end']);
					$tmp['course_id'] = $tmpcourse[$v['title']];
					$tmp['g_id'] = $data['g_id'];
					$tmp['r_id'] = $data['r_id'];
					$tmp['t_id'] = $data['t_id'];
					$id = $this->addSchedule($tmp);
				}
			}
			if($id) return $id;
		}

		function getGrade($map = array()){
			$where = "WHERE 1=1 ";
			$sql = "select * from grade ";
			foreach($map as $key=>$value){
				$where .= "AND {$key}={$value}";
			}
			return R::getAll($sql);
		}

		function getRoom($map = array()){
			$where = "WHERE 1=1 ";
			$sql = "select * from classroom ";
			foreach($map as $key=>$value){
				$where .= "AND {$key}={$value}";
			}
			return R::getAll($sql);
		}
	}
