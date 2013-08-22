<?php
	class module_user_login{
		
		public function run(){
			if($_POST){
				$id = k::load('user')->login($_POST['username'],$_POST['password']);
				if($id){
					header('Location: ?m=home');
				}
			}
			$t=new tpl();
			$t->display('login');
		}	
	}
