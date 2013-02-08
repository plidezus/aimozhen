<?php
include '../include/init.php';
if (!$visitor->id) header("LOCATION:/?login");
$exists_video = new Video();
$exists_video->url = $_POST['url'];
if ($exists_video->count()){
	$e_video = current($exists_video->find());
	header('LOCATION:/detail.php?id=' . $e_video->id);
} else {
	$video = new Video();
	$video->url = $_POST['url'];
	$video->userid = Visitor::user()->id;
	$video->save();
	header('LOCATION:../edit.php?id=' . $video->id);
}
