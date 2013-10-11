<?php
	class module_graph_handadd{
		function run(){
			$this->beforeDisplay();
			$html = array();
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'填写主表','name'=>'mtable'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'关联表相关信息','name'=>'ltable',
				'tip'=>'请依次填写关联表的表名,和主表关连字段,主表被关连字段并用因为逗号分隔'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'分组','name'=>'g'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'WHERE条件','name'=>'w'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'显示的字段','name'=>'field','tip'=>'请用逗号分隔'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'求和的字段','name'=>'sum','tip'=>'请用逗号分隔'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'求平均值的字段','name'=>'avg','tip'=>'请用逗号分隔'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'求最大值的字段','name'=>'max','tip'=>'请用逗号分隔'));
			$html[] = k::load('api')->load('form','form')->setInput(array('title'=>'求最小值的字段','name'=>'min','tip'=>'请用逗号分隔'));

			$html = join(",",$html);
			$t= new tpl();
			$t->assign('title','手动配置');
			$t->assign('html',$html);
			$t->display('handadd');
		
		}

		function beforeDisplay(){
			if($_POST){
				$data = array();
				$data['mtable'] = $_POST['mtable'];
				$data['field'] = $_POST['field'];
				$field = array();
				if(isset($_POST['sum']) && $_POST['sum']){
					foreach (explode(',',$_POST['sum']) as $key => $value) {
						if($value) $field[$value] = 'sum';
						
					}
				}

				if(isset($_POST['avg']) && $_POST['avg']){
					foreach (explode(',',$_POST['avg']) as $key => $value) {
						if($value){
							if(isset($field[$value])){
								$field[$value].=',avg';
							}else{
								$field[$value]='avg';
							}
						}
					}
						
				}

				if(isset($_POST['max']) && $_POST['max']){
					foreach (explode(',',$_POST['max']) as $key => $value) {
						if($value){
							if(isset($field[$value])){
								$field[$value].=',max';
							}else{
								$field[$value]='max';
							}
						}
					}
				}

				if(isset($_POST['min']) && $_POST['min']){
					foreach (explode(',',$_POST['min']) as $key => $value) {
						if($value){
							if(isset($field[$value])){
								$field[$value].=',min';
							}else{
								$field[$value]='min';
							}
						}
					}
				}

				if(isset($_POST['ltable']) && $_POST['ltable']){
					$tmp = explode(',', $_POST['ltable']);					
					$data['ltable'][$tmp['0']] =array('on'=>$tmp[1],'ontable'=>$_POST['mtable'],'join'=>'inner join','on1'=>$tmp['2']);
 					$data['ltable'] = serialize($data['ltable']);
 				}
 				$data['samm'] = serialize($field);
 				$data['g'] = isset($_POST['g']) ? $_POST['g'] :'';
 				$data['w'] = isset($_POST['w']) ? $_POST['w'] :'';
 				$data['samm'] = serialize($field);
 				$data['status']=1;
				$id = k::load('api')->load('graph','graph')->storeGraph($data);
				
				if($id){
					$url = k::url('graph/configlist');
					echo "添加成功,到<a href='$url'>列表页</a>";exit
				}else{
					$url = k::url('graph/handadd');
					echo "添加失败,<a href='$url'>重新添加</a>";exit
				}
			}
		}
	}