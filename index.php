<?php
//PRINT_R($_SESSION);EXIT;
//mvc 
//echo 225454545433
/**
route type 1

?m=MouduleA&a=action1
*/

/**
unsafe 
*/
include 'protect/init.php';
//$content = file_get_contents('3.jpg');
//print_r($content);exit;
$m=@$_GET['m'];
$a=@$_GET['a'];


if($m=='')$m='home';
if($a=='')$a='index';


define('M',$m);
define('A',$a);
define('APP_PATH_BASE','app/');

//get m[folder] and a[file]

$req=$m.'/'.$a.'.php';

//req file
$f=K_ROOT_PATH.APP_PATH_BASE.$req;
 

if(file_exists($f))
{
  include_once($f);
  $oo='module_'.$m.'_'.$a;
  //echo $oo;
  $o=new $oo;
  $o->run();
  
}
else
{
  err('action not found');
}

