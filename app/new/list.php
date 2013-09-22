
<?php
	class module_new_list{
		function run(){
			$this->beforeDisplay();
			$t=new tpl();
			$t->display('list');
		}

		function beforeDisplay(){
			if(isset($_GET['back'])){	
				$map = array(
					'limit'=>$_POST['limit'],
					'offset'=>$_POST['offset']
					);
				if(isset($_POST['search'])){
					$search = k::load('api')->load('search','op')->teamSearch();
					$map['search'] = $search;
				}
				$data = k::load('api')->load('new')->searchNew($map);
				$array = array(
					'total'=>$data['total'],
					'page'=>$_POST['offset']/$_POST['limit'],
					'records'=>$data['data']
					);
				echo json_encode($array);exit;
			}
		 }
		}
	