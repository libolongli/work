	<?
class module_test_test{

function run(){
$tpl = new tpl();
$this->getWeeks();
}
function  getWeeks(){
	$year = date("Y",time());
	$fday = mktime(0, 0, 0, 1, 1, $year);
	$date = explode("-",date("Y-m-d-w",$fday));

	$week = (int) $date[3];
	$data = array();
	if($week==0){
		array_push($data,date("Y-m-d",$fday));	
	 	$firstsun = $fday;
	 	$firstsat = $fday+86400*6;	
	}else{
		$leave = 86400*(6-$week);
	 	$firstsat = $fday+$leave;	
	 	$firstsun = $firstsat+86400;
	 	array_push($data,date("Y-m-d",$firstsat));	
	 	array_push($data,date("Y-m-d",$firstsun));
		
	 }
	$lyear = $year;
	while($lyear==$year){
	 	$firstsat = $firstsat+7*86400;
	 	$lyear =  date("Y",$firstsat);
	 	if($lyear==$year){
	 		 array_push($data,date("Y-m-d",$firstsat));
	 	}
	 	$firstsun = $firstsun+7*86400;
	 	$lyear =  date("Y",$firstsun);
		 
	 	if($lyear==$year){
	 		 array_push($data,date("Y-m-d",$firstsun));
	 	}

	}
	$array = array();
	//print_r($data);
	
	foreach ($data as $key => $value) {
	 	$arr['id'] = $key;
	 	$arr['title'] = "假期";
	 	$arr['start'] = $value."00:00:00";
	 	$arr['end'] = $value."23:59:59";
	 	$arr['editable'] = false;
	 	$arr['allDay'] = false;
	 	$arr['color'] = "#dd0000";
	 	$arr['borderColor'] = "#dd0000";
	 	$arr['textColor'] = "#ffffff";
	 	$arr['className'] = "fc_clock";
	 	array_push($array, $arr);
	}	
	echo  json_encode($array);

}
     

}