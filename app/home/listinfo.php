<?php
class module_home_listinfo
{
	function run()
	{
			$id = $_GET['id'];
			$type = $_GET['type'];
			//echo $type;
			$t = new tpl();
			$t->assign('data',$this->shownews($id,$type));
			$t->display('listinfo');				
	}
	function shownews($id,$type){
		if($id && $type){
		$result =  R::getRow( "select * from news where id='{$id}' or type='{$type}'");
		//var_dump($result);
		return $result;
		}
		
		
	}
}