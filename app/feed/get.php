<?php
	class module_feed_get{
		public function run(){
			$type = isset($_GET['type'])?$_GET['type']:'index';
			if($type=='index'){
				$data = k::load('api')->load('feed')->getFeed($type);
				if($data){
					echo json_encode($data);
					exit;
				}
			}
		}
	}
