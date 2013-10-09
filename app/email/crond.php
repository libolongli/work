<?php
	$root = dirname(dirname(dirname(__FILE__)));
	$config =include $root.'/protect/config.php';
	require_once $root.'/app/email/api/email.php';
	$DB = $config['db'];
	
	$connect = @mysql_connect($DB['host'], $DB['user'], $DB['pass']);
	@mysql_select_db($DB['dbname'], $connect);
	
	//发送邮件
	sendEmail();


	function sendEmail(){
		sendFeed();
		//在此处添加其他地方的邮件发送的方法
		

		sleep(5);
		sendEmail();
	}

	//发送feed模块的邮件
	function sendFeed(){
		$email = new module_email_api_email();
		$data = getFeed();
		foreach($data as $key=>$value){
			$email->send($value['email'],'feed邮件',$value['content']);
			$update = "update feed set status=2 where id={$value['id']}";
			mysql_query($update);
		}
	}
	
	//获取要发送的内容
	function getFeed(){
		$sql = "SELECT f.*,u.email FROM feed as f inner join user as u on f.rid=u.id where f.status!=2 and f.mode=2";
		$data = fetch_all($sql);
		return $data;
	}
	

	function fetch_all($sql, $id = '') {
		$arr = array();
		$query = mysql_query($sql);
		while(!!$data = fetch_array($query)) {
			$id ? $arr[$data[$id]] = $data : $arr[] = $data;
		}
		return $arr;
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}
	

