<?php
	class module_home_news{
		public function run(){
						$t = new tpl();
				$t->assign('data',$this->get_news());
		
				$t->display('news');					
			}
			function get_news()
			{
			$result =  R::getAll( 'select * from new order by id desc limit 0,5' );
			
			//var_dump($result);
			  return $result;
			}
	}	

