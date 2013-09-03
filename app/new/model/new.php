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
			$now = time();
			$idata = array("title=>{$data['title']}","content=>{$data['content']}","type=>{$data['type']}",
				"ts_created=>{$now}","status=>0");
			$id = $this->_db->add('news',$idata);
			$user = $_SESSION['user'];
			//发送工作流
			$flow = k::load('task','flow');
			$flow->init('news/add');
			$flow->add(array('title'=>$data['title'],'user'=>$user['user'],'transmit'=>0));
			return $id;
		}
	}
	
    public function getJsonNew(){
		$data = R::getAll("SELECT * FROM news where type='{$type}' and status='0' order by id desc");
		return json_encode($data);
	}

    public function getListJson(){
		$data = R::getAll("SELECT n.id as recid,n.title,n.content,n.ts_created,t.titles as type FROM news as n INNER JOIN type as t on n.type = t.type_id where n.status='0' order by n.id desc");
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
				
				

			
			
	}
	

	
