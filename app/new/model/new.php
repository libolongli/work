	<?php
class k_model_new_new
{
	private $data = array();


  function getRowLi()
  {
		$data=  R::getAll( 'select * from new order by id desc' );
	
	 if($data) return $data;
	
	 return false;	 
	}
	
	function addNew($data){
		foreach($data as $key =>$value){
			
			if($value == '请输入新闻标题！') $data[$key]='';
		}
		if($data){
			$new = R::dispense('new');
			 $new->title = $data['title'];
			$new->content = $data['content'];
			$id = R::store($new);
			return $id;
		}
	}
	
    public function getJsonNew(){
		$data = R::getAll('SELECT * FROM new order by id desc');
		return json_encode($data);
	}


	
	
}
	
