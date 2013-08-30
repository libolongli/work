<?php
	class k_model_flow_flow{
			
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
	}
