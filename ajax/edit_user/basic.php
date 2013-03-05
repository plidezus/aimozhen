<?php
include '../../include/init.php';

$user = new User($_POST['id']);
$user->username = $_POST['name'];
$user->email = $_POST['email'];
$user->save();

echo "<script>window.location = '/home/settings/?rereg'</script>";