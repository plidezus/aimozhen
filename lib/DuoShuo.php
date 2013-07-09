<?php
//fuxiaopang@msn.com
/**
 * DuoShuo
 */
class DuoShuo {


	public function syncUser($user_id) {
		$config = Config::get('env.duoshuo');
		$user = new User($user_id);
		$url = 'http://api.duoshuo.com/users/import.json';
		
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
			'url' => 'http://aimozhen.com/user/'.$user->id.'/',
			'created_at' => date('Y-m-d H:i:s', $user->createdTime)
			);
		$result = self::request_by_curl($url,http_build_query($data));
		return  $result;
	}

	public function syncPost($video_id) {
		$config = Config::get('env.duoshuo');
		$video = new Video($video_id);
		$url = 'http://api.duoshuo.com/threads/import.json';
		
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
		$result = self::request_by_curl($url,http_build_query($data));
		return  $result;
	}


	private function request_by_curl($remote_server, $post_string)
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


}
