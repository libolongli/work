<?php
	class module_home_template{
		public function run(){
			$f = $_GET['url'];
			$f=	str_replace('.html','',$f);
			//if (file_exists($filename)) echo file_get_contents($filename);exit;
			
			k::tpl()->display($f);
		}
	}
