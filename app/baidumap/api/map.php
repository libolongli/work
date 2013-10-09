<?php
	class module_baidumap_api_map{
		private $_db;
		function __construct(){
			$this->_db = new db();
		}
		function store($data = array()){
			$this->_db->add('map',$data);
		}

		function get($condition = array()){
			return $this->_db->find('map');
		}
	}
