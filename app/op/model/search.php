<?php
	class k_model_op_search{
		
		function teamSearch(){
			$search = $_POST['search'];
			$logic = $_POST['search-logic'];
			$data = array();
			foreach ($search as $key => $value) {
				if($value['value']){
					$like = '';
					switch ($value['operator']) {
						case 'contains':
							$like = " LIKE '%{$value['value']}%'";
							break;
						case 'begins with':
							$like = " LIKE '{$value['value']}%'";
							break;
						case 'ends with':
							$like = " LIKE '%{$value['value']}'";
							break;
						case 'is':
							$like = "= '{$value['value']}'";
							break;
						default:
							$like = " LIKE '%{$value['value']}%'";
							break;
					}
				}
				$tmp['field'] = $value['field'];
				$tmp['like'] = $like;
				array_push($data, $tmp);
			}

			return array(

					'search'=>$data,
					'logic'=>$logic,
				);
		}
	}