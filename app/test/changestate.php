<?php
class module_test_changestate{
	function run(){
	
		//if($_POST['state']){
		$_POST['atate'] = 1;
		$state=$_POST['state']==1?0:1;
		$isupdate=false;
		// 更新state 到数据库
		$isupdate=true; // 状态更新成功 
		echo $isupdate;
		//}
	}
}