<?php
class module_msg_tree{
	function run(){
		$t = new tpl();
		$t->assign('mainurl',k::url('home/template',array('url'=>'Grid','list'=>'msg')));
		$t->assign('lefturl',k::url('tree/index',array('model'=>'msg')));
		$t->display('grid-tree','home');
	}
}