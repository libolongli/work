<?php
class k_model_menu_menu
{
	private $data = array();
	private $rdata = array();
	private $level = 0;
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
		$this->data = $this->getOption();
		$this->teamData(1);
		$header = '[';
		foreach ($this->rdara as $key => $value) {
			if(isset($value['icon'])
		}
		$foot = ']';
	}

	public function teamData($pid=1){
		foreach ($this->data as $key => $value) {	
			if($value['pid']==$pid){
				$this->level++;
				if(isset($value['icon'])){
					array_push($this->rdata, array('icon'=>$value['icon'],'text'=>$value['name'],'url'=>$value['url'],'level'=>$this->level));
				}else{
					array_push($this->rdata, array('text'=>$value['name'],'url'=>$value['url'],'level'=>$this->level));
				}	
				
				$tmpdata = $this->teamData($value['id']);
				if(!$tmpdata){
					$this->level--;
					continue;
				}
			}	
		}
		
	}
}