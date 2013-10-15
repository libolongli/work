<?php
	class module_graph_api_factory_avg{
		
		function avg($data,$field){
			if($data && $field){
				$total = k::load('api')->factory('graph','sum')->sum($data,$field);
				//k::load('api')->factory('graph',$v)->$v($data,$key);
				$avg = $total/count($data);
				return $avg;
			}else{
				return 0;
			}
		}
	
	}
