<?php
include '../../include/init.php';

$user = new User($_POST['id']);
$user->password = md5($_POST['pass1']);
$user->save();

echo "<script>window.location = '/home/settings/?rereg'</script>";