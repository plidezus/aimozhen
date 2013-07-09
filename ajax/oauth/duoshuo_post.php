<?php
/**
 * 同步多说
 */
include '../../include/init.php';
$video_id = $_GET['id'];
$video = new Video($video_id);
$url = 'http://api.duoshuo.com/threads/import.json';
$config = Config::get('env.duoshuo');

$data = array(
    'short_name' => $config['short_name'],
    'secret' => $config['secret'],
    'threads' => array(
     )
);
$data['threads'][]=  array(
	'thread_key' => $video->id,
	'title' => $video->title,
	'url' => 'http://aimozhen.com/video/'.$video->id.'/',
	'author_key' => $video->userid
	);
$result = request_by_curl($url,http_build_query($data));
//print_r ($result) ;

 
function request_by_curl($remote_server, $post_string)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $remote_server);
	curl_setopt( $handle, CURLOPT_POST, true );
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch, CURLOPT_USERAGENT, "aimozhen");
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
} 



?>