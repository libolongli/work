<?php
class module_home_index
{
  function run()
  {
  	$json = k::load('menu','menu')->getJsonMenu();
    $t=new tpl();
	$t->assign('json',$json);
	$t->display('home');
	
  }
}