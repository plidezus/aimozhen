<?php
include "../include/init.php";
if (($_GET['type']) == 1) {
	$user = new User($_GET['id']);
	$user->group = 1 ;
	$user->save();
	
} elseif (($_GET['type']) == 2) {
	$user = new User($_GET['id']);
	$user->group = 9 ;
	$user->save();
	
} elseif (($_GET['type']) == 9) {
	$user = new User($_GET['id']);
	$user->group = 99 ;
	$user->save();
	
} elseif (($_GET['type']) == 11) {
	$user = new User($_GET['id']);
	$user->verify = 1 ;
	$user->save();
	
} elseif (($_GET['type']) == 12) {
	$user = new User($_GET['id']);
	$user->verify = 2 ;
	$user->save();
	
} elseif (($_GET['type']) == 19) {
	$user = new User($_GET['id']);
	$user->verify = 0 ;
	$user->save();
	
} elseif (($_GET['type']) == 91) {
	$user = new User($_GET['id']);
	$user->guest = 0 ;
	$user->save();
	
} elseif (($_GET['type']) == 99) {
	$user = new User($_GET['id']);
	$user->guest = 1 ;
	$user->save();
	
}
header('LOCATION:/user/'.$_GET['id'].'/');