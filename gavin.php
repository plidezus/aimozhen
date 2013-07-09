<?php
include "include/init.php"; 



$action = new Action();
$action->type = Action::TYPE_LIKE_USER;
$action->userid = $visitor->id;
$user_ids = array_map(function($action){return $action->target;}, $action->find());
$users = join(',', $user_ids)





?>