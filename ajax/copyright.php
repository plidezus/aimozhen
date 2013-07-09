<?php
include '../include/init.php';
$video = new Video($_POST['vid']);
$old_user = new User($video->userid);
$user = new User($_POST['uid']);

	
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
	$mail->Subject = "【作品认领】艾墨镇视频认领"; 
	$mail->Body = '
	<p>【作品认领】艾墨镇视频认领</p
	<p>【视频】 <a href="http://aimozhen.com/video/'.$video->id.'/" target="_blank">'.$video->id.'、'.$video->title. '</a> </p>
	<p>【原发布者】 ' .$old_user->id.'、'.$old_user->username.'  |  '.$old_user->email. '</p>
	<p>【新发布者】 ' .$user->id.'、'.$user->username.'  |  '.$user->email. '</p>
	<p>【申请说明】 ' .$_POST['reason']. '</p>
	<p> </p>
	<p>【一键同意（未开通）】 <a href="http://aimozhen.com/admin/ajax/copyright.php?vid='.$video->id.'&uid='.$user->id.'" target="_blank">同意点这里</a></p>
	<p>艾墨镇 分享视频 创造梦想 <a href="http://aimozhen.com/" target="_blank">http://aimozhen.com/</a></p>
	'; //邮件内容
	$mail->AltBody = "艾墨镇，分享视频，创造梦想 http://aimozhen.com/"; //附加信息，可以省略
	
	if(!$mail->Send()) { header('LOCATION:/video/'.$video->id.'/?mailerr'); }
	
	header('LOCATION:/video/'.$video->id.'/?mailok');