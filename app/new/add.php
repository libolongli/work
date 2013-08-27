<?php
class module_new_add
{
  function run()
  {

	$data = k::load('new')->getRowLi('new');

	if($data){	
		foreach($data as $key =>$value){
					$str = $value;
					//print_r($value);

	}
	 //$data;exit;

  }
  	$tpl = new tpl();
	//$tpl->assign('data',$str);
	$tpl->display('add');
  }
}