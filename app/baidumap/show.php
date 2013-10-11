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

		function beforeDisplay(){
			$ip = $_SERVER['REMOTE_ADDR'];
			if($ip=='127.0.0.1'){
				$json = file_get_contents("http://api.map.baidu.com/location/ip?ak=01ab9abebfe42e54d3dbb3c82c43fd54&coor=bd09ll");
			}else{
				$json = file_get_contents("http://api.map.baidu.com/location/ip?ak=01ab9abebfe42e54d3dbb3c82c43fd54&ip=$ip&coor=bd09ll");
			}
			$data = json_decode($json);
			return $data->content->point;
		}	
	}