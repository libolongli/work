<?php
	class module_tree_index{
		function run(){
			$json = $this->beforeDisplay();
			$t = new tpl();
			$t->assign('json',$json);
			$t->display('index');
		}
		
		function beforeDisplay(){
			$model = $_GET['model'];
			return k::load('tree')->getJsonData($model);
		}
	}
