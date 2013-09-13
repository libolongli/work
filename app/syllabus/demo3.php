<?
class module_test_demo3{
		function run(){
		$tpl = new tpl();
		$this->getPOST();
	}
	function getPOST(){

		if ($_POST) {
			print_r($_POST);
			echo '1111';
			echo $_POST['calender'];
			}

	}

	}