<?php
	class module_graph_api_graph{
		
		private $_db;
		private $data;
		
		function __construct(){
			$this->_db = new db();
		}
		

		function samm($field,$str){
			$s = array();
			foreach (explode(",", $str) as $key => $value) {
				$s[]= $value."(".$field.") as ".$field."_".$value;
			}
			return join(",",$s);
		}

		function storeGraph($map){
			$data = array();
			foreach ($map as $key => $value) {
				array_push($data, "{$key}=>{$value}");
			}
			return $this->_db->add('graph',$data);
		}

		function updateGraph($map,$id){
			$data = array();
			foreach ($map as $key => $value) {
				array_push($data, "{$key}=>{$value}");
			}
			return $this->_db->update('graph',$data,$id);
		}

		function getData($gid){
			$graph = $this->getGraphById($gid);
					$sql = "SELECT * FROM {$graph['mtable']}";
			$ltable = $graph['ltable'];
			//代表有关联表,实现表的关联
			if($ltable){
				$ltable=unserialize($ltable);
				foreach ($ltable as $key => $value) {
					$sql .=" {$value['join']} {$key} on {$value['ontable']}.{$value['on1']}={$key}.{$value['on']} ";
				}
			}

			if($graph['where']) $sql .= " WHERE ".$graph['where']." "; 

			if($graph['group']) $sql .= "GROUP BY ".$graph['group'];
			
			return R::getAll($sql);
		}

		function getGraphById($gid){
			$data =  $this->_db->find('graph',array('id'=>$gid));
			return $data['0'];
		}

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

		function avg($data,$field){
			if($data && $field){
				$total = $this->sum($data,$field);
				$avg = $total/count($data);
				return $avg;
			}else{
				return 0;
			}
		}

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

		function getSamm($data,$samm){
			$arr = array();
			foreach ($samm as $key => $value) {
				foreach (explode(",", $value) as $k => $v) {
					$arr[$key][$v]=$this->$v($data,$key);
				}
				
			}
			return $arr;
		}
	}