<?php
	require_once  K_ROOT_PATH.'rb.php';
	R::setup('mysql:host=localhost;dbname=project','root','root'); 
	class module_msg_del{
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
			$rids = $_POST['rids'];
			$uid = 1;
			$content = $_POST['content'];
			if(is_array($rids)){
				$rids = implode(",", $rids);
			}
			$now = $_SERVER['REQUEST_TIME'];						
			$msg = R::dispense('msg');
			$msg->uid=$uid;
			$msg->rids=$rids;
			$msg->content=$content;
			$msg->ts_created=$now;
			$msg->ts_updated=$now;
			$msg->status=1;
			$id = R::store($msg);
			foreach (explode(",", $rids) as $key => $value){
				$msg_log = R::dispense('msg_log');
				$msg_log->uid = $uid;
				$msg_log->rid = $value;
				$msg_log->ts_created = $now;
				R::store($msg_log);
			}
			header("Location: http://www.project.com/?m=msg&a=list");
		}
		
		function get(){
			$result = R::getAll( 'select * from msg order by id desc');
			$arr = array(
						'total'=>count($result),
						'recordsPerPage'=>'13',
						'records'=>$result
			);
			echo json_encode($arr);
		}
	}
