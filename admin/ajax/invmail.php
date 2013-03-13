<?php
include '../../include/init.php';


	require("../../include/mail/class.phpmailer.php"); //下载的文件必须放在该文件所在目录
	$mail = new PHPMailer(); //建立邮件发送类
	$mail->IsSMTP(); // 使用SMTP方式发送
	$mail->CharSet='UTF-8';// 设置邮件的字符编码
	$mail->Host = "smtp.exmail.qq.com"; // 您的企业邮局域名
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	$mail->Username = "hello@aimozhen.net" ; // 邮局用户名(请填写完整的email地址)
	$mail->Password = "tasteanime1"; // 邮局密码
	$mail->From = "hello@aimozhen.net"; //邮件发送者email地址
	$mail->FromName = "艾墨镇网站";
	$address = $_GET['email'] ;
	$addressmd5 = md5($_GET['email'] . 'check') ;
	$mail->AddAddress($address, "");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
	//$mail->AddReplyTo("", "");
	//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
	$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
	$mail->Subject = "艾墨镇 欢迎你！"; //邮件标题
	
	$mail->Body = '
	<p>亲爱的镇民 :</p>
	<p>你的申请已经通过我们的审核，快点击下面的链接开启你的奇幻之旅吧！</p>
	<p><a href="http://aimozhen.com/reg.php?email='. $address .'&s='. $addressmd5 .'" target="_blank">http://aimozhen.com/reg.php?email='. $address .'&s='. $addressmd5 .'</a></p>
	<p>艾墨镇 分享视频 创造梦想 <a href="http://aimozhen.com/" target="_blank">http://aimozhen.com/</a></p>
	'; //邮件内容
	$mail->AltBody = "艾墨镇，分享视频，创造梦想 http://aimozhen.com/"; //附加信息，可以省略
	if(!$mail->Send())
		{ header('LOCATION:/?mailerr');}
	header('LOCATION:/?mailok');
		
		
