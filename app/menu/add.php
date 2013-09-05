<?php
class module_menu_add
{
  /**
	 * Executes SQL code and allows key-value binding.
	 * This function allows you to provide an array with values to bind
	 * to query parameters. For instance you can bind values to question
	 * marks in the query. Each value in the array corresponds to the
	 * question mark in the query that matches the position of the value in the
	 * array. You can also bind values using explicit keys, for instance
	 * array(":key"=>123) will bind the integer 123 to the key :key in the
	 * SQL. This method has no return value.
	 *
	 * @param string $sql	  SQL Code to execute
	 * @param array  $aValues Values to bind to SQL query
	 *
	 * @return void
	 * @author libo
	 */
  function run()
  {
	if($_POST){
		$id = k::load('menu')->addMenu($_POST);
		if($id){
			header('Location: ?m=menu&a=add');
		}else{
			echo "<a href='?m=menu&a=add'>添加失败!点击返回</a>";exit;;
		}
	}
	$data = k::load('menu')->getOption('all');
	$str = '';
	if($data){
		$data = array_reverse($data);
		foreach($data as $key =>$value){
			$tag = '--';
			for($i=1;$i<$value['level'];$i++){
				$tag.=$tag;
			}
			$name = $tag.$value['name'];
			if($str){
				$str.=",{value:{$value['id']}, name:'{$name}'}";
			}else{
				$str.="{value:{$value['id']}, name:'{$name}'}";
			}
		}
	}
	$tpl = new tpl();
	$tpl->assign('option',$str);
	$tpl->display('add');
  }
  
}