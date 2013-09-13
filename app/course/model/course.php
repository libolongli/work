<?php
	class k_model_course_course{
		private $_db;
		function __construct(){
			$this->_db = new db();

		}

	/**
	 * 通过传入的表名和数据将$map里面的信息写入$table中
	 *
	 * @param  string $table  tablename 
	 * @param  array $map   category
	 * @return int 	
	 */
		
		function add($table,$map){
			$data = array();
			foreach ($map as $key => $value) {
				array_push($data, "{$key}=>{$value}");
			}
			return $this->_db->add($table,$data);
		}

		/**
		 * 往课程表里面添加数据
		 *
		 * @param  array $map   
		 * @return int 	
		 */

		function addSchedule($map=array()){
			$data = array("course_id=>{$map['course_id']}","t_id=>{$map['t_id']}","r_id=>{$map['r_id']}",
            	"g_id=>{$map['g_id']}","ts_start=>{$map['ts_start']}","ts_end=>{$map['ts_end']}");
            return $this->_db->add('schedule',$data);
		}

		/**
		 * 通过map条件返回课程表的数据,主要用于ajax加载列表用的
		 * 
		 * @param  array $map   
		 * @return array  
		 */
		function getSchedule($map = array()){
			$where = " WHERE ";
			$arr1 = array();
			$ws = '';

			//当用户执行搜索的时候搜索条件
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
				$ws .= "(".join(" ".$map['search']['logic']." ",$arr1).")";
			}

			//其他条件
			foreach ($map as $key => $value) {
				if(($key!='offset') && ($key!='limit') && ($key!='search')){
					if($ws){
						$ws .= " AND {$key}={$value} ";
					}else{
						$ws .= " {$key}={$value} ";
					}
					
				}
			}

			$sql = "SELECT s.id as recid,c.name as course_name,r.name as room_name,u.`user`,
					FROM_UNIXTIME(ts_start,'%Y-%m-%d %H:%i') as ts_start,
					FROM_UNIXTIME(ts_end,'%Y-%m-%d %H:%i') as ts_end from schedule as s 
					INNER JOIN course as c on s.course_id=c.id 
					INNER JOIN classroom as r on s.r_id = r.id 
					INNER JOIN `user` as u on s.t_id=u.id";
			if($ws){
				$sql .=$where.$ws." AND s.status != 9 ";
			}else{
				$sql .=$where." s.status != 9 ";
			}
			
			$total =count(R::getAll($sql));
			if(isset($map['limit']) && isset($map['offset'])){
				$start = $map['offset'];
				$limit = "limit {$start},{$map['limit']}";
				$sql .= $limit;
			}
			$data = R::getAll($sql);
			$map['offset'] =isset($map['offset']) ? $map['offset'] :0; 
			$map['limit'] =isset($map['limit']) ? $map['limit'] :1; 
			$arr = array(
				'total'=>$total,
				'page'=>$map['offset']/$map['limit'],
				'records'=>$data
			);
			return $arr;
		}
		
		/**
		 * 通过map条件修改课程表
		 *
		 * @param  array $map   
		 * @return void  
		 */

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

		/**
		 * 获取所有的课程
		 *
		 * @return array 
		 */

		function getCourse(){
			return $this->_db->find('course');
		}
	
		/**
		 * 通过data添加课程表,主要是用来处理日历插件异步请求过来的数据
		 *
		 * @param  array $data   
		 * @return int  
		 */

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

		/**
		 * 通过map条件拿取班级
		 *
		 * @param  array $map   
		 * @return array  
		 */

		function getGrade($map = array()){
			$where = "WHERE 1=1 ";
			$sql = "select * from grade ";
			foreach($map as $key=>$value){
				$where .= "AND {$key}={$value}";
			}
			return R::getAll($sql);
		}

		/**
		 * 通过map条件拿取教室
		 *
		 * @param  array $map   
		 * @return array  
		 */

		function getRoom($map = array()){
			$where = "WHERE 1=1 ";
			$sql = "select * from classroom ";
			foreach($map as $key=>$value){
				$where .= "AND {$key}={$value}";
			}
			return R::getAll($sql);
		}
	}
