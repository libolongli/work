<?php
class module_new_do
{
  function run()
  {
	$id = k::load('api')->load('new')->addNew($_POST);
	if($id){
		$url = k::url('new/list');
		echo "<script type='text/javascript'>alert('添加成功');location.href='{$url}';</script>";
	}else{
		$addurl = k::url('new/add');
		echo "<a href='{$addurl}'>添加失败!点击返回</a>";
	}
			$t = new tpl();
			$t->assign('type_li','');	
  }
  
}