<?php
include '../include/init.php';

	$action = new Action();
	$action->userid = Visitor::user()->id;
	$action->videoid =  $_POST['colletionid'];
	$action->type = 3;
	$action->target = $_POST['videoid'];
	$action->createdTime = time();
	$action->save();
	
	$newcollection = new Collection($_POST['colletionid']);
	$newcollection->count ++;
	$newcollection->save();
		
		//ListCollections($_POST['videoid']);

	echo $newcollection->name ;


function ListCollections($vid) {
	$newaction = new Action();
	$newaction->type = 3;
	$newaction->videoid = $vid;
	$collection_ids = array_map(function($action){return $newaction->target;}, $newaction->find());
	$cids = join(',', $collection_ids);
	
	$newvideo = new Video($vid);
	$newvideo->collection = $cids;
	$newvideo->save();
}