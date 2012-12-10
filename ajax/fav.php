<?php
include "../include/init.php";
$visitor = Visitor::user();
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
?>
