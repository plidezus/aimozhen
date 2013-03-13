<?php
include '../../include/init.php';

$exists_user = new User();
$address = $_POST['email'];
$exists_user->email = $address;


if ($exists_user->count()){
	
	$user = new User();
	$users = $user->find(array('email' => $address));
	foreach ($users as $user) {
	//进入循环	
		$uid = $user->id ;
		$user = new User($user->id);
		$validate = md5(rand(10,100));
		$user->validate = $validate;
		$user->save();
		
		
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
	$mail->AddAddress($address, "");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
	//$mail->AddReplyTo("", "");
	//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
	$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
	$mail->Subject = "艾墨镇 找回密码"; //邮件标题
	$mail->Body = '
	<p>亲爱的镇民 :</p>
	<p>您的密码重设要求已经得到验证。请点击以下链接输入您新的密码：</p>
	<p><a href="http://aimozhen.com/reg.php?id=' .$uid. '&v=' .$validate. '" target="_blank">http://aimozhen.com/reg.php?id=' .$uid. '&v=' .$validate. '</a><a href="http://aimozhen.com/" target="_blank"></a></p>
	<p>艾墨镇 分享视频 创造梦想 <a href="http://aimozhen.com/" target="_blank">http://aimozhen.com/</a></p>
	'; //邮件内容
	$mail->AltBody = "艾墨镇，分享视频，创造梦想 http://aimozhen.com/"; //附加信息，可以省略
	if(!$mail->Send())
		{ header('LOCATION:/?mailerr');}
	header('LOCATION:/?mailok');
		
		}
	}