<?
	class module_new_update{
		function run(){
			if($_POST){
					$tmp = $_POST['id'];
					$str = implode(',',$tmp);
					}
					//修改多条数据
				R::getAll("update news set status ='{$_POST['status']}' where id in($str)");
			}
		}
	