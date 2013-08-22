<?php
	class module_user_login{
		
		public function run(){
			if($_POST){
				$password=isset($_POST['password'])?$_POST['password']:1;
				$username=isset($_POST['username'])?$_POST['username']:1;
				$id = k::load('user')->login($username,$password);		
				if($id){
					header('Location: ?m=home');
				}
			}
			$t=new tpl();
			$t->display('login');
		}	
	}
