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
			$u=k::load('user');
			$id = $u->reg($_POST['username'],$_POST['password']);
			header('Location: ?m=home');
		}		
	}