<?php
	class module_consult_add{
		function run(){
			$id = k::load('consult')->add($_POST);
			if($id){
				header('Location: ?m=home&a=template&url=s_detailed');
			}else{
				header('Location: ?m=home&a=template&url=c_from');
			}
		}
	}