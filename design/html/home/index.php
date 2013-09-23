<?php
class module_home_index
{
  function run()
  {
<<<<<<< HEAD
	$url = k::url('user/login');
	if(!isset($_SESSION['user'])) header('Location:$url');
  	$json = k::load('menu','menu')->getJsonMenu();
=======
	if(!isset($_SESSION['user'])) header('Location: ?m=user&a=login');
  	$json = k::load('api')->load('menu','menu')->getJsonMenu();
>>>>>>> fafe2d52b74ed4e17eaa1b60d5f58f4b6350178d
    $t=new tpl();
	
	//print_r($_SESSION);exit;
	$t->assign('json',$json);
	$t->display('home');
	
  }
}