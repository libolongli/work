<?php
	require_once K_ROOT_PATH.'rb.php';
	//$db = new db();
	//$db->connect('localhost','root','root','project');
	$link = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('project');
	$dir = K_ROOT_PATH.M."/";
	$str = file_get_contents($dir.'db.sql');
	$arr = explode(';', $str);
	foreach ($arr as $key => $value) {
		if($value){
			mysql_query(trim($value));
		}
	}
	mysql_close();
	echo  "配置成功!</br>";
	echo  '<a href = "send.php">send.php</a></br>';
	echo  '<a href = "update.php">update.php</a>';
	echo  '<a href = "get.php">get.php</a>';

