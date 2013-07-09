<?php
include '../include/init.php';
	
	require("../include/mail/class.phpmailer.php");
	$config = Config::get('env.mail');
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->CharSet='UTF-8';
	$mail->Host = $config['Host']; 
	$mail->SMTPAuth = true; 
	$mail->Username = $config['Username'] ; 
	$mail->Password = $config['Password'];
	$mail->From = $config['Username']; 
	$mail->FromName = $config['FromName'];
	$mail->AddAddress("admin@aimozhen.com", "艾墨镇");
	$mail->IsHTML(true); 
	$mail->Subject = "【内测申请】艾墨镇内测用户申请"; 
	$mail->Body = '
	<p>【内测申请】艾墨镇内测用户申请</p
	<p>【UID】 ' .$_POST['uid']. '</p>
	<p>【Email】 ' .$_POST['email']. '</p>
	<p>【真实姓名】 ' .$_POST['name']. '</p>
	<p>【性别】 ' .$_POST['sex']. '</p>
	<p>【注册原因】 ' .$_POST['reason']. '</p>
	<p> </p>
	<p>【一键转正】 <a href="http://aimozhen.com/admin/ajax/guest.php?email='.$_POST['email'].'&uid='.$_POST['uid'].'" target="_blank">同意点这里</a></p>
	<p><span style="color: #F00">【一键认证】</span> <a href="http://aimozhen.com/admin/ajax/verify.php?email='.$_POST['email'].'&uid='.$_POST['uid'].'" target="_blank">同意点这里</a></p>
	<p>艾墨镇 分享视频 创造梦想 <a href="http://aimozhen.com/" target="_blank">http://aimozhen.com/</a></p>
	'; //邮件内容
	$mail->AltBody = "艾墨镇，分享视频，创造梦想 http://aimozhen.com/"; //附加信息，可以省略
	
	if(!$mail->Send()) { header('LOCATION:../?mailerr'); }
	
	header('LOCATION:../?mailok');