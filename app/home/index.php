<?php
class module_home_index
{
  function run()
  {
    $t=new tpl();
	//$t->assign('url','http://www.project.com/app/home/');
	
	$t->display('home');
	
  }
}