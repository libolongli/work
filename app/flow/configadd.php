<?php
	class module_flow_configadd{

		function run(){
			$this->afterDisplay();
			$t = new tpl();
			$t->display('configadd');
		}

		function afterDisplay(){
			if($_POST){
				K::load('flow')->configadd($_POST);
				echo "操作成功!<a href ='?m=flow&a=configadd'>点击返回 </a>";exit;
			}
		}
	}