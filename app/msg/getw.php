<?php
	class module_msg_get{
		public function run(){
			$t = new tpl();
			$json = $this->getListJson();
			$t->assign('json',$json);
			$t->display('list');
			
		}
		
		public function getListJson(){
			$data = R::getAll('SELECT id as recid,rids,content,ts_created FROM msg order by id desc');
			$array = array(
				'total'=>count($data),
				'page'=>0,
				'records'=>$data
			);
			return json_encode($array);
		}
	}
