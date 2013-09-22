<?php
	class k_model_op_search{
			
		/**
		* 重新组织POST过来的数据
		*
		* @return array
		*/
		function teamSearch(){
			//print_r($_POST);EXIT;
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
							$like = " = '{$value['value']}'";
							break;
						default:
							$like = " LIKE '%{$value['value']}%'";
							break;
					}
				}
				$tmp['field'] = $value['field'];
				$tmp['like'] = $like;
				$tmp['logic'] = isset($value['search-logic']) ? $value['search-logic'] : $logic;
				if($tmp['logic']=='and'){
					array_unshift($data,$tmp);
				}else{
					array_push($data, $tmp);
				}
			}

			// if($data['0']['logic']!='and'){
			// 	return false;
			// }

			$re = array(
				'search'=>$data,
				'logic'=>$logic,
			);

			return $re;
		}

		function teamSql($sql='',$map){
			if($map['search']){
				$str = "";
				foreach ($map['search']['search'] as $key => $value) {
	    			$str .= $str ?" ".$value['logic']." ".$value['field'].$value['like'] : " ".$value['field'].$value['like'];
	    		}
	    		if($sql){
	    			return $sql." AND (".$str.") ";
	    		}else{
	    			return $str;
	    		}
	    		return $sql."(".$str.")";
    		}else{
    			return '';
    		}
		}
	}