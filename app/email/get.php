<?php
	class module_baidumap_show{
		function run(){
			$point = $this->beforeDisplay();
			$point = (array) $point;
			$t = new tpl();
			$result = k::load('api')->load('map','baidumap')->get();
			$t->assign('point',$point);
			$t->assign('list',$result);
			$t->display('show');

		}
// http://api.map.baidu.com/location/ip?ak=F454f8a5efe5e577997931cc01de3974&ip=202.198.16.3&coor=bd09ll
		function beforeDisplay(){
			$json = file_get_contents("http://api.map.baidu.com/location/ip?ak=01ab9abebfe42e54d3dbb3c82c43fd54&coor=bd09ll");
			$data = json_decode($json);
			//print_r($data);exit;
			return $data->content->point;
		}	
	}