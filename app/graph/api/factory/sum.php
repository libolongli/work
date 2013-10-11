<?php
	class module_graph_api_factory_sum{	
		
		function sum($data,$field){
			if($data && $field ){
				$sum = 0;
				foreach ($data as $key => $value) {
					$sum += $value[$field];
				}
				return $sum;
			}else{
				return 0;
			}
		}
	}
?>