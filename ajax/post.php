<?php
include '../include/init.php';
if (!$visitor->id) header("LOCATION:/?login");
$exists_video = new Video();
$exists_video->url = $_POST['url'];
if ($exists_video->count()){
	$e_video = current($exists_video->find());
	header('LOCATION:/video/' . $e_video->id . "/?repost");
} else {
	$video = new Video();
	$video->url = $_POST['url'];
	$video->createdTime = time();
	$video->userid = Visitor::user()->id;
	$video->pre_tag = 1;
	$video->collection = 1;
	$video->save();
		
	$new_tag = new Tag(1);
	$new_tag->count ++;
	$new_tag->save();
	
	$user = new User($visitor->id);
	$user->post ++;
	$user->save();
	
	header('LOCATION:/edit/' . $video->id . '/');
}
