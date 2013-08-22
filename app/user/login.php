<?php
	class module_user_login{
		
		public function run(){
		 
		  // 
		  k::load('user')->login(1,1);
		  
		  
			if($_POST)  $this->login();
			$t=new tpl();
			$t->display('login');
		}
		
		public function login(){
			header('Location: http://www.project.com/');
		}		
	}
