<?
class module_new_modify{
	function run(){
	
	$tpl = new tpl();
	$data = k::load('api')->load('new')->getOption('all');
	$type_titles = k::load('api')->load('new')->getModify();
	$tpl->assign('type_titles',$type_titles);
	$tpl->assign('option',$data);
	$tpl->display('modify');
	
	}

}