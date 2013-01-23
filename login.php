<?
include "include/init.php";
ob_start();
$username = $_POST['username'];
$password = $_POST['password'];
if (Visitor::login($username, $password)) {
	echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "&welcome'</script>";
} else {
	echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "&err'</script>";
}