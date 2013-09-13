<?php
class module_new_updatetop
{
  function run()
  {
		$tpl = new tpl();
	 k::load('new')->getTop();
  }
  
}