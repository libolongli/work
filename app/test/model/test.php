<?php
	class k_model_test_test{
		private $_db;
		function __construct(){
		$this->_db = new db();
			}
		function getdata($post){
			$sql = '';
			if($post){	
				$str = '';	
				foreach($post as $k=>$v){
					//$k得到模块（表名）
					 $table = $k;
						foreach ($v as $key => $value) {
					//$key得到字段
					   $feild = $key;
					   $str .= $table.'.'.$feild.',';
					}					
				}
				 $newstr = substr($str,0,-1); 
			}
				$sql .='SELECT '.$newstr;
				$arr = array_keys($post);	 
				if(count($arr)>1){
				$sql .=' FROM '.$arr['0'];
				$sql .=' JOIN ';
				for($i=1;$i<count($arr);$i++){
				$sql .=$arr[$i].',';
				}
				}else{
				$sql .=' FROM '.$arr['0'].',';
				}
				$newsql = substr($sql,0,-1);
				$newsql .=' ON r_price.sid=r_student.sid';
				$data = R::getAll($newsql);
				print_r($data);
				return $data;				
			}
		function arrTmp($post){
				$tmp = '';
				$data = $this->getdata($post);
				foreach($data as $k=>$v){
					$tmp .= $v['price'].',';
				}
				$tmp = substr($tmp,0,-1);
				$arr = explode(',', $tmp);
				return $arr;
		}			
		function priceMax($post){
				$arrtmp = $this->arrTmp($post);
				echo max($arrtmp);

			}
		function priceMin($post){
				$arrtmp = $this->arrTmp($post);
				echo min($arrtmp);			
			}
		function priceSum($post){
				$arrtmp = $this->arrTmp($post);
				echo array_sum($arrtmp);
		}
		function priceAvg($post){
				$arrtmp = $this->arrTmp($post);
				$total = array_sum($arrtmp);
				$num = count($arrtmp);
				$avg = number_format($total/$num,2);
				echo $avg;
		}

		}





	























				// $sqlCount = "SELECT r.company_address,r.c_phone,r.c_duty,r.company,r.type,r.consumer,r.price,t.teacher 
				// 		 FROM report AS r
				// 		 JOIN rep_teacher AS t
				// 		 ON r.consumer=t.consumer AND t.teacher='王老师'
				// 		 ORDER BY r.consumer";	
				// $countData = R::getAll($sqlCount);
				// if($countData){
				//   //echo count($countData);
				// }

