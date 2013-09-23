<?php
	class module_op_add{
		function run(){
			$html = $this->beforeDisplay();
			$html = join(",",$html);
			$t = new tpl();
			$t->assign('html',$html);
			$t->assign('title','添加页面');
			$t->display('update');
		}

		function beforeDisplay(){
			$table = isset($_GET['table']) ? $_GET['table'] :'';
			
			if($_POST){
				$type = k::load('api')->load('update','op')->getType($table);	
				$map = array();
				foreach($type as $key=>$value){
					if($_POST[$key]!=''){
						if($value['type']=='Calender'){
							$map[$key] = strtotime($_POST[$key]);
						}else{
							$map[$key] = $_POST[$key];
						}
					}
				}	
				$lid = k::load('api')->load('update','op')->add($map,$table);
				if($lid) echo "添加成功!";exit;
			}

			
			if($table){
				$type = k::load('api')->load('update','op')->getType($table);
				$html = array();
				foreach ($type as $key => $value) {
					$type = $value['type'];
					$f = 'set'.$value['type'];
					if($type=='Select'){
						if(isset($value['data'])){
							$data = $value['data'];
						}else{
							$data = k::load('api')->load('update','op')->getSelectInfo($value['link_table']);
						}
						$html[]=k::load('api')->load('form','form')->$f(array('name'=>$key,'tip'=>'请输入正确的格式','title'=>$value['title'],'data'=>$data));
					}elseif($type=='Calender'){
						$html[]=k::load('api')->load('form','form')->$f(array('name'=>$key,'tip'=>'请输入正确的格式','title'=>$value['title'],'id'=>"calender".rand(1,10000)));
					}else{
						$html[]=k::load('api')->load('form','form')->$f(array('name'=>$key,'tip'=>'请输入正确的格式','title'=>$value['title']));
					}
				}
				return $html;
			}

		}
	

	}
