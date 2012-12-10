<?php
include 'include/init.php';
$video = new Video();
$video->url = $_GET['url'];
$video->save();
header("LOCATION:index.php");
?>