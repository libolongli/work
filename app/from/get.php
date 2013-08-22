<?php
class module_from_get{
	private $db;
	function run(){
	require 'db.class.php';
	$this->db = new Db();
	$this->db->connect('localhost','root','7322290','from','utf8');
	if ($_GET['f'] == 'add'){
		$this->add();
	}else{
		$this->getlist();
	}
	}
		function add(){
				$postArr = $_POST;
				$key = array_keys($postArr);   
				$data = array_map("addslashes", $postArr);   
				$key = array_map("addslashes", $key);   
				$keyString = implode(",", $key);   
				$dataString = implode("','", $postArr);   
				$sql = "insert into form ($keyString) values ('$dataString')";   
				$this->db->query($sql);
					header("Location: http://localhost/mini-frameword/?m=from&a=list");
	
	}
	
		function getlist(){
	$sql = "select * from form order by id desc";
	$result = $this->db->fetch_all($sql);
	//print_r($result);exit;
		$arr = array(
							'total'=>count($result),
							'recordsPerPage'=>'13',
							'records'=>$result
		);
		//	for ($i=3;$i<50;$i++){
	//	$sql1 = "insert into form values ('{$i}','小马{$i}','2011-11-11','111','马蒂','madi','11111','10','1','0','英语','成都','1','学生','123')";
	//	//$sql1 = "insert into form (id) values ('2')";
	//	$query = $db->query($sql1);
	//	}
	  echo json_encode($arr);
	}
}




  