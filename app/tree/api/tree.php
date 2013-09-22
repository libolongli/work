<?php
	class module_tree_api_tree{
		function getJsonData($model){
			$name = '';
			$tmp = array();
			$parent = array();
			switch ($model) {
				case 'msg':
					$name = '短信息';break;
				case 'flow':
					$name = '工作流';break;
				case 'feed':
					$name = 'feed';break;
			} 
			$data = k::load('api')->load('menu','menu')->getChildByName($name);
			
			foreach($data as $k => $v){
				$tmp[$k]['name'] = $v['text'];
				$tmp[$k]['url'] = $v['url'];
				$tmp[$k]['target'] = 'grid';
			}
			$parent['name'] = $name;
			$parent['open'] = 'true';
			$parent['children'] = $tmp;
			
			return json_encode($parent);exit;
			
		}
	}
