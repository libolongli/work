<?php
class module_new_add
{
  function run()
  {

	$data = k::load('new')->getRowLi();

	if($data){	
		foreach($data as $key =>$value){
					$str = $value;
				//	print_r($value);

	}
	//echo $data;exit;
	$tpl = new tpl();
//	$tpl->assign('type_li',$str);
	$tpl->display('add');
  }
  
  }
}