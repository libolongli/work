<?php
class k_model_feed_feed
{
  function getFeed($type='index'){
	if($type == 'index'){
		$uid = $_SESSION['user']['id'];
		$result = R::getRow("SELECT * FROM feed where getname = {$uid} and status = 1");
		if($result){
			R::exec( "update feed set status=3 where id={$result['id']}" );
		}
		return $result;
	}else{
	
	}
  }
  
  function send($data){
	$feed = R::dispense('feed');
	$feed->username = $data['username'];
    $feed->getname = $data['getname'];
	$feed->content = $data['content'];
	$id = R::store($feed);
	return $id;
  }
  
   public function getListJson(){
		$uid = $_SESSION['user']['id'];
		$data = R::getAll("SELECT id as recid,username,getname,content FROM feed where getname = {$uid} order by id desc");
		return json_encode($data);
	}
  
}