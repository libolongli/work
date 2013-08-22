<?php
class k_model_msg_user
{
  function login($u,$p)
  {
    echo 'msg .....login....'.$u.$p;
  }
  
   function islogin()
  {
    echo 'not login.......';
  }
  
  function reg($u,$p)
  {
    echo $u.$p;
  }
  
  function uid($u,$p)
  {
   return 1;
  }
  
  
}