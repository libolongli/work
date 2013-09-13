<?php
	class module_user_userlist{
		function run(){
			$data = k::load('user')->getUserList();		
			echo json_encode($data);exit;
		}
	}
