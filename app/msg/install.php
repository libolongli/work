<?php
class module_msg_install{
	function run(){
	//require_once 'db.class.php';
//$db= new msg_db();
//$link = mysql_connect('localhost', 'root', 'root');
$sql = <<<EOF1
create database project;
EOF1;
//mysql_query($sql);
	$dir = K_ROOT_PATH.M."/";
	$link = mysql_connect('localhost', 'root', 'root');
	mysql_select_db('project');
	$str = file_get_contents($dir.'db.sql');
	$arr = explode(';', $str);
	foreach ($arr as $key => $value) {
		if($value){
			mysql_query(trim($value));
		}
	}
	header("Location: http://www.project.com/?m=msg&a=send");
	}
}
