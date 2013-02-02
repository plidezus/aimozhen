<?php
include '../include/init.php';
if ($_POST['s'] != md5($_POST['email'] . 'check')) header('LOCATION:../?reg');
$user = new User();
$user->username = $_POST['name'];
$user->email = $_POST['email'];
$user->password = md5($_POST['pass1']);
$user->save();