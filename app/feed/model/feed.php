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
	* $data = array(
    *	'user'=>'111111',
    *	'password'=>'11111',
    *)
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
		 * 通过map条件返回feed列表的数据,主要用于ajax加载列表用的
		 * $map 里面的search 参照 k::load('search','op')->teamSearch()方法
		 * $map = array(
	   	 *  'limit'=>'Nomius',
	   	 *	'offset'=>'1111111'
	   	 *	'search'=>array(
	   	 *		'search'=>array(
		 *			.......
	   	 *		 ),
		 *		'logic'=>'or/and',
 		 *
	   	 *	)
		 *)
		 * @see teamSearch 
		 * @param  array $map   
		 * @return array  
		 */
    public function getListJson($map){
		$uid = k::load('user','user')->uid();
		$where = " where  uid = {$uid} and status !=9 ";

		if(isset($_POST['search'])){
				$where=k::load('search','op')->teamSql($where,$map);
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
			'records'=>$data,
			'page'=>$map['offset']/$map['limit'],
			);
	}
	

		/**
		 * 通过map数组进行修改feed,传入的数组里面必须包含ID 字段
		 * $map = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
	   	 *  'id'=>'1,2,3,'
		 *)
		 * @see teamSearch 
		 * @param  array $map   
		 * @return array  
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
		$sql = "UPDATE feed set {$value} where id in({$map['id']})";
		R::exec($sql);
	}
  
}