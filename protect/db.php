<?php
	require_once 'rb.php'; 
	require_once 'db.class.php'; 
	class db{
		private $_writer; 
		
		function __construct(){
			$config=include  'config.php'; 
			$db=$config['db'];
			$conn="$db[driver]:host=$db[host];dbname=$db[dbname]";
			R::setup($conn,$db['user'],$db['pass']);
			$this->_writer = $this->getWriter();			
		}

		/**
		* 修改该或者保存数据
		* 
		*$updatevalues = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
		*)
		* @return id
		*/
		public  function updateRecord($table, $updatevalues, $id = null){
			$data = array();
			$i = 0;
			foreach($updatevalues as $k=>$v){
				$tmpdata = explode("=>",$v);
				$data[$i]['property'] = trim($tmpdata[0]); 
				$data[$i]['value'] = $tmpdata[1];
				$i++;
			}
			return $this->_writer->updateRecord($table,$data,$id);
		}
		
		/**
		* 保存数据
		* 
		*$updatevalues = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
		*)
		* @return id
		*/
		public  function insertRecord($table, $updatevalues){
			return $this->updateRecord($table, $updatevalues);
		}
		
		public function getWriter(){
			return R::getWriter();
		}

		/**
		* 保存数据
		* 
		*$updatevalues = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
		*)
		* @return id
		*/
		public  function add($table, $updatevalues){
			return $this->updateRecord($table, $updatevalues);
		}

		/**
		* 修改数据
		* 
		*$updatevalues = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
		*)
		* @return id
		*/
		public  function update($table, $updatevalues,$id){
			return $this->updateRecord($table, $updatevalues,$id);
		}

		/**
		* 查找数据
		* 
		*$conditon = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
		*)
		* @param string $table 
		* @param array $conditong 
		* @return array
		*/
		public function find($table,$conditions=array(),$addSql=null,$delete = null, $inverse = false, $all = false){
			return $this->_writer->selectRecord($table, $conditions, $addSql, $delete, $inverse, $all);
		}
	}
