<?php
	class module_graph_api_factory_max{
		
		function max($data,$field){
			if($data && $field){
				$max = 0;
				foreach ($data as $key => $value) {
					if($value[$field]>$max) $max = $value[$field];
				}
				return $max;
			}else{
				return 0;
			}
		}
	}
