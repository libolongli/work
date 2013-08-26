<?php
class k_model_msg_msg
{
    public function getListJson(){
		$uid = $_SESSION['user']['id'];
		$data = R::getAll("SELECT id as recid,rids,content,ts_created FROM msg where rids = {$uid} and status !=9 order by id desc");
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
		$id = R::store($msg);
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
		$sql = "UPDATE msg set {$value} where id in({$map['id']})";
		R::exec($sql);
	}
  
}