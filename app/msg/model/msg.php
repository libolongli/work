<?php
class k_model_msg_msg
{
    public function getListJson(){
		$data = R::getAll('SELECT id as recid,rids,content,ts_created FROM msg order by id desc');
		return json_encode($data);
	}
	
	public function addMsg($data){
		$now = time();
		$msg = R::dispense('msg');
		$msg->content = $data['content'];
		$msg->uid = $data['uid'];
		$msg->rids = $data['rids'];
		$msg->ts_created=$now;
		$msg->ts_updated = $now;
		$id = R::store($msg);
		return $id;
	}
  
}