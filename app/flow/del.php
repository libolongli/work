<?php
	//require_once  K_ROOT_PATH.'protect/rb.php';
	require_once  K_ROOT_PATH."app/".M."/model/task.php";
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
			$task = new k_model_flow_task();
			$array = array(
				'rids'=>$_POST['rids'],
				'content'=>$_POST['content'],
				'uid'=>$uid,
				'transmit'=>$_POST['transmit'],
			);
			$task->add($array);
			header("Location: ?m=flow&a=list");
		}
		
		function get(){
			$uid = $_SESSION['user']['id'];
			$result = R::getAll( "select id as recid,rids,percent,content from flow where rids = {$uid} and status=1 order by id desc");
			foreach($result as $key => $value){
				$result[$key]['operate'] = "<a href= '?m=flow&a=update&fid={$value['recid']}' >修改进度</a>   ";
				$result[$key]['operate'] .= "<a href='javascript:void(0);return false;' onclick=checkinfo('?m=flow&a=info&id={$value['recid']}')>查看</a>  ";
				$result[$key]['operate'] .= "<a href='javascript:void(0);return false;' onclick=checkinfo('?m=flow&a=send&id={$value['recid']}')>转发</a>  ";
			}
			
			$arr = array(
						'total'=>count($result),
						'recordsPerPage'=>'13',
						'records'=>$result
			);
			echo json_encode($arr);
		}
	}
