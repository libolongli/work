<?php
	class module_email_send{
		function run(){
			//测试
			k::load('api')->load('email','email')->send('1563095443@qq.com','你好啊','这是一个神奇的世界!');
		}

		function beforeDisplay(){
			
		}
	}