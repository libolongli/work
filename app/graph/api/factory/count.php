<?php
	class module_graph_api_factory_count{
		
		function count($data,$field,$search){
			if($data && $field){
				$count = 0;
				foreach ($data as $key => $value) {
					if($value[$field]==$search) $count++;
				}
				return $count;
			}else{
				return 0;
			}
		}
	
	}
