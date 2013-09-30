<?
	class module_graph_install{
		function run(){
			k::load('api')->load('new','new')->install('install.sql');
			//k::load('api')->load('new','new')->install('kc_course.sql');
			// k::load('api')->load('new','new')->install('kc_course_pack2.sql');
			//k::load('api')->load('new','new')->install('kc_course_pack_element.sql');
			$url = k::url('graph/index');
			echo "安装成功<a href='{$url}'>到首页</a>";
			exit;
		}
	}
