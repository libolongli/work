<?php
	require_once 'db.class.php';
	$db = new db();
	$db->connect('localhost','root','root','project');
	$_POST['applydate'] = time();
	$k = implode(",", array_keys($_POST));
	$v = implode("','", array_values($_POST));
	$v ="'".$v."'"; 

	$sql = "insert into consult ($k) VALUES($v)";
	$db->query($sql);
	$insert_id = $db->insert_id();
	//echo $insert_id;exit;
	if($insert_id){
		require_once 'task.class.php';
		$task = new task('user/add');
		$task->add(array('uid'=>0,'rids'=>'1','user'=>$_POST['realname']));
		echo "添加成功!</br>";
		echo "到<a href='list.php'>列表页</a></br>";
		echo "到<a href='add.php'>添加页面</a>";

	}

	//print_r(array_keys($_POST));
	//print_r(array_values($_POST));exit;
	// foreach ($_POST as $key => $value) {
		
	// }
