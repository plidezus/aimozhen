<?php
/**
 * 同步多说
 */
include '../../include/init.php';
$user_id = $_GET['id'];
$user = new User($user_id);
$url = 'http://api.duoshuo.com/users/import.json';
$config = Config::get('env.duoshuo');

$data = array(
    'short_name' => $config['short_name'],
    'secret' => $config['secret'],
    'users' => array(
     )
);
$data['users'][]=  array(
	'user_key' => $user->id,
	'name' => $user->username,
	'avatar_url' => $user->avatar()->link(50),
	'email' => $user->email,
	'url' => 'http://aimozhen.com/user/id'.$user->id.'-1/',
	'created_at' => date('Y-m-d H:i:s', $user->createdTime)
	);
$result = request_by_curl($url,http_build_query($data));
print_r ($result) ;
 
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