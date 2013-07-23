<?php

include '../include/init.php';


if (($_GET['type']) == 'basic') {
	
	$user = new User($_POST['id']);
	$user->username = $_POST['name'];
	$user->email = $_POST['email'];
	$user->save();
	echo "<script>window.location = '/home/settings/?rereg'</script>";
	
} elseif (($_GET['type']) == 'password') {
	
	$user = new User($_POST['id']);
	$user->password = md5($_POST['pass1']);
	$user->save();
	echo "<script>window.location = '/home/settings/?rereg'</script>";

} elseif (($_GET['type']) == 'extra') {
	
	$user = new User($_POST['id']);
	$user->exteremail = $_POST['exteremail'];
	$user->exterweibo = $_POST['exterweibo'];
	$user->exterblog = $_POST['exterblog'];
	$user->save();
	echo "<script>window.location = '/home/settings/?rereg'</script>";

} elseif (!$_GET['type']) {
	
	$user = new User($_POST['pk']);
	if ($_POST['name']) { 
		$nametitle = $_POST['name'];
		$user->$nametitle = $_POST['value']; 
	}
	$user->save();

}