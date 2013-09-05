<?php
class module_home_listinfo
{
	function run()
	{
			$id = $_GET['id'];
			$type = $_GET['type'];
			$t = new tpl();
			$t->assign('data',$this->shownews($id,$type));
			$t->display('listinfo');				
	}
	function shownews($id,$type){
		if($id && $type){
		$result =  R::getRow( "select * from news where id='{$id}' and type='{$type}'");
		return $result;
		}
		
		
	}
}