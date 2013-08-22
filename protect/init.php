<?php
//helper

function err($m)
{
  echo $m;
}

class tpl
{
  var $data;
  function assign($k,$v)
  { 
   $this->data[$k]=$v;
  }
  
  function display($f)
  {
	if($this->data){
		extract($this->data);
	}
	
	//first try theme/oa  
	
	$tpl=K_ROOT_PATH.'theme/oa/'.M.'/'. $f.'.html';
	
	if(!file_exists($tpl))
	{  
		$tpl=K_ROOT_PATH.APP_PATH_BASE.M.'/'. $f.'.html';
	}
	
	
	ob_start();
    include_once $tpl;
		
	$html = ob_get_contents();
	
	ob_end_clean();
	
	$src='"images/';
	
	$target='"/images/';
	
	$t_array = array('bench.html','bench_left.html','bench_main.html','bench_right.html','c_from.html','c_new.html','c_work.html','demo.html','grid-tree.html','home.html','tree.html');
	
	$target_html=str_replace($src,$target,$html);
	foreach($t_array as $key => $value){
		$arr = explode(".",$value);
		$str = "?m=".M."&a=template&url=".$arr[0];
		$target_html=str_replace($value,$str,$target_html);
	}
	
	echo $target_html;
	
  }
  
}



class k
{
  static $_db;
  
  static function init_db()
  { 
    if(self::$_db)
	{ 
	  return  self::$_db;
	}	

    require_once  K_PATH.'rb.php';
	
	 $config=require_once  K_PATH.'config.php';
	 
	 $db=$config['db'];
	 $conn="$db[driver]:host=$db[host];dbname=$db[dbname]";
	//mysql:host=localhost;dbname=project','root','root'
    
	R::setup($conn,$db['user'],$db['pass']); 
	
	
	
	//R::setup('mysql:host=localhost;dbname=project','root','root'); 
	  return true; 
    // return $db; 
  }
  
  static function  tpl()
  {
    return new tpl();
  }
  
  
  static function load($class,$module='')
  {  
 
 if($module=='')
 {
  $f=K_ROOT_PATH.APP_PATH_BASE.M.'/model/'. $class.'.php';
  $module=$class;
}
else
{
  $f=K_ROOT_PATH.APP_PATH_BASE.$module.'/model/'. $class.'.php';

}	

	if(!file_exists($f))
	{  
		$f=K_ROOT_PATH.'protect/model/'. $class.'.php';
	}
	
	
	
     include_once  $f;
	 
	 $class='k_model_'.$module.'_'.$class;
	 return new $class;
  }
  
}


//define ROOT
define('K_PATH',dirname(__FILE__).'/');
define('K_ROOT_PATH',dirname(dirname(__FILE__)).'/');

k::init_db();
