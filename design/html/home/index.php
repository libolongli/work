<?php
class module_home_index
{
  function run()
  {
	if(!isset($_SESSION['user'])) header('Location: ?m=user&a=login');
  	$json = k::load('api')->load('menu','menu')->getJsonMenu();
    $t=new tpl();
	
	//print_r($_SESSION);exit;
	$t->assign('json',$json);
	$t->display('home');
	
  }
}