<?
class module_feed_list{
		function run(){
			$t=new tpl();
			$json = k::load('feed')->getListJson();
			$t->assign('json',$json);
			$t->display('list');
		}
	}