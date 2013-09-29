<?php
	class module_phpdoc_install{
		function run(){
			if($_POST){
				$path = $_POST['path'];
				if(opendir($path)){
					$dir = dirname($GLOBALS['f']);
						$str = "<?php
	return array('path'=>'$path');
					";

					//安装 phpdoc
					$bat = "d:
cd $path
pear install phpDocumentor
					";
					
					file_put_contents($dir."/phpdoc.bat",$bat);
					system($dir."/phpdoc.bat");
					$url = k::url('phpdoc/index');;
					echo "phpdoc 安装完成<a href='{$url}'>生成phpdoc</a>";	
					exit;	
				}else{
					echo "该路径不存在!";
				}
			}
			$html = k::load('api')->load('form','form')->setInput(array('name'=>'path','title'=>'请输入PHP路径','tip'=>'请确定php环境支持pear'));
			$t = new tpl();
			$t->assign('html',$html);
			$t->assign('title','输入路径');
			$t->display('index');
		}
	}

