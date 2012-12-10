<?
include "include/init.php";
ob_start();
$username = $_POST['username'];
$password = $_POST['password'];
if (Visitor::login($username, $password)) {
	echo "<script>alert('登录成功')</script>";
} else {
	echo "<script>alert('登录失败')</script>";
}
echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/index.php') . "'</script>";
