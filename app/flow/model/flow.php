<?php
	class k_model_flow_flow{
			
		  function getFlowInfo($id){
		  
			$sql = "select * from flow where id ={$id}";
			$data = R::getAll($sql);
			$data = $data[0];
			//print_R($data);exit;
			$json = "[{'title':'收件人', 'name':'{$data['rids']}'},
					 {'title':'内容', 'name':'{$data['content']}'},
					 {'title':'进度', 'name':'{$data['percent']}'}
					 ]";
			return $json;
			}
	}
