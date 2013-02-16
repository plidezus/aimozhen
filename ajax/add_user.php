<?php
include '../include/init.php';
if ($_POST['s'] != md5($_POST['email'] . 'check')) header('LOCATION:../?reg');

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
$user->first = 1;
$user->save();
}