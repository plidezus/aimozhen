<?php
include "../include/init.php";
$action = new Action();
$action->userid = $visitor->id;
$action->type = 2;
$action->target = $_GET['id'];
$action->createdTime = time();
$action->save();
echo '喜欢一个人不难，不是么？';
?>
