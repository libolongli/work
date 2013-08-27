<?php
class module_new_shownew
{
  function run()
  {
  		$tpl = new tpl();
    	$f = $_GET['url'];
    	echo $f;
			if($_POST){
				$this->$f($_POST);
				echo 111;
			}
	$data = k::load('new')->getRowLi();
	if($data){	
		foreach($data as $key =>$value){
		  $str = $value;
		 $tpl->assign('type_li',$str);
		}
	}

	$tpl->display('bench');
  }
}