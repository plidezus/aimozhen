<?php
include '../include/init.php';
$comment = new Comment();
$comment->comment = htmlentities($_POST['comment'], 0, 'UTF-8');
$comment->userid = $visitor->id;
$comment->createdTime = time();
$comment->videoid = $_POST['id'];
$comment->save();
header("LOCATION:../detail.php?id={$comment->videoid}");
