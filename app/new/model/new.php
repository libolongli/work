<?php
class k_model_new_new
{
	private $data = array();

			


	private $_db;
	function __construct(){

		$this->_db = new db();
	}
  	function getRowLi($type)
  	{

		$data=  R::getAll("select * from news where type='{$type}' order by id desc");

	 	if($data) return $data;
	
	 	return false;	 
	}
	
	function addNew($data){
		foreach($data as $key =>$value){
			if($value == '请输入新闻标题！') $data[$key]='';
		}
		if($data){

			$new = R::dispense('news');
			 $new->title = $data['title'];
			$new->content = $data['content'];
			$new->type = $data['type'];
			$new->author = $data['author'];
			//$new->active = $data['active'];
			$time = time();
			 //date('Y-m-d H:i:s',$time);
			
			$new->ts_created = time();
			$id = R::store($new);

//libo			
			
		//	$now = time();
		//	$idata = array("title=>{$data['title']}","author=>{$data['author']}","content=>{$data['content']}","type=>{$data['type']}",
		//		"ts_created=>{$now}","status=>0");
		//	$id = $this->_db->add('news',$idata);
		//	$user = $_SESSION['user'];
			//发送工作流
		//	$flow = k::load('task','flow');
		//	$flow->init('news/add');
		//	$flow->add(array('title'=>$data['title'],'user'=>$user['user'],'transmit'=>0));
			return $id;
		}
	}
	
    public function getJsonNew(){
		$data = R::getAll("SELECT * FROM news where type='{$type}' and status='0' order by id desc");
		return json_encode($data);
	}

    public function getListJson(){

	
		$data = R::getAll("SELECT n.id as recid,n.title,n.author,n.content,a.active,FROM_UNIXTIME(ts_created) as ts_created,t.type 
							from news as n INNER JOIN (SELECT  type_id,titles as active from type where cate = 'active') as a on n.active = a.type_id
							INNER JOIN (SELECT type_id,titles as type from type where cate = 'type') as t on n.type = t.type_id where n.status = '0' order by id desc
							");
							
		$newdata = R::getAll("select * from news");		
			foreach($newdata as $k => $v){
				  $newdata[$k][type].'....';
			}
			foreach($data as $key => $value){
			
				//echo  $data[$key][active].'....';
				if($data[$key][active]=='审核通过'){
					$data[$key]['operate'] = $data[$key][active];
				}else{
							//active = 3,审核通过
				$data[$key]['operate'] = "<a href='javascript:void(0);' onclick='updateStatus({$value['recid']},3)'>".$data[$key]['active']."</a>";
				}			
				$data[$key]['operate'] .= "｜<a href='?m=home&a=newsList&type={$newdata[$k][type]}&id={$value['recid']}'>查看</a> ";
				$data[$key]['operate'] .= "｜<a href='?m=home&a=newsList&type={$newdata[$k][type]}&id={$value['recid']}'>修改</a> ";
			}
	

		return json_encode($data);

	}
	
	function getOption(){
		if($type = 'all')
		$data = R::getAll("SELECT titles as name,type_id as id FROM type order by id desc");
		$str = '';
		if($data){
			foreach($data as $key =>$value){
				if($str){
					$str.=",{value:{$value['id']}, name:'{$value['name']}'}";
				}else{
					$str.="{value:{$value['id']}, name:'{$value['name']}'}";
				}
			}
		}
					
		if($str) return $str;
		return false;	 
	}
				
	function getNewsInfo(){
		$id =$_GET['id'];
		$sql = "select title,author,content,FROM_UNIXTIME(ts_created) as ts_created from news where id = '{$id}'";
		$data = R::getRow($sql);
		$json = "[
		{'title':'标题', 'name':'{$data['title']}'},
		{'title':'发布者', 'name':'{$data['author']}'},
		{'title':'详细类容', 'name':'{$data['content']}'},	
		{'title':'创建时间', 'name':'{$data['ts_created']}'},
			]";
		echo $json;
	}			

			
			
	
	
}
	
