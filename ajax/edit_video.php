<?php
include '../include/init.php';
$video = new Video($_POST['id']);

if ($video->pre_tag) {
	$old_tag = new Tag($video->pre_tag);
	if ($old_tag->count > 0)  $old_tag->count --;
	$old_tag->save();
}

$new_tag = new Tag($_POST['pre_tag']);
$new_tag->count ++;
$new_tag->save();

$video->title = $_POST['title'];
$video->pre_tag = $_POST['pre_tag'];
$video->tags = $_POST['tags'];
$video->description = $_POST['description'];

//选辑权限
if($_POST['collection']) { 
	if ($video->collection) {
		$old_collection = new Collection($video->collection);
		if ($old_collection->count > 0)  $old_collection->count --;
		$old_collection->save();
	}
	if ($_POST['collection'] == 1) {
		$video->collection = 1;
	} else {
		$new_collection = new Collection($_POST['collection']);
		$new_collection->count ++;
		$new_collection->UpdateTime = time();
		$new_collection->save();
		$video->collection = $_POST['collection'];
	}
 }
if($_POST['userid']) { 
	if ($_POST['userid'] != $video->userid) {
		
		$user = new User($video->userid);
		$user->post --;
		$user->save();
		$user = new User($_POST['userid']);
		$user->post ++;
		$user->save();
		
		$video->userid = $_POST['userid'] ; 
	}
}

//管理员权限
if($_POST['viewed']) { $video->viewed = $_POST['viewed'] ; }
if($_POST['url']) { 
	$video->url = $_POST['url'] ; 
	$info = VideoUrlParser::parse($_POST['url']);
	$video->imageUrl = $info['img'];
	}
	
//认证作者权限
if($_POST['verify'] == 1){ $video->verify = 1; } else { $video->verify = 0; }
if(($_POST['card'] == 1)&&($_POST['verify'] == 1)){ $video->card = 1; } else { $video->card = 0; }
	
$video->save();
header('LOCATION:/video/' . $video->id. '/');
?>
