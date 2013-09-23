<?php
class module_menu_api_menu
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
	
	
		/**
		* 通过$map 拿取某个工作流列表
		*
		* $map = array(
	   	 *  'user'=>'Nomius',
	   	 *	'pass'=>'1111111',
	   	 *  'serarch'=>array(
		 *
	   	 *
	   	 *	)
		 *)
		* @param  array $map
		* @param  string $model
		* @return array	
		*/
		
		function getJsonList($map){
			$sql  = "SELECT m.id as recid,m.name,p.name as pname,m.url,m.icon FROM menu as m INNER JOIN menu as p on m.pid = p.id";
			$where = " where m.status !=9 ";
			if(isset($map['search'])){
				foreach ($map['search']['search'] as $key => $value) {
					if($value['field']=='pname') {
						$map['search']['search'][$key]['field']='p.name';
					}else{
						$map['search']['search'][$key]['field']='m.'.$value['field'];
					}
				}
				$where = k::load('api')->load('search','op')->teamSql($where,$map);
			}
			$sql .= $where;
			$total = R::getAll($sql);
			$offset = isset($_POST['offset']) ? $_POST['offset'] :0 ;
			$limit = isset($_POST['limit']) ? $_POST['limit'] :10 ;
			$sql .= " ORDER BY m.id desc limit ".$offset.",".$limit;
			$data = R::getAll($sql);
			foreach($data as $key=>$value){
				$url = k::url('op/update',array('table'=>'menu','id'=>$value['recid']));
				$data[$key]['op'] = "<a href='#' onclick=checkinfo('{$url}')>修改</a>";
			}
			return array(
				'total'=>count($total),
				'page'=>$offset/$limit,
				'records'=>$data
				);
		}

		/**
		*修改菜单信息
		*$map = array('id'=>'1,2,3','status'=>1)
		*@param array $map
		*@return int
		*
		*/

		function update($map){
			$id = isset($map['id']) ? $map['id'] : '';
			unset($map['id']);
			$arr = array();
			foreach($map as $key => $value){
				array_push($arr,"{$key}=>{$value}");
			}
			$db = new db();
			if(is_string($id)) $id = explode(',', $id);
			// print_r($id);exit;
			foreach ($id as $k => $v) {
				$db->update('menu',$arr,$v);
			}
		}
	
}