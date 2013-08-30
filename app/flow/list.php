<?php
	class module_flow_list{
		function run(){
			$t=new tpl();
			$t->assign('title','工作流');
			$t->display('list');
		}
	}
	
