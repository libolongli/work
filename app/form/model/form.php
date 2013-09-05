<?php
	class k_model_form_form{
		function getSelect($table,$cate){		
			$sql = "SELECT type_id as value,title as name FROM type where status =1 
			and tablename = '{$table}' and cate='{$cate}'";	
			$data = R::getAll($sql);
			$data = json_encode($data);		
			$select = " {type : 'select', name : '{$cate}', title : '{$cate}',tip : '请选择当前状态', datatype:'*', errormsg : '请选择正确的当前状态', 
													data : {$data}, doption : '--请选择--'}";	
			echo $select;													
		}
	}
