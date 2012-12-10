<?php
include '../include/init.php';
if ($_POST['s'] != md5($_POST['email'] . 'check')) header('LOCATION:../index.php');
$user = new User();
$user->username = $_POST['name'];
$user->email = $_POST['email'];
$user->password = md5($_POST['password']);
$user->save();