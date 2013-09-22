<?php
class k_model_menu_menu
{
	private $data = array();
	private $rdata = array();
	private $jdata = array();
	private $level = 0;

	/**
	 * 通过传入的$type 和 pid  返回相应的树形结构需要的数据
	 *
	 * @param  string $type
	 * @param  int $pid
	 * @return html	
	 */
	function getOption($type= 'part',$pid = 0)
	{
		if($type == 'all') $this->data= R::getAll( 'select * from menu' );
		$this->teamData();
		
		if($this->rdata) return $this->rdata;
		return false;	 
	}
	
	/**
	 * 通过传入的$data 添加menu
	 *
	 * $map = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
		 *)
	 * @param  array $map
	 * @return int	
	 */
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
	
	/**
	 * 通过传入的$pid 返回该pid下面的所有的子数据
	 *
	 * @param  int $pid
	 * @return json	
	 */

	public function getJsonMenu($pid =1){
		$data = $this->getChild($pid);
		$this->jdata = $data;
		$this->recursive($this->jdata);
		return  json_encode($this->jdata);
	}
	
	/**
	 * 通过传入的$data,递归 返回该data下面的所有的子数据
	 *
	 * @param  &array $data
	 */

	public function recursive(&$data = array()){
		foreach($data as $key =>$value){
			$data[$key]['children']= $this->getChild($value['id']);
			$tmp = &$data[$key]['children'];
			if($tmp){
				$this->recursive($tmp);
			}
		}
	}
	
	/**
	 * 通过递归 返回该pid下面的所有的子数据
	 *
	 * @param  int $pid
	 */
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
		
	/**
	 * 通过pid 返回该pid下面的所有的子数据
	 *
	 * @param  int $pid
	 */
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

	/**
	 * 通过name 返回该name下面的所有的子数据
	 *
	 * @param  string $name
	 * @return array
	 */
	public function getChildByName($name){
		$pid = R::getRow("SELECT id from menu where name='{$name}'");
		return $this->getChild($pid['id']);
	}
	
	
}