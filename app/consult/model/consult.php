<?php
	class k_model_consult_consult{
		function add($data){
			$consult = R::dispense('consult');
			$field = array('rpeople','studynum','realname','englishname',
				'card','score','comemsg','status','course','class','sex',
				'profession','introduce'
			);
			foreach($data as $key =>$value){
				if(in_array($key,$field)){
					$consult->$key= $value;
				}
			}
			$id = R::store($consult);
			return $id;
		}	
	}
