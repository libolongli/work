<?php
	class module_msg_update{
		function run(){
			$id = k::load('api')->load('msg')->update($_REQUEST);
			echo $id;exit;
		}
	}
