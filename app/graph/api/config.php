<?php
	class module_graph_api_config{
		function getTable($table){
			return $this->tableDetail($table);
		}

		/**
		*根据表名返回表的字段
		*@param string 
		*@return array
		*
		*
		*/
		function tableDetail($table){
			$data = array(
				'kc_course_pack'=>array(
					'pack_name'=>'课程包名称',
					'pack_content'=>'课程包内容',
					'pack_price'=>'课程包价格',
					'pack_hit'=>'课程包点击量',
					'pack_courseNum'=>'课程数量',
					'pack_shortIntro'=>'课程包简介',
					'pack_teacherIntro'=>'教师简介'
				),
				'kc_course'=>array(
					'course_name'=>'课程名称',
					'course_teacherId'=>'教师ID',
					'course_intro'=>'课程价格',
					'course_hit'=>'课程点击量',
				),
				'kc_course_pack_element'=>array(
					'element_packId'=>'课程包ID',
					'element_courseId'=>'课程ID',
				),
			);
			return $data[$table];
		}


		function tableIntFileds($table){
			$data = array(
				'kc_course_pack'=>array(
					'pack_price'=>'课程包价格',
					'pack_hit'=>'课程包点击量',
					'pack_courseNum'=>'课程数量',
				),
				'kc_course'=>array(
					'course_intro'=>'课程价格',
					'course_hit'=>'课程点击量',
				),
				
			);

			return isset($data[$table]) ? $data[$table] :array();
		}
		/**
		*根据表名和表的字段返回表的title
		*
		*@param string 
		*@return array
		*
		*
		*/

		function getFieldName($table,$field){
			$table  = $this->tableDetail($table);
			return $table[$field];
		}

		function getAlltable(){
			return array(
				'kc_course_pack'=>array(
					'kc_course_pack_element'=>'pack_id',

				),
				'kc_course_pack_element'=>array(
					'kc_course_pack'=>'element_packId',
					'kc_course'=>'element_courseId',
				),
				'kc_course'=>array(
					'kc_course_pack_element'=>'course_id',
				),
			);
		}

		/**
		* 传入表名数组,返回表关联的信息
		*$map = array(
		*		array('kc_course_pack','kc_course_pack_element'),  第一个是主表,第二个是被关联的表
		*		array('kc_course_pack_element','kc_course')
		*	);
		*
		*$return = Array
		*(
	 	*   [kc_course_pack_element] => Array
	 	*      (
	    *       	[on] => element_packId     //被关联表的关联字段
	    *       	[ontable] => kc_course_pack //主表表名
	    *       	[join] => inner join        //join方式
	    *       	[on1] => pack_id			//主表关联字段
	    * 		)
		*
	 	*   [kc_course] => Array
	 	*      (
	  	*       	[on] => course_id
	    *       	[ontable] => kc_course_pack_element
	    *       	[join] => inner join
	    *      		[on1] => element_courseId
	    * 		)
		*
		*)
		*@param array $map
		*@return array
		*
		*/

		function tablejoin($map = array()){
			$re = array();

			$table = $this->getAlltable();

			foreach ($map as $key => $value) {
				
				$t1 = $value['0'];
				$t2 = $value['1'];

				$re[$t2] = array(
					'on'=>$table[$t2][$t1],
					'ontable'=>$t1,
					'join'=>'inner join',
					'on1'=>$table[$t1][$t2],
				);
			}
			
			return $re;

		}
	}