<?php
	class module_email_api_email{
	
	/**
	* 用户注册
	*
	* @param  string $to  example@qq.com
	* @param  string $subject subject
	* @param  string $attach d:\web\aa.txt 要发送的附件的存储地址
	*/
		function send($to,$subject,$body,$attach=''){
			if($to&&$subject&&$body){
				try{
					$path =  dirname(dirname(__FILE__));
					require_once $path.'/email/class.phpmailer.php';
					$mail = new PHPMailer(true); //New instance, with exceptions enabled
					$config = include $path.'/config.php';
					$mail->IsSMTP();                           // tell the class to use SMTP
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->Port       = $config['port'];                    // set the SMTP server port
					$mail->Host       = $config['host']; // SMTP server
					$mail->Username   = $config['username'];     // SMTP server username
					$mail->Password   = $config['password'];            // SMTP server password
					$mail->AddReplyTo($config['username'],"南博教育");
					$mail->From       = $config['username'];
					$mail->FromName   = "南博教育";
					$mail->AddAddress($to);
					//当需要发送附件的时候根据路径名发送附件
					if($attach){
						$a_name = basename($attach);
						$mail->AddAttachment($attach,$a_name);
					}
					$mail->Subject  = $subject;
					$mail->WordWrap   = 80;
					$mail->MsgHTML($body);
					$mail->IsHTML(true); // send as HTML
					$mail->Send();
				}catch(phpmailerException $e){
					echo $e->errorMessage();
				}
			}else{
				echo '请填写收件人,主题或者内容!';
			}
		}
	}
