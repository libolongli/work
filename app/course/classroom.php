<?php
	class module_course_classroom{
		function run(){
			$t = new tpl();
			$this->deforeDisplay();
			$t->assign('url',$_SERVER['REQUEST_URI']);
			$input = k::load('api')->load('form','form')->setInput(array('name'=>'name','title'=>'教室名称','tip'=>'请填写名称'));
			$html =array($input);
			$html = join(",",$html);
			$t->assign('html',$html); 
			$t->assign('title','添加教室'); 
			$t->display('add');
			
		}

		function deforeDisplay(){
			if($_POST){
				$id = k::load('api')->load('course')->add('classroom',array('name'=>$_POST['name']));
				if($id) echo "房间创建成功!<a href='{$_SERVER['REQUEST_URI']}'>点击返回 </a>";
				exit;
			}
		}
	}
