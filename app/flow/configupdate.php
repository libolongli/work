<?php
	class module_flow_configupdate{

		function run(){
			$data = $this->beforeDisplay();
			$t = new tpl();
			$t->assign('data',$data);
			$t->display('configadd');
		}

		function beforeDisplay(){
			if($_POST){
				k::load('api')->load('flow')->configadd($_POST,$_GET['id']);
				$url = k::url('flow/configupdate',array('id'=>$_GET['id']));
				echo "操作成功!<a href = '{$url}'>点击返回 </a>";exit;
			}

			if($_GET['id']){
				$data = k::load('api')->load('flow')->getconfig(array('id'=>$_GET['id']));
				if($data) return $data['0'];
			}


		}
	}