<?php
	require_once 'rb.php'; 
	class db{
		private $_writer; 
		
		function __construct(){
			$config=include  'config.php'; 
			$db=$config['db'];
			$conn="$db[driver]:host=$db[host];dbname=$db[dbname]";
			R::setup($conn,$db['user'],$db['pass']);
			$this->_writer = $this->getWriter();			
		}
		public  function updateRecord($table, $updatevalues, $id = null){
			$data = array();
			$i = 0;
			foreach($updatevalues as $k=>$v){
				$tmpdata = explode("=>",$v);
				$data[$i]['property'] = trim($tmpdata[0]); 
				$data[$i]['value'] = $tmpdata[1];
				$i++;
			}
			$this->_writer->updateRecord($table,$data,$id);
		}
		
		public  function insertRecord($table, $updatevalues){
			$this->updateRecord($table, $updatevalues);
		}
		
		public function getWriter(){
			return R::getWriter();
		}
	}
