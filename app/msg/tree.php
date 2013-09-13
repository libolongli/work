<?php
class module_msg_tree{
	function run(){
		$t = new tpl();
		$t->assign('mainurl','?m=home&a=template&url=Grid&list=msg');
		$t->assign('lefturl','?m=tree&a=index&model=msg');
		$t->display('grid-tree','home');
	}
}