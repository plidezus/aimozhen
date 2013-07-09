<?
include "include/init.php";
ob_start();
$email = $_POST['email'];
$password = $_POST['password'];
if (Visitor::login($email, $password)) {
	echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "?welcome'</script>";
} else {
	echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "?err'</script>";
}