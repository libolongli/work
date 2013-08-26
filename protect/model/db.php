<?php
// logic db  

//basic db vendor db  [.... one  , ..]

class k_model_db
{
  

  function save($map)
  {
	
	$menu = R::dispense('menu');
	$menu->pid = $data['pid'];
	$menu->name = $data['name'];
	$menu->url = $data['url'];
	$menu->icon = $data['icon'];
	
	//hook  
	
	//config 
	
	//
	if($hook)
	{
	
	}
	
	$id = R::store($menu);
  //after hook	
	return $id;
  }
  
  
  public function update($map){
  
    //R::
			log::change($map['id'],$map['percent'],'percent','flow');
			//R::change('95',14,'percent','flow');exit;
			//$now = time();
			//$sql = "UPDATE flow set percent={$map['percent']},ts_updated={$now} where id={$map['id']}";
			//$this->_db->query($sql);
		}
		
		
		
		
}