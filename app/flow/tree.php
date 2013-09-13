<?php

class module_flow_tree{
	function run(){
		$t = new tpl();
		$t->assign('mainurl','?m=home&a=template&url=Grid&list=flow');
		$t->assign('lefturl','?m=tree&a=index&model=flow');
		$t->display('grid-tree','home');
	}

}