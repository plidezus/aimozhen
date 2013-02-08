<?php
include "../include/init.php";
if (!empty($_GET['cancel'])) {
	$action = new Action();
	$action->userid = $visitor->id;
	$action->type = 1;
	$action->target = $_GET['id'];
	if ($action->count()) {
		$the_action = current($action->find());
		if ($the_action) {
			$the_action->delete();
			$video = new Video($_GET['id']);
			$video->like --;
			$video->save();
		}
		echo '取消收藏成功';
	}
} else {
	$action = new Action();
	$action->userid = $visitor->id;
	$action->type = 1;
	$action->target = $_GET['id'];
	$action->createdTime = time();
	if ($action->save()) {
		$video = new Video($_GET['id']);
		$video->like ++;
		$video->save();
	}
	echo '收藏成功';
}
