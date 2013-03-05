<?php
include '../include/init.php';
if ($_POST['s'] != md5($_POST['email'] . 'check')) header('LOCATION:../?reg2');

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
$user->verify = 0;
$user->verifyinfo = '';
$user->exteremail = $_POST['exteremail'];
$user->exterweibo = $_POST['exterweibo'];
$user->exterblog = $_POST['exterblog'];
$user->save();
}