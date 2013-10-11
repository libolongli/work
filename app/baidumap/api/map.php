<?php
	class module_baidumap_api_map{
		
		private $_db;
		
		function __construct(){
			$this->_db = new db();
		}

		/**
		 * 往map表里面添加数据
		 * $map = array(
	   	 *  'user'=>'Nomius',
	   	 *	'password'=>'1111111'
		 *)
		 * @param  array $data   
		 * @return int 	
		 */

		function store($data = array()){
			$this->_db->add('map',$data);
		}

		/**
		 * 从map表里面拿取所有的标注信息
		 * $map = array(
	   	 *  'user'=>'Nomius',
	   	 *	'password'=>'1111111'
		 *)
		 * @param  array $data   
		 * @return int 	
		 */

		function get($condition = array()){
			return $this->_db->find('map');
		}
	}
