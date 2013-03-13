<?php
include '../../include/init.php';

$user = new User($_POST['id']);
$user->password = md5($_POST['pass1']);
$user->validate = "";
$user->save();

echo "<script>window.location = '/?rereg'</script>";