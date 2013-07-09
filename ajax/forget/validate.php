<?php
include '../../include/init.php';

$exists_user = new User();
$address = $_POST['email'];
$exists_user->email = $address;


if ($exists_user->count()){
	
		$user = $exists_user;	
		$uid = $user->id ;
		$user = new User($user->id);
		$validate = md5(rand(10,100));
		$user->validate = $validate;
		$user->save();
		
		
	require("../../include/mail/class.phpmailer.php");
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
	$mail->AddAddress($address, "");
	$mail->IsHTML(true); 
	$mail->Subject = "艾墨镇 找回密码"; 
	$mail->Body = '
	<p>亲爱的镇民 :</p>
	<p>您的密码重设要求已经得到验证。请点击以下链接输入您新的密码：</p>
	<p><a href="http://aimozhen.com/reg.php?id=' .$uid. '&v=' .$validate. '" target="_blank">http://aimozhen.com/reg.php?id=' .$uid. '&v=' .$validate. '</a><a href="http://aimozhen.com/" target="_blank"></a></p>
	<p>艾墨镇 分享视频 创造梦想 <a href="http://aimozhen.com/" target="_blank">http://aimozhen.com/</a></p>
	'; 
	$mail->AltBody = "艾墨镇，分享视频，创造梦想 http://aimozhen.com/"; 
	if(!$mail->Send())
		{ header('LOCATION:/?mailerr');}
	header('LOCATION:/?mailok');
		

	} else {
		header('LOCATION:/');
		}