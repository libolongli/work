<?php
	class k_model_course_course{
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
	}
