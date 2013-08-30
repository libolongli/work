<?php
	require_once 'db.class.php';
	R::setup('mysql:host=localhost;dbname=project','root','root'); 
	class task{
		private $_db;
		private $_config;
		private $_url;
		public function __construct($url = 'user/pay'){
			$this->_db = new db();
			$this->_db->connect('localhost','root','root','project');
			$sql = "SELECT * FROM common_config where url = '{$url}' ";
			$this->_config = $this->_db->fetch_all($sql);
		}
		
		/*
			$map = array(
				'uid' =>1
				'rids'=> 2,3,4...'
			)
		*/

		public function add($map = array()){
			foreach($this->_config as $key =>$value){
				if($value['active']){
					$format = $map['content'];
					if(!$map['transmit']){
						$format = $value['format'];
						$format = str_replace('{user}', $map['content'], $format);
					}	
					$now = time();				
					//$sql = "INSERT INTO flow (uid,rids,content,ts_created,ts_updated,status)  VALUES({$map['uid']},'{$map['rids']}','{$format}',{$now},{$now},1)";
					//$this->_db->query($sql);
					foreach (explode(',', $map['rids']) as $key => $value) {
						//$sql = "INSERT INTO flow_log (uid,rid,ts_created) VALUES({$map['uid']},{$value},{$now})";
						//$this->_db->query($sql);
						$sql = "INSERT INTO flow (uid,rids,content,ts_created,ts_updated,status)  VALUES({$map['uid']},'{$value}','{$format}',{$now},{$now},1)";
						$this->_db->query($sql);
					}
				}
			}
			
		}

		/*
			$map = array('percent'=>90,'id'=>1)
		*/
		public function update($map){
			$tmp = array();
			$map['ts_updated']=time();
			foreach($map as $k => $v){
				if(($k!='id') &&($k!='m') &&($k!='a') ){
					$tmp[] = "{$k}='{$v}'";
				}
			}
			$value  = join(',',$tmp);
			if(is_array($map['id'])) $map['id'] = join(",",$map['id']);
			$sql = "UPDATE flow set {$value} where id in({$map['id']})";
			$this->_db->query($sql);
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
			$this->_db->query($sql);
		}


		public function get($map=array()){
			$sql = "SELECT * FROM  flow as  ";
			//$totalsql = "SELECT count(*) as total ";
			$where = " where 1=1 ";
			foreach ($map['where'] as $key => $value) {	
				$where .=" AND f.{$key}='{$value}' ";	
			}
			$sql.= $where;
			//$total = $this->_db->fetch_first($totalsql.$where);
			//if(!isset($map['limit'])) $map['limit']=10;
			//if(!isset($map['page'])) $map['page']=1;
			//if(!isset($map['desc'])) $map['desc']=' desc ';
			//$limitstart = ($map['page']-1)*$map['limit'];
			//$limitstr = "limit {$limitstart},{$map['limit']}";
			//$sql .=" ORDER BY id {$map['desc']}".$limitstr;
			$data = $this->_db->fetch_all($sql);
			return array(
				'data'=>$data,
				'page'=>0,
				//'limit'=>$map['limit'],
				'total'=>count($data)
			);
		}

	}
	
	;