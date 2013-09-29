<?php
	class module_graph_index{
		function run(){
			$re = $this->beforeDisplay();
			$t = new tpl();
			$t->assign('field',$re['field']);
			$t->assign('samm',$re['samm']);
			$t->assign('data',$re['data']);
			$t->assign('tablename',$re['tablename']);
			$t->display('index');

		}

		function beforeDisplay(){
			$gid = isset($_GET['gid']) ? $_GET['gid'] :1 ;
			$graph = k::load('api')->load('graph')->getGraphById($gid);
			$re['tablename'] = $graph['ltablename'] ? $graph['mtable'].",".$graph['ltablename'] : $graph['mtable'] ; 
			$field = explode(",", $graph['field']);
			//print_r($field);exit;
			$re['field'] = $field;

			$data = k::load('api')->load('graph')->getData($gid);
			// print_r($data);exit;
			$sammconfig = unserialize($graph['samm']);
			$sammfield = array();
			foreach ($sammconfig as $key => $value) {
				$sammfield[] = $key;
			}
			//print_r($sammfield);exit;
			//print_r($data);exit;
			$samm = k::load('api')->load('graph')->getSamm($data,$sammconfig);
			$re['samm'] = $samm;
			$arr = array();
			$re['data'] = $data;
			return $re;
		}

}