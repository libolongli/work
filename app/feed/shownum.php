<?php 
	class module_feed_shownum{
		function run(){
			$result = k::load('api')->load('feed','feed')->getEmailNum();
			$t = new tpl();
			$t->assign('no',$result['no']);
			$t->assign('yes',$result['yes']);
			$t->display('shownum');
		}
	}