<?php
	class module_course_schedule{
		function run(){
			$this->beforeDisplay();
			$t = new tpl();
			$course = k::load('api')->load('course')->getCourse();
			$t->assign('course',$course);
			$t->display('schedule');
		}

		function beforeDisplay(){

			//ajax提交课程表数据过来的时候保存课程表信息
			if(isset($_POST['calender'])){
				$id = k::load('api')->load('course')->addSchedules($_POST);
				if($id) echo "success";exit;
			}	

			//当用户选择了教师,教室,班级的时候进行跳转
			if(isset($_POST['t_id'])){
				$url = $_SERVER['REQUEST_URI']."&t_id={$_POST['t_id']}&r_id={$_POST['r_id']}&g_id={$_POST['r_id']}";
				header("Location: $url");
			}

			//当没有传递参数的时候
			if(!isset($_GET['t_id'])){
				$t = new tpl();
				$t->assign('url',$_SERVER['REQUEST_URI']);
				$grade = k::load('api')->load('course')->getGrade();
				$user = k::load('api')->load('user','user')->getUser();
				$room = k::load('api')->load('course')->getRoom();
				$html = array();
				$html[] = k::load('api')->load('form','form')->setSelect(array('name'=>'grade','title'=>'班级','tip'=>'请选择班级','data'=>$grade));
				$html[] = k::load('api')->load('form','form')->setSelect(array('name'=>'t_id','title'=>'教师','tip'=>'请选择教师','data'=>$user));
				$html[] = k::load('api')->load('form','form')->setSelect(array('name'=>'r_id','title'=>'教室','tip'=>'请选择教师','data'=>$room));
				//print_r($html);exit;
				$t->assign('html',join(',',$html));
				$t->display('select');
				exit;
			}


		}
	}
