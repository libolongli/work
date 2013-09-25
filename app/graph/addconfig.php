<?php
	class module_graph_addconfig{
		function run(){
			$html = $this->beforeDisplay();
			$t = new tpl();
			$t->assign('html',$html);
			$t->assign('title','创建配置文件');
			$t->display('addconfig');
		}

		function beforeDisplay(){
			$step = isset($_GET['step']) ? $_GET['step'] : 1;
			$gid = isset($_GET['gid']) ? $_GET['gid'] : 0;
			if($_POST){
				if($step == 1){
					$id = k::load('api')->load('graph','graph')->storeGraph($_POST);
					$url = k::url('graph/addconfig',array('gid'=>$id,'step'=>2));
					header("Location: $url");
				}

				if($step == 2){
					$graph = k::load('api')->load('graph')->getGraphById($gid);
					$ltable = $_POST['ltable'];
					$mtable = $graph['mtable'];
					$map = array();
					foreach ($ltable as $key => $value) {
						array_push($map,array($mtable,$value));
					}
					$tablejoin = k::load('api')->load('config','graph')->tablejoin($map);
					k::load('api')->load('graph','graph')->updateGraph(array('ltable'=>serialize($tablejoin)),$gid);
					$url = k::url('graph/addconfig',array('gid'=>$gid,'step'=>3));
					header("Location: $url");
				}

				if($step == 3){
					$field = join(",",$_POST['field']);
					k::load('api')->load('graph','graph')->updateGraph(array('field'=>$field),$gid);
					echo $url = k::url('graph/addconfig',array('gid'=>$gid,'step'=>4));exit;
				}
			}
			
			$arr1 = array();
			
			$data = k::load('api')->load('config','graph')->getAlltable();
			
			if($step == 1){ 
				$table = array_keys($data);
				foreach ($table as $key => $value) {
					$tmp = array();
					$tmp['id'] = $value;
					$tmp['name'] = $value;
					array_push($arr1, $tmp);
				}

				$html = k::load('api')->load('form','form')->setSelect(array('title'=>'选择主表','name'=>'mtable','data'=>$arr1));
			}
			
			if($step == 2){
				$graph = k::load('api')->load('graph')->getGraphById($gid);
				$table = array_keys($data[$graph['mtable']]);
				foreach ($table as $key => $value) {
					$tmp = array();
					$tmp['id'] = $value;
					$tmp['name'] = $value;
					array_push($arr1, $tmp);
				}
				$html = k::load('api')->load('form','form')->setCheckbox(array('title'=>'选择关联表','name'=>'ltable[]','data'=>$arr1));
			}
			
			if($step == 3){
				$t = new tpl();
				$graph = k::load('api')->load('graph')->getGraphById($gid);
				$ltable = unserialize($graph['ltable']);
				$tmp = array_keys($ltable);
				array_unshift($tmp,$graph['mtable']); 
				$tableall = array();
				foreach ($tmp as $key => $value) {
					$tableall[$value] = k::load('api')->load('config','graph')->tableDetail($value); 
				}
				$t->assign('tableall',$tableall);
				$t->display('stat');
				exit;
			}

			if($step==4){
					echo 1;exit;
			}

			return $html;
		}

	}
