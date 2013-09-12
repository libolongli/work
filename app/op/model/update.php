<?php
	class k_model_op_update{
		private $_db;
		function __construct(){
			$this->_db = new db();
		}
		// function getFiledType(){

		// }

		function getRow($table,$id){
			return   $this->_db->find($table,array('id'=>$id));
		}

		function getType($table){
			$return  = array();
			switch ($table) {
				case 'schedule':
					$return = array(
						'course_id'=>array(
							'type'=>'Select',
							'link_table'=>'course',
							'title'=>'课程名称',
						),
						't_id'=>array(
							'type'=>'Select',
							'link_table'=>'user',
							'title'=>'教师姓名',

						),
						'r_id'=>array(
							'type'=>'Select',
							'link_table'=>'classroom',
							'title'=>'教室',
						),
						'g_id'=>array(
							'type'=>'Select',
							'link_table'=>'grade',
							'title'=>'班级',
						),
						'ts_start'=>array(
							'type'=>'Calender',
							'title'=>'开始时间',
						),
						'ts_end'=>array(
							'type'=>'Calender',
							'title'=>'结束时间',
						),

					);
					break;
				case 'classroom':
					$return = array(
						'name'=>array(
							'type'=>"Input",
							'title'=>"房间名称"	
						)
					);
					break;
				case 'course':
					$return = array(
						'name'=>array(
							'type'=>"Input",
							'title'=>'课程名称'),
						'long'=>array(
							'type'=>'Input',
							'title'=>'课程时长'
							),
						'times'=>array(
							'type'=>'Input',
							'title'=>'课程次数',
						),
						't_id'=>array(
							'type'=>'Select',
							'title'=>'教师',
							'link_table'=>'user'
						),
					);
					break;
				case 'msg':
					$return = array(
						'content'=>array(
							'type'=>"Textarea",
							'title'=>'内容'),
						'ts_created'=>array(
							'type'=>'Calender',
							'title'=>'创建时间',
						),
						
					);
					break;
				case 'grade':
				$return = array(
					'name'=>array(
						'type'=>"Input",
						'title'=>'班级名称'),
				);
				break;

			}
			return $return;
		}

		function getSelectInfo($table){
			if($table=='user'){
				return R::getAll("Select id,user as name from {$table}");
			}
			return $this->_db->find($table);
		}

		function update($map,$table,$id){
			$data = array();
			foreach($map as $key => $value){
				$str = $key."=>".$value;
				array_push($data,$str);
			}
			return $this->_db->update($table,$data,$id);
		}
	}
