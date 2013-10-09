<?php
	class module_sf_index{
		function run(){
			$this->beforeDisplay();
			$t = new tpl();
			$html = array();
			$html[] = k::load('api')->load('form','form')->setInput(array('name'=>'path','title'=>'freemind路径','tip'=>'请填写路径'));
			$html[] = k::load('api')->load('form','form')->setSelect(array('name'=>'type','title'=>'类型','tip'=>'请选择类型','data'=>array(
				array('id'=>1,'name'=>'pdf'),array('id'=>2,'name'=>'database'),array('id'=>3,'name'=>'html')))
			);
			$t->assign('title','freemind');
			$html = join(",",$html);
			$t->assign('html',$html);
			$t->display('index');
			
		}

		function beforeDisplay(){
			if($_POST){
				$path = $_POST['path'];
				$type = $_POST['type'];
				$filename = basename($path);
				$data = k::load('api')->load('xmltoarray','sf')->run($path);
				$pdf=k::load('api')->load('pdf','sf');
				$pdf->config(0,'id','pid','text','text',0);
				
				//
				if($type==1){
					//导出pdf
					$filename = explode(".",$filename);
					$filename = $filename[0].'.pdf';
					$pdf->outpdf($data,$filename);;
				}elseif($type==2){
					//写入数据库
					k::load('api')->load('db','sf')->store(1,$data);	
					echo "写入成功!";
					exit;
				}elseif($type==3){
					//生成html
					$rdata = $pdf->getData($data);
					k::load('api')->load('html','sf')->run($rdata);
				}
			}
		}
	}