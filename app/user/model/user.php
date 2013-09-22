<?php
class k_model_user_user
{
 
  /**
	* 用户登录
	*
	* @param  string $u
	* @param  string $p
	* @return int
	*/
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
	 
	 return true;
	 
  }
  
  /**
	* 返回登录状态
	*
	* @return bool
	*/
  
   function islogin()
  {
   return $_SESSION['is_login'];
    
  }
  
  /**
	* 用户注册
	*
	* @param  string $u
	* @param  string $p
	* @return int
	*/
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
  
  /**
	* 拿取用户ID
	*
	* @return int
	*/
  function uid()
  {
  	if(!isset($_SESSION)) header('Location: ?m=home');
  	return $_SESSION['user']['id'];
  }
  
  /**
	* 拿取用户ID
	*
	* @return int
	*/
  function get_uid()
  {
   return $this->uid();
  }
  
  /**
	* 退出登录
	*
	*/
  function login_out()
  {
   $_SESSION['is_login']=false;
  }
  
  /**
	* 拿取用户列表
	* 

	* @return array
	*/
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
  

    /**
	* 拿取用户列表
	* 
	*$map = array(
   	 *  'user'=>'Nomius',
   	 *	'pass'=>'1111111',
	*)
	* @return array
	*/

  function getUser($map = array()){
  	$where = "WHERE 1=1 ";
	$sql = "select id,user as name from user ";
	foreach($map as $key=>$value){
		$where .= "AND {$key}={$value}";
	}
	return R::getAll($sql);
  }
  
}