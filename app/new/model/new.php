	<?php
class k_model_new_new
{
	private $data = array();


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
			//$time = time();
			 //date('Y-m-d H:i:s',$time);
			$new->ts_created = time();
			$id = R::store($new);
			print_r($data);
			return $id;
		}
	}
	
    public function getJsonNew(){
		$data = R::getAll("SELECT * FROM news where type='{$type}' and status='0' order by id desc");
		//print_r($data);
		return json_encode($data);
	}

    public function getListJson(){
		//$data = R::getAll("SELECT id as recid,title,content,type,ts_created FROM news where status='0' order by id desc");
		$data = R::getAll("SELECT n.id as recid,n.title,n.content,n.ts_created,t.titles as type FROM news as n INNER JOIN type as t on n.type = t.type_id where n.status='0' order by n.id desc");
	//SELECT n.title,n.content,t.titles as type FROM news as n INNER JOIN type as t on n.type = t.type_id where where n.status='0' order by id desc;
		return json_encode($data);

	}
	
	function getOption(){
				if($type = 'all')
				 $data = R::getAll("SELECT titles as name,type_id as id FROM type order by id desc");
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
	

	
