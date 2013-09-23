<?php

class module_flow_tree{
	function run(){
		$t = new tpl();
		$t->assign('mainurl',k::url('home/template',array('url'=>'Grid','list'=>'flow')));
		$t->assign('lefturl',k::url('tree/index',array('model'=>'flow','list'=>'flow')));
		$t->display('grid-tree','home');
	}

}