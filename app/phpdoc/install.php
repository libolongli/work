<?php
	class module_phpdoc_install{
		function run(){
			
		//system('tmp2.bat');exit;
			//echo 1;exit;
		//file_put_contents('tmp2.sh',"ls d:");
			// $sucommand = "su --login root --command"; 
			// $useradd = "useradd "; 
			// $rootpasswd = "verygood"; 
			// $user = "james"; 
			// $user_add = sprintf("%s %s %s",$sucommand,$useradd,$user); 

			// $fp = @popen($user_add,"w"); 

			// print_r($fp);exit;
			// @fputs($fp,$rootpasswd); 
			// @pclose($fp); exit;

			if($_POST){
				$path = $_POST['path'];
				if(opendir($path)){
					$dir = dirname($GLOBALS['f']);
						$str = "<?php
	return array('path'=>'$path');
					";

					//安装 phpdoc
					$bat = "cd $path
	pear install phpDocumentor
					";
					//$bar
					file_put_contents($dir."/phpdoc.bat",$bat);exit;
					system($dir."/phpdoc.bat");
				//	echo $str;exit;
					//system($str);exit;
					//system("cd tools\php");
					//system("Pear install phpDocumentor");





					// echo file_put_contents($dir.'/config.php', $str);exit;
				}else{
					echo "该路径不存在!";
				}
			}
			$html = k::load('api')->load('form','form')->setInput(array('name'=>'path','title'=>'请输入PHP路径'));
			$t = new tpl();
			$t->assign('html',$html);
			$t->assign('title','输入路径');
			$t->display('index');
		}
	}

