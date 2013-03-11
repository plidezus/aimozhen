<?php
include '../include/init.php';
	
	require("../include/mail/class.phpmailer.php"); //下载的文件必须放在该文件所在目录
	$mail = new PHPMailer(); //建立邮件发送类
	$address = 'admin@aimozhen.com';
	$mail->IsSMTP(); // 使用SMTP方式发送
	$mail->CharSet='UTF-8';// 设置邮件的字符编码
	$mail->Host = "smtp.qq.com"; // 您的企业邮局域名
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	$mail->Username = "122748715@qq.com" ; // 邮局用户名(请填写完整的email地址)
	$mail->Password = "FxP930311321"; // 邮局密码
	$mail->From = "122748715@qq.com"; //邮件发送者email地址
	$mail->FromName = "艾墨镇网站";
	$mail->AddAddress("admin@aimozhen.com", "艾墨镇");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
	//$mail->AddReplyTo("", "");
	//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
	$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
	$mail->Subject = "【内测申请】艾墨镇内测用户申请"; //邮件标题
	$mail->Body = '
	<p>【内测申请】艾墨镇内测用户申请</p>
	<p>【Email】 ' .$_POST['email']. '</p>
	<p>【真实姓名】 ' .$_POST['name']. '</p>
	<p>【性别】 ' .$_POST['sex']. '</p>
	<p>【注册原因】 ' .$_POST['reason']. '</p>
	<p>艾墨镇 分享视频 创造梦想 <a href="http://aimozhen.com/" target="_blank">http://aimozhen.com/</a></p>
	'; //邮件内容
	$mail->AltBody = "艾墨镇，分享视频，创造梦想 http://aimozhen.com/"; //附加信息，可以省略
	if(!$mail->Send())
	{
	header('LOCATION:../?mailerr');
	
	}
	header('LOCATION:../?mailok');