<?php
	class module_graph_index{
		function run(){
			$re = $this->beforeDisplay();
			$t = new tpl();
			$t->assign('field',$re['field']);
			$t->assign('data',$re['data']);
			$t->assign('samm',$re['samm']);
			$t->display('index');

		}

		function beforeDisplay(){

			$tablejoin  = array(
							array('kc_course_pack','kc_course_pack_element'),
							array('kc_course_pack_element','kc_course')
						);
			$table = k::load('api')->load('config','graph')->tablejoin($tablejoin);
			
			//print_r($table);exit;

			$re = array();
			$gid = 3;
			$graph = k::load('api')->load('graph')->getGraphById($gid);
			// print_r($graph);exit;
			$field = explode(",", $graph['field']);
			//print_r($field);exit;
			$re['field'] = $field;
			// echo 1;exit;
			$data = k::load('api')->load('graph')->getData($gid);

			$sammconfig = unserialize($graph['samm']);
			//print_r($sammconfig);exit;
			$sammfield = array();
			
			foreach ($sammconfig as $key => $value) {
				$sammfield[] = $key;
			}
			

			$samm = k::load('api')->load('graph')->getSamm($data,$sammconfig);
			$re['samm'] = $samm;
			// $sum  = k::load('api')->load('graph')->sum($data,'pack_price');
			// $avg  = k::load('api')->load('graph')->avg($data,'pack_price');
			// $max  = k::load('api')->load('graph')->max($data,'pack_price');
			// $min  = k::load('api')->load('graph')->min($data,'pack_price');
			$arr = array();
			foreach ($data as $key => $value) {
				foreach ($value as $k => $v) {
					if(!in_array($k, $field)){
						unset($data[$key][$k]);
					}
				
				}
				
			}
			$re['data'] = $data;
			return $re;
			// print_r($data);exit;
			// echo $samm."-----------".$sum."----------".$avg."------".$max."----".$min;exit;
			//print_r($samm);exit;
			//$count  = k::load('graph')->count($data,'pack_price','400');

			
			// echo $sum."-".$avg."-".$max."-".$avg."-".$count;exit;


			// $step = isset($_GET['step']) ? $_GET['step'] : 1;
			// if($step == 1){
			// 	if($_POST){
			// 		$id = k::load('graph')->storeGraph($_POST);
			// 		if($id){
			// 			$url = $_SERVER['REQUEST_URI']."&step=2&gid=".$id;
			// 			header("Location: $url");
			// 		}
			// 	}else{
			// 		$input = array();
			// 		$input[] = k::load('form','form')->setInput(array('name'=>'name','title'=>'报表名称','tip'=>'请填写名称'));
			// 		$input[] = k::load('form','form')->setTextarea(array('name'=>'intro','title'=>'报表介绍','tip'=>'请填写介绍'));
			// 		$input[] = k::load('form','form')->setSelect(array('name'=>'category','title'=>'报表类型',
			// 			'data'=>array(0=>array('id'=>1,'name'=>'类型1'),1=>array('id'=>2,'name'=>'类型2'))));
			// 		return $input;
			// 	}

			// 	$table = array('kc_course_pack');

			// 	return $table;

			// }

			// if($step ==2){
			// 	if($_POST){
			// 		$id = k::load('graph')->updateGraph(array('ltable'=>$_POST['ltable']),$_GET['gid']);
			// 		if($id){
			// 			$url = $_SERVER['REQUEST_URI']."&step=3&gid=".$id;
			// 			header("Location: $url");
			// 		}
			// 	}else{
			// 		$input = array();
			// 		$input[] = k::load('form','form')->setCheckbox(array('name'=>'ltable[]','title'=>'表名称',
			// 			'data'=>array(0=>array('id'=>'kc_course_pack','name'=>'课程包'),1=>array('id'=>'kc_course','name'=>'课程'))));
			// 		return $input;
			// 	}
			// 	// $data = k::load('config','graph')->getTable('kc_course_pack');
			// 	// $isnum = array_pop($data);
			// 	// $field = array();
			// 	// foreach($data as $k => $v){
			// 	// 	array_push($field, $k);
			// 	// }	
			// 	//$GLOBALS['field'] = $field;
			// 	//return $field;

			// }

			// if($step == 3){
			// 	//echo 3;exit;
			// 	$data = k::load('config','graph')->getTable('kc_course_pack');
			// 	$isnum = array_pop($data);
			// 	$array = array();
			// 	foreach (explode(",", $isnum) as $k => $v) {
			// 		$array[$v] = "sum,avg,min,max";
			// 	}
			// 	$data = array('kc_course_pack'=>$array);
			// 	k::load('graph')->teamSql($data);
			// 	//return $array;
			// }

			// if($step ==4){

			// }

			//$field = for 
		}

}