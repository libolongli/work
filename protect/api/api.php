<?php
class api
{
    function load($a,$b='')
    {
    	return k::load($a,$b);
    }

  function factory($module,$op){
  	$f=K_ROOT_PATH.APP_PATH_BASE.$module.'/api/factory/'. $op.'.php';
  	
  	$class='module_'.$module.'_api_factory_'.$op;
    
    include_once  $f;
	
	return new $class;
  }
}