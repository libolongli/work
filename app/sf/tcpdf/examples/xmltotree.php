<?php

//测试数据
$xml = new xmltotree();
$data = $xml->run('11.xml');
print_r($data);exit;

/*
	用于将XML数据转换成数组,并且带PID,level等信息
*/
class xmltotree
{
	private $data; //用于存放最终要返回的忽觉
	private $pid;  //用于存放临时的父节点的相关信息

    //解析XML文件 并将XML解析成数组
	public function parse($file){
		$this->pid = array();
		$this->data = array();
		$data = file_get_contents($file);
		$xmlObj = simplexml_load_string($data);
		$arrXml = $this->objectsIntoArray($xmlObj->node);
		return $arrXml;
	}

 	//组织想要的数据
	public function teamData($data,$level=2){
		foreach ($data as $key => $value){
			if($key === '@attributes'){
				if(isset($value['TEXT'])){
				 $level--;
				 $tmp['level']=$level;
				 $tmp['text']=$value['TEXT'];
				 $tmp['pid'] = 0;
				 if($level!=1){
					 if($this->pid){
					 	 $tmppid = array_reverse($this->pid);			 	  
					 	 foreach ($tmppid as $k => $v) {
					 	 	 $tmpkey = array_search($level-1, $v);
					 	 	 if($tmpkey){	
					 	 	 	$tmp['pid'] = $v['id']-1;
					 	 	 	break;
					 	 	 }
					 	 }
					 }
				}			
				 array_push($this->data,$tmp);
				 array_push($this->pid,array('level'=>$level,'id'=>count($this->data)));	 
				}		
			}

		 	if((is_int($key)) || ($key === 'node')){
				if($key === 'node'){
					$level = $level+2;
				}
				$this->teamData($value,$level);		
			}
		}
	}

	//用递归方式解析XML文件 并将XML解析成数组
	public function objectsIntoArray($arrObjData,$arrSkipIndices = array()){
		 $arrData = array();
	     if (is_object($arrObjData)) {
	         $arrObjData = get_object_vars($arrObjData);
	     }
	     if (is_array($arrObjData)) {
	         foreach ($arrObjData as $key => $value) {
	             if (is_object($value) || is_array($value)) {
	                 $value = $this->objectsIntoArray($value, $arrSkipIndices); // recursive call
	             }
	             if (in_array($key, $arrSkipIndices)) {
	                 continue;
	             }
	             $arrData[$key] = $value;
	         }
	     }
	     return $arrData;
	}

	public function run($file){
		$data = $this->parse($file);
		$this->teamData($data);
		unset($this->pid);
		return $this->data;
	}
}






?>