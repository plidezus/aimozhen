<?
include "include/init.php";
ob_start();
$username = $_POST['username'];
$password = $_POST['password'];
if (Visitor::login($username, $password)) {
	echo "<script>alert('��¼�ɹ�')</script>";
} else {
	echo "<script>alert('��¼ʧ��')</script>";
}
echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "'</script>";
