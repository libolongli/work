功能简介
	这个模块主要是用作发送邮件,为其他模块服务
数据表
	在user 表里面新添加了一个email字段,用于发送邮件
	在feed 表里面新添加了一个mode字段用来辨认 是feed/sms/email
		
  是怎么设计的(核心过程)
	操作流程
		1 请先完善用户表里面的email 字段 这样发送的时候才能发送邮件
		2 再将自己的邮箱地址等信息 填写在config.php 文件中
		3 crond.php 是后台发送邮件使用的,现在做的主要是feed模块的邮件发送,如果想要发送其它地方的邮件请往sendEmail里面添加新的函数
		4 在http://www.project.com/?m=feed&a=shownum 下面能看到已经发送了多少邮件和还有多少邮件没有发送
		
		