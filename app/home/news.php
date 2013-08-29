<?php
	class module_home_news{
		public function run(){
						$t = new tpl();
						
				$t->assign('data',$this->get_news());
				$t->assign('upgrade',$this->get_upgrade());
				$t->display('news');					
			}
			
			
			function get_news()
			{
		
			$result =  R::getAll("select * from news where type='1' order by id desc limit 0,5");
			
			//var_dump($result);
			  return $result;
			}
			function get_upgrade(){
						$upgrade =  R::getAll("select * from news where type='2' order by id desc limit 0,5");
			
			//var_dump($upgrade);
			  return $upgrade;
			
			}
	}	

