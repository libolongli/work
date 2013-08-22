<?php

	require_once 'db.class.php';
	/*
	 * @author libo
	 * date 2013-08-06
	 * update 2013-08-07
	 * 主要是完成信息发送和接收的接口
	 */
	class msg extends msg_db{
		public function __construct() {
        	$this->connect('localhost','root','root','project');
    	}
		//发送信息
		public function sendMessage($uid,$rids,$contents){		
			if(is_array($rids)){
				$rids = implode(",", $rids);
			}
			$now = $_SERVER['REQUEST_TIME'];			
			$sql = "INSERT INTO msg (uid,rids,contents,ts_created,ts_updated,status) VALUES";			
			$sql.= "({$uid},'{$rids}','{$contents}',{$now},{$now},1)";	
			$this->query($sql); 
			foreach (explode(",", $rids) as $key => $value){
				$sql = "INSERT INTO msg_log (uid,rid,ts_created) VALUES({$uid},{$value},$now)";
				$this->query($sql);
			}		
		}
		//获取信息
		//$where array()
		public function getMessage($where,$page=1,$limit=20,$sort= " DESC"){
			$sql = "SELECT * FROM msg_log WHERE 1=1 ";
			if($where){
				foreach ($where as $key => $value) {
					$sql .= "AND {$key}={$value} ";
				}
			}
			
			$sql .= " ORDER BY id {$sort} ";
			//如果指定$page 是0 则代表没有分页
			if($page){
				$limitstart = ($page-1)*$limit;
				$sql .="LIMIT ".$limitstart.",".$limit;
			}
			
			return array(
				'data' => $this->fetch_all($sql),
				'page' => $page,
				'limit' =>$limit
			);	
		}

	}
	//测试数据
	//$msg = new msg();
	//$msg->sendMessage(2, "3,4,5,67,8,8", "这是2次测试");
	//echo '发送成功!';
	//
	//$data = $msg->getMessage(array('uid'=>2,'rid'=>3));
	//print_r($data);exit;

