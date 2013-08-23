<?php
class k_model_feed_feed
{
  function getFeed($type='index'){
	if($type == 'index'){
		$result = R::getRow('SELECT * FROM feed where status = 1');
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
	R::store($feed);
  }
  
}