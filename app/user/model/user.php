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
		$data = k::load('feed','feed')->send(array('username'=>'system','getname'=>'admin','content'=>"新注册用户{$u}"));
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
  
  
}