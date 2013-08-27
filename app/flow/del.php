<?php
	require_once  K_ROOT_PATH.'protect/rb.php';
	require_once  K_ROOT_PATH."app/".M."/task.class.php";
	class module_flow_del{
		private $_db;
		function run(){			
			$f = $_GET['f'];
			if($f=='add'){
				$this->add();
			}else{
				$this->get();
			}
		}
		
		function add(){
			$uid = $_SESSION['user']['id'];
			$task = new task();
			$array = array(
				'rids'=>$_POST['rids'],
				'content'=>$_POST['content'],
				'uid'=>$uid
			);
			$task->add($array);
			header("Location: ?m=flow&a=list");
		}
		
		function get(){
			$uid = $_SESSION['user']['id'];
			$result = R::getAll( "select id as recid,rids,percent,content from flow where rids = {$uid} and status=1 order by id desc");
			foreach($result as $key => $value){
				$result[$key]['operate'] = "<a href= '?m=flow&a=update&fid={$value['recid']}' >修改进度</a>";
			}

			$arr = array(
						'total'=>count($result),
						'recordsPerPage'=>'13',
						'records'=>$result
			);
			echo json_encode($arr);
		}
	}
