<?php
	class module_op_update{
		function run(){
			$html = $this->beforeDisplay();
			$html = join(",",$html);
			$t = new tpl();
			$t->assign('html',$html);
			$t->assign('title','修改页面');
			$t->display('update');
		}

		function beforeDisplay(){
			$table = isset($_GET['table']) ? $_GET['table'] :'';
			$id = isset($_GET['id']) ? $_GET['id'] :'';
			
			if($_POST){
				$type = k::load('update','op')->getType($table);	
				$map = array();
				foreach($type as $key=>$value){
					if($_POST[$key]){
						if($value['type']=='Calender'){
							$map[$key] = strtotime($_POST[$key]);
						}else{
							$map[$key] = $_POST[$key];
						}
					}
				}	
				$lid = k::load('update','op')->update($map,$table,$id);
				if($lid) echo "修改成功!";exit;
			}

			
			if($id && $table){
				$row = k::load('update','op')->getRow($table,$id);
				$type = k::load('update','op')->getType($table);
				$html = array();
				foreach ($type as $key => $value) {
					$type = $value['type'];
					$f = 'set'.$value['type'];
					if($type=='Select'){
						$data = k::load('update','op')->getSelectInfo($value['link_table']);
						$html[]=k::load('form','form')->$f(array('name'=>$key,'tip'=>'请输入正确的格式','title'=>$value['title'],'data'=>$data));
					}elseif($type=='Calender'){
						$html[]=k::load('form','form')->$f(array('name'=>$key,'tip'=>'请输入正确的格式','title'=>$value['title'],'id'=>"calender".rand(1,10000)));
					}else{
						$html[]=k::load('form','form')->$f(array('name'=>$key,'tip'=>'请输入正确的格式','title'=>$value['title']));
					}
				}
				return $html;
			}

		}
	

	}
