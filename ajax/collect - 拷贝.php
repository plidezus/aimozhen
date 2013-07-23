<?php
include "../include/init.php";
if ($_POST['cancel'] == 1) {
	$action = new Action();
	$action->userid = $visitor->id;
	$action->videoid = $_POST['videoid'];
	$action->type = 3;
	$action->target = $_POST['colletionid'];
	if ($action->count()) {
		$the_action = current($action->find());
		if ($the_action) {
			$the_action->delete();
			$collection = new Collection($_POST['colletionid']);
			$collection->count --;
			$collection->save();
			ListCollections($_POST['videoid']);
		}
	$collection = new Collection($_POST['colletionid']);
	echo $collection->name;
	}
} else {
	$action = new Action();
	$action->userid = $visitor->id;
	$action->videoid = $_POST['videoid'];
	$action->type = 3;
	$action->target = $_POST['colletionid'];
	$action->createdTime = time();
	$action->save();
	
		$collection = new Collection($_POST['colletionid']);
		$collection->count ++;
		$collection->save();
		
		ListCollections($_POST['videoid']);

	$collection = new Collection($_POST['colletionid']);
	echo $collection->name;
}

function ListCollections($vid) {
	$action = new Action();
	$action->type = 3;
	$action->videoid = $vid;
	$collection_ids = array_map(function($action){return $action->target;}, $action->find());
	$cids = join(',', $collection_ids);
	
	$video = new Video($vid);
	$video->collection = $cids;
	$video->save();
}