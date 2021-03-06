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
			// print_r(unserialize($graph['ltable']));exit;
			if(!$graph) {
				$url = k::url('graph/addconfig');
				echo "<a href='{$url}' >去生成配置文件</a>";
				exit;
			};
			$re['tablename'] = $graph['ltablename'] ? $graph['mtable'].",".$graph['ltablename'] : $graph['mtable'] ; 
			$field = explode(",", $graph['field']);
			$re['field'] = $field;

			$data = k::load('api')->load('graph')->getData($gid);
			$sammconfig = unserialize($graph['samm']);
			$sammfield = array();
			foreach ($sammconfig as $key => $value) {
				$sammfield[] = $key;
			}
			//print_r($sammconfig);exit;
			$samm = k::load('api')->load('graph')->getSamm($data,$sammconfig);
			$re['samm'] = $samm;
			$arr = array();
			//print_r($re);exit;
			$re['data'] = $data;
			return $re;
		}

}