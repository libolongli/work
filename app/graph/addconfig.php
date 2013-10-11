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
					//print_r($map);
					$tablejoin = k::load('api')->load('config','graph')->tablejoin($map);
					k::load('api')->load('graph','graph')->updateGraph(array('ltable'=>serialize($tablejoin),'ltablename'=>join(',',$ltable)),$gid);
					$url = k::url('graph/addconfig',array('gid'=>$gid,'step'=>3));
					header("Location: $url");
				}

				if($step == 3){
					$field = $_POST['field'];
					$arr = array();
					foreach ($field as $key => $value) {
						$tmp = explode(".", $value);
						array_push($arr, $tmp['1']);
					}
					k::load('api')->load('graph','graph')->updateGraph(array('field'=>join(',',$arr)),$gid);
					echo $url = k::url('graph/addconfig',array('gid'=>$gid,'step'=>4));exit;
				}

				if($step == 4){
					$tmp = array();
					foreach ($_POST as $key => $value) {
						$tmp[$key] = join(',',$value);
					}
					$samm = serialize($tmp);
					//print_r($samm);exit;
					k::load('api')->load('graph','graph')->updateGraph(array('samm'=>$samm),$gid);
					$url = k::url('graph/addconfig',array('gid'=>$gid,'step'=>5));
					header("Location: $url");
				}

				if($step == 5){
					$arr = array();
					foreach ($_POST as $key => $value) {
						if($value) $arr[$key] = $value;
					}
					$arr2 =array();
					foreach ($arr as $key => $value) {
						$tmp = explode('*', $key);
						if(isset($arr2[$tmp['0']])){
							array_push($arr2[$tmp['0']],$value);
						}else{
							$arr2[$tmp['0']]  = array();
							array_push($arr2[$tmp['0']],$value);
						}
					}
					$arr3 = array();
					foreach ($arr2 as $key => $value) {
						if(count($value)==2){
							if(strpos($value['0'],"%")){
								$str = str_replace('like','', $value['0']);
								$str = trim(str_replace('*', $value['1'], $str));
								$str = $key." like '".$str."'";
							} 
							else {
								$str = $key." ".$value['0'];
								$str .=" '".$value['1']."'";
							}
							$arr3[] = $str;
						}else{
							unset($arr2[$key]);
						}
					}
					$where = join(" AND ",$arr3);
					//echo $where;exit;
					k::load('api')->load('graph','graph')->updateGraph(array('w'=>$where),$gid);
					$url = k::url('graph/addconfig',array('gid'=>$gid,'step'=>6));
					header("Location: $url");
				}

				if($step == 6){
					if($_POST){
						k::load('api')->load('graph','graph')->updateGraph(array('g'=>$_POST['group']),$gid);
						$url = k::url('graph/configlist');
						header("Location: $url");
					}
				}
			}
			
			$arr1 = array();
			
			$data = k::load('api')->load('config','graph')->getAlltable();
			
			//选择主表
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
			
			//选择关联表
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
			//选择字段
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

			//选择要统计的字段
			if($step==4){
				 $graph = k::load('api')->load('graph')->getGraphById($gid);
				 $ltable = unserialize($graph['ltable']);
				 $tmp = array_keys($ltable);
				 array_unshift($tmp,$graph['mtable']); 
				 $html =  $arr = array();
				 $data = array(

					 		array('id'=>'sum','name'=>'sum'),
					 		array('id'=>'avg','name'=>'avg'),
					 		array('id'=>'max','name'=>'max'),
					 		array('id'=>'min','name'=>'min'),
					 	);


				 foreach ($tmp as $key => $value) {
				 	 $arr[$value] = k::load('api')->load('config','graph')->tableIntFileds($value);
				 }
				 foreach ($arr as $key => $value) {
				 	if($value){
				 		foreach ($value as $k => $v) {
				 			$name = $k."[]";
				 			$html[] = k::load('api')->load('form','form')->setCheckbox(array('title'=>$v,'name'=>$name,'data'=>$data));
				 		}
				 	}
				 }

				  $html = join(',',$html);
			}

			if($step == 5){
					$graph = k::load('api')->load('graph')->getGraphById($gid);
					$ltable = unserialize($graph['ltable']);
					$tmp = array_keys($ltable);
					array_unshift($tmp,$graph['mtable']); 
					$tableall = array();
					foreach ($tmp as $key => $value) {
						$tableall[$value] = k::load('api')->load('config','graph')->tableDetail($value); 
					}
					$html = array();
					$data = array(
						array('id'=>'=','name'=>'等于'),
						array('id'=>'like *%','name'=>'开始于'),
						array('id'=>'like %*','name'=>'结束于'),
						array('id'=>'like %*%','name'=>'包含'),
						array('id'=>'>','name'=>'大于'),
						array('id'=>'<','name'=>'小于'),
					);
					foreach ($tableall as $key => $value) {
						foreach ($value as $k => $v) {
							//$html[] = k::load('api')->load('form','form')->setInput(array('title'=>$v,'name'=>$k));
				 			$html[] = k::load('api')->load('form','form')->setSelect(array('title'=>$v,'name'=>$k."*select",'data'=>$data));
							$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'值','name'=>$k."*value"));
						}
					}
					$html = join(',',$html);
			}	


			if($step == 6){
				$graph = k::load('api')->load('graph')->getGraphById($gid);
				$ltable = unserialize($graph['ltable']);
				$tmp = array_keys($ltable);
				array_unshift($tmp,$graph['mtable']); 
				$tableall = array();
				foreach ($tmp as $key => $value) {
					$tableall[$value] = k::load('api')->load('config','graph')->tableDetail($value); 
				}
				$data = array();
				foreach ($tableall as $key => $value) {
					foreach ($value as $k => $v) {
						$tmp = array();
						$tmp['id'] = $k;
						$tmp['name'] = $v;
						array_push($data,$tmp);
					}

				}
				$html = k::load('api')->load('form','form')->setSelect(array('title'=>'请选择group字段','name'=>'group','data'=>$data));
			}

			return  $html;
		}

	}
