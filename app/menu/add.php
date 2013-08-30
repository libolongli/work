<?php
class module_menu_add
{
  function run()
  {
  
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
	//echo $str;exit;
	$tpl = new tpl();
	$tpl->assign('option',$str);
	$tpl->display('add');
  }
  
}