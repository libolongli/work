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
			function configadd($data,$id=NULL){
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
				if($id){
					$this->_db->update('common_config',$data,$id);
				}else{
					$this->_db->add('common_config',$data);
				}
			}

			function configlist(){
				$sql = "SELECT id as recid,url,name,format,active from common_config where status = 1";
				$data = R::getAll($sql);
				return json_encode($data);
			}

			function getListJson($map,$model = 'send'){
				$sql = "select f.id as recid,rids,percent,f.content from flow as f inner join flow_log as l on  f.id = l.fid ";
				$where = " where f.status !=9 ";
				foreach ($map as $key => $value) {
					if(($key!='offset') && ($key!='limit') )
					$where .= " AND {$key}='{$value}'";
				}
				$sql .= $where;
				$total = count(R::getAll($sql));
				if(isset($map['limit']) && isset($map['offset'])){
					$start = $map['offset'];
					$limit = "limit {$start},{$map['limit']}";
					$sql .= $limit;
				}

				$result = R::getAll($sql);
				
				foreach($result as $key => $value){
					$result[$key]['percent'] = "<div class='Bar'><div style='width: {$value['percent']}%;' class='progress'><span>{$value['percent']}%</span></div></div>";
					$result[$key]['operate'] = "<a href= '?m=flow&a=update&fid={$value['recid']}' >修改进度</a>   ";
					$result[$key]['operate'] .= "<a href='javascript:void(0);return false;' onclick=checkinfo('?m=flow&a=detail&id={$value['recid']}')>查看</a>  ";
					$result[$key]['operate'] .= "<a href='javascript:void(0);return false;' onclick=checkinfo('?m=flow&a=send&id={$value['recid']}')>转发</a>  ";
					$result[$key]['operate'] .= "<a href='javascript:void(0);return false;' onclick=checkinfo('?m=flow&a=deal&id={$value['recid']}')>处理</a>  ";
					$result[$key]['operate'] .= "<a href='javascript:void(0);return false;' onclick=checkinfo('?m=flow&a=log&id={$value['recid']}')>处理记录</a>  ";
				}
				
				//print_r($result);exit;
				return array(
					'total' =>$total,
					'data'=>$result
				);
				

			}

			function addlog($map){
				$now = time();
				$uid = $_SESSION['user']['id'];
				$lastlog = $this->getLog(array('fid'=>$map['fid'],'rid'=>$uid,'fleg'=>1));
				$this->_db->update('flow_log',array("fleg=>2"),$lastlog[0]['id']);
				$datalog  = array("fid=>{$map['fid']}","uid=>{$uid}","comment=>{$map['comment']}","ts_created=>{$now}");
				$dataflow = array("status=>{$map['status']}","ts_updated=>{$now}");
				
				if($map['rids']){
					$flow = $this->getFlowById($map['fid']);
					$rids = $flow['rids'].",".$map['rids'];
					array_push($datalog, "rid=>{$map['rids']}");				
					array_push($dataflow, "rids=>'{$rids}'");
					//print_r("rid=>{$map['rids']}");exit;
				}else{
					array_push($datalog, "fleg=>2");
				}
				//print_r($dataflow);
				//print_r($datalog);exit;
				$id = $this->_db->add('flow_log',$datalog);
				$this->_db->update('flow',$dataflow,$map['fid']);
				return $id;
			}

			function getLog($map){
				$sql = "SELECT id,FROM_UNIXTIME(ts_created) as date,comment from flow_log ";
				$where = "where 1=1 ";
				foreach ($map as $key => $value) {
					$where .= " AND {$key}='{$value}' ";
				}
				$sql .= $where;
				return R::getAll($sql);
			}

			function getconfig($map){
				$where = "where 1 =1 ";
				$sql = "select * from common_config ";
				foreach ($map as $key => $value) {
					$where .= "AND {$key}= '$value'";
				}
				$sql .= $where;
				$data = R::getAll($sql);
				return $data;
			}
	}
