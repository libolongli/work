<?php
class module_home_index
{
  function run()
  {
  	$json = k::load('menu','menu')->getJsonMenu();
    $t=new tpl();
	
	//print_r($_SESSION);exit;
	$t->assign('json',$json);
	$t->display('home');
	
  }
}