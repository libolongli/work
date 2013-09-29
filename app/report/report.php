<?php
	class module_report_report{
		function run(){
			$_POST['name'] = 'mafei';
			k::load('api')->load('report')->raw('mafei');
		}
	}