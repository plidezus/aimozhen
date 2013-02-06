<?php
include '../include/init.php';

$user = new User($_POST['id']);
$user->username = $_POST['name'];
$user->email = $_POST['email'];
$user->password = md5($_POST['pass1']);
$user->save();

	unset($_SESSION['user_id']);
	echo "<script>window.location = '/?rereg'</script>";