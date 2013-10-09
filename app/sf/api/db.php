<?php
	class module_sf_api_db{
		private $_db;
		
		function __construct(){
			$this->_db = new db();
		}

		function store($tid=1,$data = array()){
			if($data){
				foreach ($data as $key => $value) {
					$content = isset($value['content']) ? $value['content'] : '';
					$tpid =  0;	
					if($key){
						$tpid = $data[$value['pid']-1]['pid'];
					}
					$tmp = array("tid=>$tid","pid=>$tpid","title=>{$value['text']}","content=>$content");
						$pid = $this->_db->add('help',$tmp);
						$data[$key]['pid'] = $pid;
				}
			}
		}
	}