<?php
class k_model_feed_feed
{
  function getFeed($type='index'){
	if($type == 'index'){
		$uid = $_SESSION['user']['id'];
		$result = R::getRow("SELECT * FROM feed where uid = {$uid} and status = 1");
		if($result){
			R::exec( "update feed set status=3 where id={$result['id']}" );
		}
		return $result;
	}else{
	
	}
  }
  
  function send($data){
	$feed = R::dispense('feed');
	$feed->uid = $data['uid'];
    $feed->rid = $data['rid'];
	$feed->content = $data['content'];
	if(isset($data['type'])) $feed->type=$data['type'];
	$id = R::store($feed);
	return $id;
  }
  
    public function getListJson(){
		$uid = $_SESSION['user']['id'];
		$data = R::getAll("SELECT id as recid,uid,rid,content FROM feed where uid = {$uid} and status !=9 order by id desc");
		return json_encode($data);
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
		$sql = "UPDATE feed set {$value} where id in({$map['id']})";
		R::exec($sql);
	}
  
}