<?php
	class module_flow_configadd{

		function run(){
			$this->afterDisplay();
			$t = new tpl();
			$t->display('configadd');
		}

		function afterDisplay(){
			if($_POST){
				k::load('api')->load('flow')->configadd($_POST);
				$url = k::url('flow/configadd');
				echo "操作成功!<a href ='{$url}'>点击返回 </a>";exit;
			}
		}
	}