<?php
class k_model_msg_msg
{
	private $_db;
	
	function __construct(){
		$this->_db = new db();
	}
   
	/**
	* 通过$map 拿取短信列表
	*
	* @param  array $map
	* @return array	
	*/

    public function getListJson($map = array()){
    	$where  = " WHERE ";
    	$ws = '';
    	$arr = array();
    	if(isset($map['search'])){
    		foreach ($map['search']['search'] as $key => $value) {
    			array_push($arr,$value['field']." ".$value['like']);
    		}
    		$ws .= "(".join(" ".$map['search']['logic']." ", $arr).")";
    	}

    	
    	foreach ($map as $key => $value) {
			if(($key!='offset') && ($key!='limit')  && ($key!='search')){
				if($ws){
					$ws .= " AND {$key}='{$value}'";
				}else{
					$ws .= " {$key}='{$value}'";
				}
			}
		}
		$uid = $_SESSION['user']['id'];
		$sql = "SELECT l.id as recid,m.content,FROM_UNIXTIME(l.ts_created) as ts_created ,u.`user`  
			from msg_log as l INNER JOIN msg as m on l.ts_created = m.ts_created 
			INNER JOIN user as u on u.id= l.rid";
		if($ws==" WHERE "){
			$sql .= $where." l.fleg !=9 ";
		}else{
			$sql .= $where.$ws." AND l.fleg !=9 ";
		}

		$total = count(R::getAll($sql));
		if(isset($map['limit']) && isset($map['offset'])){
			$start = $map['offset'];
			$limit = "limit {$start},{$map['limit']}";
			$sql .= $limit;
		}
		$data = R::getAll($sql);
		foreach ($data as $key => $value) {
			$data[$key]['operate'] = "<a href='javascript:void(0);return false;' onclick=checkinfo('?m=msg&a=detail&id={$value['recid']}')>查看</a>";
		}
		return array(
			'total'=>$total,
			'page'=>$map['offset']/$map['limit'],
			'records'=>$data
			);
	}
	
	/**
	* 通过$data 添加一条短信
	*
	* @param  array $map
	* @return int	
	*/
	public function addMsg($data){
		$now = time();
		$data['uid'] = $_SESSION['user']['id'];
		$msg = R::dispense('msg');
		$msg->content = $data['content'];
		$msg->uid = $data['uid'];
		$msg->rids = $data['rids'];
		$msg->ts_created=$now;
		$msg->ts_updated = $now;
		$rids = explode(',',$data['rids']);
		if(count($rids>1)) $msg->isgroup=1;
		$id = R::store($msg);
		foreach($rids  as $k=>$v){
			$msg_log = R::dispense('msg_log');
			$msg_log->uid=$data['uid'];
			$msg_log->rid=$v;
			$msg_log->fleg=1;
			$msg_log->ts_created=$now;
			$cid = R::store($msg_log);
			if($id){
				k::load('feed','feed')->send(array('uid'=>$data['uid'],'rids'=>$v,'content'=>$data['content'],'type'=>2));
			}
		}
		
		return $id;
	}
	/**
	* 通过$map 修改短信
	*
	* @param  array $map
	*/
	public function update($map){
		$tmp = array();
		foreach($map as $k => $v){
			if(($k!='id') &&($k!='m') &&($k!='a') ){
				$tmp[] = "{$k}='{$v}'";
			}
		}
		$value  = join(',',$tmp);
		if(is_array($map['id'])) $map['id'] = join(",",$map['id']);
		$sql = "UPDATE msg_log set {$value} where id in({$map['id']})";
		R::exec($sql);
	}
  
  	/**
	* 通过id 获得短信信息
	*
	* @param  array $map
	* @return json
	*/
  	public function getMsgInfo($id){
  		$this->_db->update('msg_log',array('fleg=>2'),$id);
  		$data = $this->getMsgById($id);
		$json = "[{'title':'收件人', 'name':'{$data['user']}'},
				 {'title':'内容', 'name':'{$data['content']}'},
				 ]";
		return $json;
  	}

  	/**
	* 通过id 获得短信信息
	*
	* @param  array $map
	* @return array
	*/
  	public function getMsgById($id){
  		$sql = "SELECT l.id as recid,m.content,FROM_UNIXTIME(l.ts_created) as ts_created ,u.`user`  
				from msg_log as l INNER JOIN msg as m on l.ts_created = m.ts_created 
				INNER JOIN user as u on u.id= l.rid where l.id = {$id}";
		$data = R::getAll($sql);
		$data = $data[0];
		return $data;
  	}
}