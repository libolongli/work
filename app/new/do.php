<?php
class module_new_do
{
  function run()
  {
	
	$id = k::load('new')->addNew($_POST);

	if($id){
	
		echo "<script type='text/javascript'>alert('添加成功');location.href='http://www.project.com?m=new&a=list';</script>";
	}else{
		echo "<a href='http://www.project.com/?m=new&a=add'>添加失败!点击返回</a>";
	}
			$t = new tpl();
			$t->assign('type_li','');
			//header("Location: www.project.com?m=home&a=index");
		
  }
  
}