<?php
	class k_model_flow_flow{
		  private $_db;
		  
		  function __construct(){
		  		$this->_db = new db();
		  }


		  function getFlowInfo($id){
				$data = $this->getFlowById($id);
				$json = "[{'title':'收件人', 'name':'{$data['rids']}'},
						 {'title':'内容', 'name':'{$data['content']}'},
						 {'title':'进度', 'name':'{$data['percent']}'}
						 ]";
				return $json;
			}
			
			function getFlowById($id){
				$sql = "select * from flow where id ={$id}";
				$data = R::getAll($sql);
				$data = $data[0];
				return $data;
			}
			function configadd($data){
				$variable = array();
				$str = $data['format'];
				$arr1 = explode('{', $str);				
				foreach ($arr1 as $k => $v) {
					if($v){
						$variable[] =substr($v, 0,strpos($v, "}"));
					}
				}
				
				$data['variable'] = join(",",$variable);
				
				$data = array("name=>{$data['name']}","url=>{$data['url']}","format=>{$data['format']}",
					"active=>{$data['active']}","variable=>{$data['variable']}","rids=>{$data['rids']}");
				
				$this->_db->add('common_config',$data);
			}

			function configlist(){
				$sql = "SELECT id as recid,url,name,format,active from common_config where status = 1";
				$data = R::getAll($sql);
				return json_encode($data);
			}
	}
