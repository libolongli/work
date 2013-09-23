<?php
	class module_user_login{
		
		public function run(){
			if($_POST){
				//echo 123;exit;
				$password=isset($_POST['password'])?$_POST['password']:1;
				$username=isset($_POST['username'])?$_POST['username']:1;
				$id = k::load('api')->load('user')->login($username,$password);		
				//echo 456;exit;
				if($id){
					echo "ok";exit;
				}else{
					echo "bad";exit;
				}
			}
			//echo 1;exit;
			$t=new tpl();
			$t->display('login');
		}	
	}
