<?
	include "include/init.php";
	unset($_SESSION['user_id']);
	header("LOCATION:" . $_SERVER['HTTP_REFERER'] ?: 'index.php');
?>
