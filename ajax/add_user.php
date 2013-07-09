<?php
include '../include/init.php';
if ($_POST['s'] != md5($_POST['email'] . 'check')) header('LOCATION:/home/settings/');

$exists_user = new User();
$exists_user->email = $_POST['email'];
if ($exists_user->count()){
	header('LOCATION:/?re');
} else {
$user = new User();
$user->username = $_POST['name'];
$user->email = $_POST['email'];
$user->password = md5($_POST['pass1']);
$user->group = 99;
$user->createdTime = time();
//$user->exteremail = $_POST['exteremail'];
//$user->exterweibo = $_POST['exterweibo'];
//$user->exterblog = $_POST['exterblog'];

if ($_POST['invitecode'] == 'animator') {
	$user->verify = 1;
	$user->guest = 0;
} elseif ($_POST['invitecode'] == 'animetaste') {
	$user->verify = 0;
	$user->guest = 0;
} else {
	$user->verify = 0;
	$user->guest = 1;
}
$user->save();


$siteoption = new Siteoption(11);
$siteoption->value = $user->id ;
$siteoption->save();

Visitor::login($_POST['email'], $_POST['pass1']);

}