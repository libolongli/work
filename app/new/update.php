<?
	class module_new_update{
		function run(){
			
			if($_POST){
					$tmp = $_POST['id'];
					if(is_array($tmp)){
						$id = implode(',',$tmp);
					}else{
						$id = $tmp;
					}
						$key = isset($_POST['status']) ? 'status' :'active';
					}
					//修改多条数据
				$data = R::getAll("update news set {$key} ='{$_POST[$key]}' where id in ($id)");
				return $data;
				
			}
		}
	