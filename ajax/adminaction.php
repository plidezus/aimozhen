<?php
include "../include/init.php";
if (($_GET['type']) == 1) {
	$user = new User($_GET['id']);
	$user->group = 1 ;
	$user->save();
	
} elseif (($_GET['type']) == 2) {
	$user = new User($_GET['id']);
	$user->group = 99 ;
	$user->save();
	
} elseif (($_GET['type']) == 3) {
	$user = new User($_GET['id']);
	$user->verify = 1 ;
	$user->save();
	
} elseif (($_GET['type']) == 4) {
	$user = new User($_GET['id']);
	$user->verify = 0 ;
	$user->save();
	
}
header('LOCATION:/user.php?id=' . $_GET['id']);