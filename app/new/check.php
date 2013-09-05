<?
	class module_new_check{
		function run(){
						//print_r($_POST);
			if($_POST){
					$id = $_POST['id'];
					$active = $_POST['active'];
					}
					//修改多条数据
				$data = R::getAll("update news set active ='{$active}' where id = '{$id}'");
				return $data;	

			}
		}