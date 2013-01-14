<?
include "include/init.php";
ob_start();
$username = $_POST['username'];
$password = $_POST['password'];
if (Visitor::login($username, $password)) {
	echo "<script>alert('µÇÂ¼³É¹¦')</script>";
} else {
	echo "<script>alert('µÇÂ¼Ê§°Ü')</script>";
}
echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "'</script>";
