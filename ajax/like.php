<?php

include "../include/init.php";



if (!empty($_GET['cancel'])) {

	$action = new Action();

	$action->userid = $visitor->id;

	$action->type = 2;

	$action->target = $_GET['id'];

	if ($action->count()) {

		$the_action = current($action->find());

		if ($the_action) {

			$the_action->delete();
			
			$user = new User($visitor->id);
			$user->like --;
			$user->save();

		}

		header('LOCATION:/user/'.$_GET['id'].'/');

	}

} else {

	$action = new Action();

	$action->userid = $visitor->id;

	$action->type = 2;

	$action->target = $_GET['id'];

	$action->createdTime = time();

	if ($action->save()) {
			$user = new User($visitor->id);
			$user->like ++;
			$user->save();
	}

	header('LOCATION:/user/'.$_GET['id'].'/');

}