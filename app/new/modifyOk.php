<?php
class module_new_modifyOk
{
  function run()
  {

	//print_r($_POST);
	// 9.5 从modify.html中拿到id 用于修改
	$modifyArr = R::getAll("update news set type = '{$_POST['type']}',title='{$_POST['title']}',content='{$_POST['content']}' where id = '{$_POST['id']}'");
	//print_r($modifyArr);
	if($modifyArr){
		echo "<script type='text/javascript'>alert('修改成功');location.href='?m=new&a=list';</script>";
	}else{
		echo "<script type='text/javascript'>alert('修改成功');location.href='?m=new&a=list';</script>";
	}
		
		
		
  }
  
}