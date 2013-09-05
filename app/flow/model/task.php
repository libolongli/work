<?php
	class k_model_flow_task{
		private $_db;
		private $_config;
		private $_url;
		public function __construct($url = 'user/pay'){
			$this->_db = new db();
			$sql = "SELECT * FROM common_config where url = '{$url}' ";
			$this->_config = R::getAll($sql);
		}
		
		/*
			$map = array(
				'uid' =>1
				'rids'=> 2,3,4...'
			)
		*/

		public function init($url){
			$this->_db = new db();
			$sql = "SELECT * FROM common_config where url = '{$url}' ";
			$this->_config = R::getAll($sql);
		}	
		
		public function add($map = array()){
			foreach($this->_config as $key =>$value){
				if($value['active']){
					$format = $value['format'];
					if(!$map['transmit']){
						foreach(explode(',',$value['variable']) as $k =>$v){
							$format = str_replace('{'.$v.'}', $map[$v], $format);
						}
					}else{
						$format = $map['content'];
					}
					
					
					$now = time();								
					if(!isset($map['rids']))  $map['rids']=$value['rids'];
					if(!isset($map['uid']))  $map['uid']=1;
					foreach (explode(',', $map['rids']) as $key => $value) {
						$data_flow = array("uid=>{$map['uid']}","rids=>{$value}","content=>{$format}","ts_created=>{$now}","ts_updated=>{$now}","status=>1");
						//$data_log = array("uid=>{$map['uid']}","rid=>{$value}","ts_created=>{$now}","ts_updated=>{$now}","fleg=>1","comment=>'新的工作流'");					
						$this->_db->insertRecord('flow',$data_flow);
						//$this->_db->insertRecord('flow_log',$data_log);
					}
				}
			}	
		}

		/**
			$map = array('percent'=>90,'id'=>1)
		*/
		public function update($map){
			$tmp = array();
			$map['ts_updated']=time();
			if(($map['status']==9) && $map['id']){
				$info = k::load('flow')->getFlowById($map['id']);
				$uid = k::load('user','user')->get_uid();
			}
			foreach($map as $k => $v){
				if(($k!='id') &&($k!='m') &&($k!='a') ){
					$tmp[] = "{$k}='{$v}'";
				}
			}
			$value  = join(',',$tmp);
			if(is_array($map['id'])) $map['id'] = join(",",$map['id']);

			$sql = "UPDATE flow set {$value} where id in({$map['id']})";
			R::exec($sql);
		}

		/**
			update config file
		*/
		public function updateConfig($map = array()){
			$sql = "UPDATE common_config set ";
			$arr = array();
			foreach ($map as $key => $value) {
				$arr[]= "{$key}='{$value}'";
			}
			$sql .= implode(",", $arr);
			$sql .= "where url= 'user/pay' ";
			R::exec($sql);
		}


		public function get($map=array()){
			$sql = "SELECT f.* FROM flow_log as l INNER JOIN flow as f on l.ts_created = f.ts_created ";
			$totalsql = "SELECT count(*) as total  FROM flow_log as l INNER JOIN flow as f on l.ts_created = f.ts_created ";
			$where = " where 1=1 ";
			foreach ($map['where'] as $key => $value) {
				if($key=='rid'){
					$where .=" AND l.rid = {$value} ";
				}else{
					$where .=" AND f.{$key}='{$value}' ";
				}
			}
			$sql.= $where;
			$total = R::getRow($totalsql.$where);
			if(!isset($map['limit'])) $map['limit']=10;
			if(!isset($map['page'])) $map['page']=1;
			if(!isset($map['desc'])) $map['desc']=' desc ';
			$limitstart = ($map['page']-1)*$map['limit'];
			$limitstr = "limit {$limitstart},{$map['limit']}";
			$sql .=" ORDER BY l.id {$map['desc']}".$limitstr;
			return array(
				'data'=>R::getAll($sql),
				'page'=>$map['page'],
				'limit'=>$map['limit'],
				'total'=>$total['total']
			);
		}

	}
	
	;