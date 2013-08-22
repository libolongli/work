<?php
class module_menu_add
{
  function run()
  {
  
	$data = k::load('menu')->getOption('all');
	$str = '';
	if($data){
		foreach($data as $key =>$value){
			if($str){
				$str.=",{value:{$value['id']}, name:'{$value['name']}'}";
			}else{
				$str.="{value:{$value['id']}, name:'{$value['name']}'}";
			}
		}
	}
	//echo $str;exit;
	$tpl = new tpl();
	$tpl->assign('option',$str);
	$tpl->display('add');
  }
  
}