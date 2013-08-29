<?php
class module_new_add
{
  function run()
  {
			
$data = k::load('new')->getOption('all');
print_r($data);
	$str = '';
	//$data = k::load('new')->getRowLi('1');

  
    	$tpl = new tpl();
	//$tpl->assign('data',$str);
	$tpl->assign('option',$data);
	$tpl->display('add');
}
}

