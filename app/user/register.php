<?php
	class module_user_register{
		
		public function run(){
			if($_POST)
			{
				
				$this->register();		
			}	
			$t=new tpl();
			$t->display('register');
		}
		
		public function register(){
			$u=k::load('api')->load('user');
			$id = $u->reg($_POST['username'],$_POST['password']);
			$url = k::url('home');
			header('Location: $url');
		}		
	}