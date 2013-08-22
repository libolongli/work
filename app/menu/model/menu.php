<?php
class k_model_menu_menu
{
	private $data = array();
	private $rdata = array();
	private $level = 0;
	private $paret = array();
  function getOption($type= 'part',$pid = 0)
  {
	if($type = 'all')
	 $data=  R::getAll( 'select * from menu' );
	 if($data) return $data;
	 return false;	 
	}
	
	function addMenu($data){
		foreach($data as $key =>$value){
			if($value == '请填写内容！') $data[$key]='';
		}
		if($data){
			$menu = R::dispense('menu');
			$menu->pid = $data['pid'];
			$menu->name = $data['name'];
			$menu->url = $data['url'];
			$menu->icon = $data['icon'];
			$id = R::store($menu);
			return $id;
		}
	}
	
	public function getJsonMenu(){
		
		$data = $this->getChild(1);
		foreach($data as $key=>$value){
			$data[$key]['children']=$this->getChild($value['id']);
			//print_R($value['children']);exit;
		}
		return  json_encode($data);
		
	}

	public function getChild($pid){
	 	$data=  R::getAll( "select * from menu where pid = {$pid}" );
	 	$tmpdata = array();
	 	if($data){
	 		foreach ($data as $key => $value) {
	 			$tmpdata[$key]['id'] =  $value['id'];
	 			$tmpdata[$key]['icon'] =  $value['icon'];
	 			$tmpdata[$key]['text'] =  $value['name'];
	 			$tmpdata[$key]['url'] =  $value['url'];
	 			$tmpdata[$key]['children'] =  array();
	 		}
	 	}
	 	return $tmpdata;
	}
	
	
}