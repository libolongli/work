<?php

		require 'db.class.php';
			$db = new Db();
			$db->connect('localhost','root','7322290','from','utf8');
$postArr = $_POST;
$key = array_keys($postArr);   
$data = array_map("addslashes", $postArr);   
$key = array_map("addslashes", $key);   
$keyString = implode(",", $key);   
$dataString = implode("','", $postArr);   
$sql = "insert into form ($keyString) values ('$dataString')";   
$db->query($sql);

