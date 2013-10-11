<?php
	class module_baidumap_index{
		function run(){
			$point = $this->beforeDisplay();
			$point = (array) $point;
			$t = new tpl();
			$t->assign('point',$point);
			$t->display('map');

		}

		function beforeDisplay(){
			if($_POST){
				$desc = isset($_POST['desc']) ? $_POST['desc'] :'';
				$tel = isset($_POST['tel']) ? $_POST['tel'] :'';
				$addr = isset($_POST['addr']) ? $_POST['addr'] :'';
				$name = isset($_POST['name']) ? $_POST['name'] :'';
				$lng = isset($_POST['lng']) ? $_POST['lng'] :'';
				$lat = isset($_POST['lat']) ? $_POST['lat'] :'';
				$data = array("desc=>$desc","tel=>$tel","addr=>$addr","name=>$name","lng=>$lng","lat=>$lat");
				k::load('api')->load('map','baidumap')->store($data);
			}else{
				//获取百度的经纬度,用于定位
				$ip = $_SERVER['REMOTE_ADDR'];
				//如果本地访问的话则不需要传ip地址过去
				if($ip=='127.0.0.1'){
					$json = file_get_contents("http://api.map.baidu.com/location/ip?ak=01ab9abebfe42e54d3dbb3c82c43fd54&coor=bd09ll");
				}else{
					$json = file_get_contents("http://api.map.baidu.com/location/ip?ak=01ab9abebfe42e54d3dbb3c82c43fd54&ip=$ip&coor=bd09ll");
				}
				$data = json_decode($json);
				return $data->content->point;
			}
		}
	}