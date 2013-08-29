<?php
class k_model_user_user
{
  function login($u,$p)
  {
   
	 $ds = R::findOne('user',' user = ? and pass = ? ', 
                array( $u,$p )
               );
	
	 if(empty($ds))
	 {
	  return false;
	 }
	

	 $_SESSION['is_login']=true;	 
	 $_SESSION['user']['user']=$ds->user;
	 $_SESSION['user']['id']=$ds->id;	
	 
	// print_R($_SESSION);EXIT;
	 return true;
	 
  }
  
  
  
   function islogin()
  {
   return $_SESSION['is_login'];
    
  }
  
  function reg($u,$p)
  {
    $user = R::dispense('user');
	$user->user=$u;
	$user->pass=$p;
	$id= R::store($user);
	$_SESSION['is_login']=true;	 
	$_SESSION['user']['user']=$u;
	$_SESSION['user']['id']=$id;	
	if($id){
		$data = k::load('feed','feed')->send(array('uid'=>1,'rid'=>$id,'content'=>"新注册用户{$u}"));
	}
	
	return $id;
  }
  
  function uid()
  {
  return $_SESSION['user']['id'];
   //return 1;
  }
  
  function get_uid()
  {
   return $this->uid();
  }
  
  function login_out()
  {
   $_SESSION['is_login']=false;
  }
  
  function getUserList(){
	$uid = $_SESSION['user']['id'];
	$sql = "SELECT id as recid ,user as name from user where id != {$uid} ";

	$data = R::getAll($sql);
	return array(
		'total'=>count($data),
		'page'=>0,
		'records'=>$data,
	);
  }
  
  function getUserli(){
	$data = $this->getUserList();
	$data = $data['records'];
	$str = '';		
	foreach($data as $k=>$v){
		$str .= "<li uid='{$v['recid']}'>".$v['name']."</li>";
	}
	echo $str;
  }
  
  function getConsultInfo(){
	$sql = "select * from consult order by id desc limit 1";
	$data = R::getAll($sql);
	$data = $data[0];
	//print_R($data);exit;
	$json = "[{'title':'姓名', 'name':'{$data['realname']}','title1':'学号', 'name1':'{$data['studynum']}'},
			 {'title':'英语名字', 'name':'{$data['englishname']}','title1':'推荐卡号', 'name1':'{$data['card']}'},
			 {'title':'积分', 'name':'{$data['score']}','title1':'性别', 'name1':'男'},
			 {'title':'介绍', 'name':'{$data['introduce']}'}]";
	echo $json;
  }
  
}