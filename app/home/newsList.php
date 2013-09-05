<?php
class module_home_newsList
{
	function run()
	{
			$t = new tpl();
			$t->assign('data',$this->shownews($id));
			$t->display('newsList');				
	}
	function shownews($id){
		if($id){
		$result =  R::getRow( "select * from news where id='{$id}'");
		var_dump($result);
		return $result;
		}
		
		
	}
}