<?php
	class module_phpdoc_index{
		function run(){
			$this->beforeDisplay();
			$t = new tpl();
			$html = array();
			$html[] = k::load('api')->load('form','form')->setInput(array('name'=>'spath','title'=>'要生成html的路径'));
			$html[] = k::load('api')->load('form','form')->setInput(array('name'=>'tpath','title'=>'生成html保存的路径'));
			$html = join(',',$html);
			$t->assign('title','phpdoc');
			$t->assign('html',$html);
			$t->display('index');
		}

		function beforeDisplay(){
			if($_POST){
				$spath = $_POST['spath'];
				$tpath = $_POST['tpath'];
				$dir = dirname($GLOBALS['f']);
				// echo $dir."config.php";exit;
				$config = include $dir."/config.php";
				$path = $config['path'];
				$str = 'Phpdoc -d  "'.$spath.'" -t "'.$tpath.'" -o "HTML:frames:phpedit"';
				$bat = "d:
cd $path
{$str}
					";
				file_put_contents($dir."/go.bat",$bat);
				exec($dir."/go.bat");
				echo "生成成功!请到{$tpath}查看!";
				exit;
			}
		}
	}