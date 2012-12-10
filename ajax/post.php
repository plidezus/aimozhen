<?php
include '../include/init.php';
$video = new Video();
$video->url = $_POST['url'];
$video->userid = Visitor::user()->id;
$video->save();
header('LOCATION:../edit.php?id=' . $video->id);
