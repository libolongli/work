<?php
class k_model_feed_feed
{
  
  	private $_db;
  	function __construct(){
  		$this->_db = new db(); 
  	}
  /**
	* 用来获取首页的feed,feed之后改变状态
	*
	* @param  string $type  
	* @return array	
	*/
    function getFeed($type='index'){
		if($type == 'index'){
			$uid = $_SESSION['user']['id'];
			$result = R::getRow("SELECT * FROM feed where uid = {$uid} and status = 1");
			if($result){
				R::exec( "update feed set status=3 where id={$result['id']}" );
			}
			return $result;
		}
    }
  
  /**
	* 发送feed
	*
	* @param  array $data  
	* @return int
	*/

    function send($data){
		$array = array();
		$type = isset($data['type']) ? isset($data['type']) :''; 

		foreach (explode(',', $data['rids']) as $key => $value) {
			$array = array("uid=>{$data['uid']}","rid=>{$value}","content=>{$data['content']}");
			if($type){
				array_push($array,"type=>{$type}");
			}
			$id = $this->_db->add('feed',$array);
		}
		return $id;
    }
  
  	/**
	* 用来获取feed列表
	*
	* @param  array $map  
	* @return array	
	*/
    public function getListJson($map){
		$uid = $_SESSION['user']['id'];
		$where = " where  uid = {$uid} and status !=9 ";

		if(isset($map['search'])){
			$arr = array();
    		foreach ($map['search']['search'] as $key => $value) {
    			array_push($arr,$value['field']." ".$value['like']);
    		}
    		$where .= "AND (".join(" ".$map['search']['logic']." ", $arr).")";
    	}


		$sql = "SELECT id as recid,uid,rid,content FROM feed ";
		$sql .= $where;
		$total = count(R::getAll($sql));
		if(isset($map['limit']) && isset($map['offset'])){
				$start = $map['offset'];
				$limit = "limit {$start},{$map['limit']}";
				$sql .= $limit;
		}
		$data = R::getAll($sql);
		return array(
			'total'=>$total,
			'data'=>$data
			);
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