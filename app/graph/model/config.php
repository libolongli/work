<?php
	class k_model_graph_config{
		function getTable($table){
			return $this->tableDetail($table);
		}

		function tableDetail($table){
			$data = array(
				'kc_course_pack'=>array(
					'pack_name'=>'课程包名称',
					'pack_content'=>'课程包内容',
					'pack_price'=>'课程包价格',
					'pack_hit'=>'课程包点击量',
					'pack_courseNum'=>'课程数量',
					'isnum'=>'pack_price,pack_hit,pack_courseNum',
				),
			);
			return $data[$table];
		}
	}