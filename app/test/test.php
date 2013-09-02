<?
class module_test_test{

function run(){
$tpl = new tpl();
$this->getIp();
}
function getIp(){
		//print_r($_SERVER);
		//获取服务器ip
		echo $_SERVER["REMOTE_ADDR"];
		//透过代理服务器取得客户端的真实 IP 地址
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		echo $ip;
		
$UserIp = ($_SERVER['HTTP_VIA']) ?$_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$UserIp = ($UserIp) ? $UserIp : $_SERVER['REMOTE_ADDR'];
echo $UserIp;

		 
}


}