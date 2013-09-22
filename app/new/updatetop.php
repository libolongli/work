<?php
class module_new_updatetop
{
  function run()
  {
		$tpl = new tpl();
	 k::load('api')->load('new')->getTop();
  }
  
}