<?php
header('Content-type:application/json;charset=UTF-8');
include "../include/init.php";

function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
    static $recursive_counter = 0;
    if (++$recursive_counter > 1000) {
        die('possible deep recursion attack');
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayRecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }
 
        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
    $recursive_counter--;
}
 
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

//JSON 压缩转码
function JSON($array) {
	arrayRecursive($array, 'urlencode', true);
	$json = json_encode($array);
	return urldecode($json);
}

//视频信息
function GetVideo($vid) {
		$video = new Video($vid);
		$vinfo = array
       (
          'id'=> $video->id,
		  'title'=> $video->title,
		  'description'=> DeleteHtml($video->description),
		  'url'=> $video->url,
		  'userid'=> $video->userid,
		  'imageUrl'=> $video->imageUrl,
		  'like'=> $video->like,
		  'viewed'=> $video->viewed,
		  'pre_tag'=> $video->pre_tag,
		  'tags'=> $video->tags,
		  'createdTime'=> $video->createdTime,
		  'verify'=> $video->verify
       );
	return $vinfo;
}

//列出视频
function ListVideo($videos) {
		$num = 1;
		foreach ($videos as $video) {
			if ($num == 1) $v1 = $video->id;
			if ($num == 2) $v2 = $video->id;
			if ($num == 3) $v3 = $video->id;
			if ($num == 4) $v4 = $video->id;
			$num = $num + 1;
		};
	    $array =  array
    		("data" => array
				(
				GetVideo($v1),
				GetVideo($v2),
				GetVideo($v3),
				GetVideo($v4)
				)
     		);
	return $array;
}

//用户信息
function GetUser($uid) {
		$user = new User($uid);
		$uinfo = array
       (
          'id'=> $user->id,
		  'username'=> DeleteHtml($user->username),
		  'email'=> $user->email,
		  'group'=> $user->group,
		  'createdTime'=> $user->createdTime,
		  'verify'=> $user->verify,
		  'verifyinfo'=> $user->verifyinfo,
		  'exteremail'=> $user->exteremail,
		  'exterweibo'=> $user->exterweibo,
		  'exterblog'=> $user->exterblog,
		  'weiboId'=> $user->weiboId,
		  'guest'=> $user->guest
       );
	return $uinfo;
}

//获取参数
$value = $_GET['value']; 
	
// 视频获取
if ($_GET['type']=="video")  {	
	if ($value=="new") { 
		$video = new Video();
		$videos = $video->find(array('order' => 'id desc', 'limit' => 4));
		$array = ListVideo($videos);
	
	} elseif ($value=="hot") {
		$video = new Video();
		$videos = $video->find(array('order' => '`viewed` desc, id desc', 'limit' => 4));
		$array = ListVideo($videos);
		
	} elseif ($value=="random") {
		$video = new Video();
		$videos = $video->find(array('order' => 'RAND( )', 'limit' => 4));
		$array = ListVideo($videos);
		
	} else {
		$array = GetVideo($value);
	}   
	
	

// 用户获取
}   elseif ($_GET['type']=="user") {
	$array = GetUser($uid);
}

// 其他情况
else {echo"未定义null";};

echo JSON($array);



?>