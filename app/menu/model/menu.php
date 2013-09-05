<?php
class k_model_menu_menu
{
	private $data = array();
	private $rdata = array();
	private $jdata = array();
	private $level = 0;
	function getOption($type= 'part',$pid = 0)
	{
		if($type = 'all') $this->data= R::getAll( 'select * from menu' );
		$this->teamData();
		
		if($this->rdata) return $this->rdata;
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
		$this->jdata = $data;
		$this->recursive($this->jdata);
		return  json_encode($this->jdata);
	}
		
	public function recursive(&$data = array()){
		foreach($data as $key =>$value){
			$data[$key]['children']= $this->getChild($value['id']);
			$tmp = &$data[$key]['children'];
			if($tmp){
				$this->recursive($tmp);
			}
		}
	}
	
	
	public function teamData($pid=1){
		foreach ($this->data as $key => $value) {	
			if($value['pid']==$pid){
				$this->level++;
				array_push($this->rdata, array('name'=>$value['name'],'level'=>$this->level,'id'=>$value['id']));
							
				$tmpdata = $this->teamData($value['id']);
				if(!$tmpdata){
					$this->level--;
					continue;
				}
			}
		}	
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

	public function getChildByName($name){
		$pid = R::getRow("SELECT id from menu where name='{$name}'");
		return $this->getChild($pid['id']);
	}
	
	
}