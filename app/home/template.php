<?php
	class module_home_template{
		public function run(){
			$f = $_GET['url'];
			if($_POST){
				$this->$f($_POST);
			}
			if($f=='grid_tree_json') $this->grid_tree_json();
			
			$f=	str_replace('.html','',$f);
				
			k::tpl()->display($f);
		}
		
		public function c_from($data){
			$consult = R::dispense('consult');
			$consult->rpeople=$data['rpeople'];
			$consult->applydate=strtotime($data['applydate']);
			$consult->studynum=$data['studynum'];
			$consult->realname=$data['realname'];
			$consult->englishname=$data['englishname'];
			$consult->card=$data['card'];
			$consult->score=$data['score'];
			$consult->comemsg=$data['comemsg'];
			$consult->status=$data['status'];
			$consult->class=$data['class'];
			$consult->course=$data['course'];
			$consult->introduce=$data['introduce'];
			$id= R::store($consult);
			if($id){
				header("Location: ?m=home&a=template&url=grid-tree");
			}
		}
		
		public function grid_tree_json(){
			$data=  R::getAll( 'select * from consult order by id desc' );
			$total = count($data);
			$array = array(
				'total'=>count($data),
				'page'=>0,
				'records'=>$data
			);
			
			echo json_encode($array);exit;
		}
	}
