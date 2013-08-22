<?php
class user
{
  function login($u,$p)
  {
    echo 'login....'.$u.$p;
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