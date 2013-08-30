<?php
class module_home_listinfo
{
	function run()
	{
			$id = $_GET['id'];
			$t = new tpl();
			$t->assign('data',$this->shownews($id));
			$t->display('listinfo');				
	}
	function shownews($id){
		if($id){
		$result =  R::getRow( "select * from new where id='{$id}'");
		//var_dump($result);
		return $result;
		}
		
		
	}
}