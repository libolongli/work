<?
class k_model_syllabus_syllabus{
	private $data = array();

	function getData(){

		if(is_array($_POST['calender'])){
			$arr = $_POST['calender'][0];
			foreach($arr as $v){
				$str = implode(",",$arr);

			}
				
				echo $str;exit;
			}	
		
		if(isset($_SESSION['user']['user'])){
			$teacher = $_SESSION['user']['user'];
			}
			$time = time();
			$syllabus = R::dispense('syllabus');
			$syllabus->title = 'JAVA课程';
			$syllabus->start = $time;
			$syllabus->end = $time;	
			$syllabus->teacher = $teacher;
			$id = R::store($syllabus);
			return $id;

}


	function sqlData(){
		$sql = "select * from syllabus where status=1";
		$data = R::getAll($sql);
		echo json_encode($data);
	}



}