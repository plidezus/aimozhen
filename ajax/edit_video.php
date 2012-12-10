<?php
include '../include/init.php';
$video = new Video($_POST['id']);
$video->title = $_POST['title'];
$video->tags = $_POST['tags'];
$video->description = $_POST['description'];
$video->save();
header('LOCATION:../detail.php?id=' . $video->id);
?>
