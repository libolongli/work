<?
	class module_new_update{
		function run(){
			if($_POST){
					$tmp = $_POST['id'];
					$str = implode(',',$tmp);
					}
				R::getAll("update news set status ='{$_POST['status']}' where id in($str)");
			}
		}
	