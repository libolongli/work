<?php
class k_model_msg_msg
{
    public function getListJson($map = array()){
    	$where  = " where l.fleg !=9 ";
    	foreach ($map as $key => $value) {
    		$where .= "AND {$key}='{$value}'";
    	}
		$uid = $_SESSION['user']['id'];
		$sql = "SELECT l.id as recid,m.content,FROM_UNIXTIME(l.ts_created) as ts_created ,u.`user`  
			from msg_log as l INNER JOIN msg as m on l.ts_created = m.ts_created 
			INNER JOIN user as u on u.id= l.rid 	
			 {$where}  order by l.id desc";
		$data = R::getAll($sql);
		return json_encode($data);
	}
	
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
				k::load('feed','feed')->send(array('uid'=>$data['uid'],'rid'=>$v,'content'=>$data['content'],'type'=>2));
			}
		}
		
		return $id;
	}
	
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
  
}