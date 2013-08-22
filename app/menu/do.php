<?php
class module_menu_do
{
  function run()
  {
	$id = k::load('menu')->addMenu($_POST);
	if($id){
		header('Location: http://www.project.com/?m=menu&a=add');
	}else{
		echo "<a href='http://www.project.com/?m=menu&a=add'>添加失败!点击返回</a>";
	}
  }
  
}