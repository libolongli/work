<?php
	class module_graph_api_factory_min{
	
		function min($data,$field){
			if($data && $field){
				$min = 0;
				foreach ($data as $key => $value) {
					if($value[$field]<$min) $min = $value[$field];
				}
				return $min;
			}else{
				return 0;
			}
		}
	}
