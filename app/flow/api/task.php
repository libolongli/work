<?php
	class module_flow_api_task{
		private $_db;
		private $_config;
		private $_url;
		
		public function __construct($url = 'user/pay'){
			$this->_db = new db();
			$sql = "SELECT * FROM common_config where url = '{$url}' ";
			$this->_config = R::getAll($sql);
		}
		
		/**
		* 通过URL,初始化
		*
		* @param  string  $url
		* @return void	
		*/

		public function init($url='user/pay'){
			$this->_db = new db();
			$sql = "SELECT * FROM common_config where url = '{$url}' ";
			$this->_config = R::getAll($sql);
		}	

		/**
		* 添加一个工作流
		*
		* $map = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
		 *)
		* @param  array  $map
		* @return void	
		*/

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
					$user = $_SESSION['user'];
					
					foreach (explode(',', $map['rids']) as $key => $value) {
						$data_flow = array("uid=>{$map['uid']}","rids=>{$value}","content=>{$format}","ts_created=>{$now}","ts_updated=>{$now}","status=>1");
						$fid = $this->_db->insertRecord('flow',$data_flow);
						$data_log = array("fid=>{$fid}","uid=>{$map['uid']}","rid=>{$value}","ts_created=>{$now}","fleg=>1","comment=>{$format}");					
						$this->_db->insertRecord('flow_log',$data_log);
					}
				}
			}	
		}

		/**
		* 通过$map 修改工作流 ,ID 是必须的
		*	
		* $map = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
	   	 *  'id'=>'1,2,3,'
		 *)
		* @param  array  $map
		* @return void	
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

		// /**
		// 	update config file
		// */
		// public function updateConfig($map = array()){
		// 	$sql = "UPDATE common_config set ";
		// 	$arr = array();
		// 	foreach ($map as $key => $value) {
		// 		$arr[]= "{$key}='{$value}'";
		// 	}
		// 	$sql .= implode(",", $arr);
		// 	$sql .= "where url= 'user/pay' ";
		// 	R::exec($sql);
		// }


		// public function get($map=array()){
		// 	$sql = "SELECT f.* FROM flow_log as l INNER JOIN flow as f on l.ts_created = f.ts_created ";
		// 	$totalsql = "SELECT count(*) as total  FROM flow_log as l INNER JOIN flow as f on l.ts_created = f.ts_created ";
		// 	$where = " where 1=1 ";
		// 	foreach ($map['where'] as $key => $value) {
		// 		if($key=='rid'){
		// 			$where .=" AND l.rid = {$value} ";
		// 		}else{
		// 			$where .=" AND f.{$key}='{$value}' ";
		// 		}
		// 	}
		// 	$sql.= $where;
		// 	$total = R::getRow($totalsql.$where);
		// 	if(!isset($map['limit'])) $map['limit']=10;
		// 	if(!isset($map['page'])) $map['page']=1;
		// 	if(!isset($map['desc'])) $map['desc']=' desc ';
		// 	$limitstart = ($map['page']-1)*$map['limit'];
		// 	$limitstr = "limit {$limitstart},{$map['limit']}";
		// 	$sql .=" ORDER BY l.id {$map['desc']}".$limitstr;
		// 	return array(
		// 		'data'=>R::getAll($sql),
		// 		'page'=>$map['page'],
		// 		'limit'=>$map['limit'],
		// 		'total'=>$total['total']
		// 	);
		// }

	}
	
	;