<?php
include '../../include/init.php';

$user = new User($_POST['id']);
$user->exteremail = $_POST['exteremail'];
$user->exterweibo = $_POST['exterweibo'];
$user->exterblog = $_POST['exterblog'];
$user->save();

echo "<script>window.location = '/home/settings/?rereg'</script>";