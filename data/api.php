<?php
header('Content-type:application/json;charset=UTF-8');
include "../include/init.php";
 
function DeleteHtml($str) 
{ 
$str = trim($str); 
$str = strip_tags($str,""); 
$str = ereg_replace("\t","",$str); 
$str = ereg_replace("\r\n","",$str); 
$str = ereg_replace("\r","",$str); 
$str = ereg_replace("\n","",$str); 
$str = ereg_replace(" "," ",$str); 
return trim($str); 
}


//获取参数
$value = $_GET['value']; 
if ( isset($_GET['limit'])) {
	$limit = $_GET['limit']; } else { $limit = 10; }
// 视频获取
if ($_GET['type']=="video")  {
	$video = new Video();
	if ($value=="new") { 
		$videos = $video->find(array('order' => 'id desc', 'limit' => $limit));
	} elseif ($value=="hot") {
		$videos = $video->find(array('order' => '`viewed` desc, id desc', 'limit' => $limit));
	} elseif ($value=="random") {
		$videos = $video->find(array('order' => 'RAND( )', 'limit' => $limit));
	} else {
		$video->id = $value;
		$videos = $video->find();
	}   
	foreach($videos as $video) {
		$output->data[] = $video;
	}
	

// 用户获取
}   elseif ($_GET['type']=="user") {
	$user = new User();
	if ($value=="new") { 
		$users = $user->find(array('order' => 'id desc', 'limit' => $limit));
	} elseif ($value=="hot") {
		$users = $user->find(array('order' => '`post` desc, id desc', 'limit' => $limit));
	} elseif ($value=="random") {
		$users = $user->find(array('order' => 'RAND( )', 'limit' => $limit));
	} else {
		$user->id = $value;
		$users = $user->find();
	}   
	foreach($users as $user) {
		$newuser[$user->id]->username = $user->username ;
		$newuser[$user->id]->post = $user->post ;
		$newuser[$user->id]->like = $user->like ;
		$newuser[$user->id]->fav = $user->fav ;
		$output->data[] = $newuser[$user->id];
	}

// 其他情况
} else {echo"未定义null";};


echo json_encode($output);


?>