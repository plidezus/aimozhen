<?php
include "../include/init.php";
$video = new Video($_GET['id']);


if(($visitor->id != $video->userid) && ($visitor->group != 1)) { header("LOCATION:/?wrong");}
else {
$video->delete(array('id' => $_GET['id']));

if ($video->pre_tag) {
	$old_tag = new Tag($video->pre_tag);
	if ($old_tag->count > 0)  $old_tag->count --;
	$old_tag->save();
}


header('LOCATION:../?delete'); }

?>
