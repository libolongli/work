<?php
	class module_flow_configadd{

		function run(){
			$this->afterDisplay();
			$t = new tpl();
			$t->a
			$t->display('configadd');
		}

		function afterDisplay(){
			if($_POST){
				K::load('flow')->configadd($_POST);
			}
		}
	}