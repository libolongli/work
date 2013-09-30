<?
	class module_flow_install{
		function run(){
			k::load('api')->load('new','new')->install('install.sql');
			$url = k::url('flow/send');
			echo "安装成功<a href='{$url}'>到首页</a>";
			exit;
		}
	}
