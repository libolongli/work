<?
	class module_user_install{
		function run(){
			k::load('api')->load('new','new')->install('install.sql');
			$url = k::url('user/login');
			echo "安装成功<a href='{$url}'>到首页</a>";
			exit;
		}
	}
