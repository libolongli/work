<?php
	class module_course_course{
		function run(){
			$t = new tpl();
			$this->deforeDisplay();
			$t->assign('url',$_SERVER['REQUEST_URI']);
			$html = array();
			$html[] = k::load('api')->load('form','form')->setInput(array('name'=>'name','title'=>'课程名称','tip'=>'请填写名称'));
			$html[] = k::load('api')->load('form','form')->setInput(array('name'=>'long','title'=>'课时长度','tip'=>'请填写秒数'));
			$html[] = k::load('api')->load('form','form')->setInput(array('name'=>'times','title'=>'课时次数','tip'=>'请填写次数'));
			$html[] = k::load('api')->load('form','form')->setHideinput(array('name'=>'rids'));
			$html[] = k::load('api')->load('form','form')->setPopup(array('name'=>'username','title'=>'教师姓名','tip'=>'请填写教师姓名',
				'ourl'=>'data.html'
				));

			$html = join(",",$html);
			$t->assign('html',$html); 
			$t->assign('title','添加课程'); 
			$t->display('add');
		}

		function deforeDisplay(){
			if($_POST){
				$map['name'] = $_POST['name'];
				$map['long'] = $_POST['long'];
				$map['times'] = $_POST['times'];
				$map['t_id'] = $_POST['rids'];
				$map['status'] = 1;
				$id = k::load('api')->load('course')->add('course',$map);
				if($id) echo "房间创建成功!<a href='{$_SERVER['REQUEST_URI']}'>点击返回 </a>";
				exit;
			}
		}
	}
