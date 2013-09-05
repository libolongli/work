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
		
			$result =  R::getAll("select id,title,content,FROM_UNIXTIME(ts_created) as ts_created,type from news where type='1' and status='0' and active='3' order by id desc limit 0,5");
			
			//var_dump($result);
			  return $result;
			}
			function get_upgrade(){
			$upgrade =  R::getAll("select id,title,content,FROM_UNIXTIME(ts_created) as ts_created,type from news where type='2' and status='0' and active='3' order by id desc limit 0,5");
			
			//var_dump($upgrade);
			  return $upgrade;
			
			}
	}	

