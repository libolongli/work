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