<?php
class module_new_add
{
  function run()
  {
			
	$data = k::load('new')->getOption('all');
	//print_r($data);exit;
	//print_r($data);
	//print_r(json_decode("[".$data."]"));exit;
	// $html = array();
	// $html[] = k::load('form','form')->setSelect(array('name'=>'username','title'=>'新闻类型','tip'=>'请输入类型','data'=>$data));
	
	// $html[] = k::load('form','form')->setTextarea(array('name'=>'content','title'=>'内容','tip'=>'请填写内容'));
	// $html[] = k::load('form','form')->setHideinput(array('name'=>'rids'));
	// $html = join(",",$html);
    $tpl = new tpl();
	$tpl->assign('option',$data);
	//$tpl->assign('html',$html);
	$tpl->display('add');
}
}

