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
		if (!$user->duoshuoId ) {
			$user2 = new User($user_id);
			$content = json_decode ($result);
			$user2->duoshuoId = $content->response->$user_id;
			$user2->save();
			}
		
		
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


	public function syncCommentNum($post_id) {
		$config = Config::get('env.duoshuo');
		$handle = fopen("http://api.duoshuo.com/threads/counts.json?short_name=".$config['short_name']."&threads=".$post_id,"rb");
		$content = "";
		while (!feof($handle)) {
			$content .= fread($handle, 100000);
		}
		fclose($handle);
		$content = json_decode($content);
		//print_r ($content);
		
		foreach ($content->response as $key) { ;
										 
			$video = new Video($key->thread_key);
			$video->comment = $key->comments;
			$video->save();
	     } 
		 
		 return 'ALL DONE !';
	}
	
	public function syncComment($nums) {
			$config = Config::get('env.duoshuo');
		
			$handle = fopen("http://api.duoshuo.com/log/list.json?short_name=".$config['short_name']."&secret=".$config['secret']."&limit=".$nums."&order=desc","rb");
			$content = "";
			$allid = '';
			while (!feof($handle)) {
				$content .= fread($handle, 10000);
			}
			fclose($handle);
			$content = json_decode($content);
			
			foreach ($content->response as $key) { ;				
				$allid .=  $key->meta->thread_key.",";
		 }
		 
		 return $allid;
	}




	public function syncCommentContent($nums) {
			$config = Config::get('env.duoshuo');
		
			$handle = fopen("http://api.duoshuo.com/log/list.json?short_name=".$config['short_name']."&secret=".$config['secret']."&limit=".$nums."&order=desc","rb");
			$content = "";
			$allid = '';
			while (!feof($handle)) {
				$content .= fread($handle, 10000);
			}
			fclose($handle);
			$content = json_decode($content);
			
			foreach ($content->response as $key) { ;
				$user = new User();
				$user->duoshuoId = $key->user_id;
				$comment = new Comment();
				$comment->duoshuoId = $key->meta->post_id;
				if ($comment->count()) {} else {
					if ($user->count()) {
						$the_user = current($user->find());
							if ($the_user) {
								$comment = new Comment();
								$comment->comment = htmlentities($key->meta->message, 0, 'UTF-8');
								$comment->userid = $the_user->id;
								$comment->createdTime = strtotime($key->meta->created_at);
								$comment->videoid = $key->meta->thread_key;
								$comment->duoshuoId = $key->meta->post_id;
								$comment->save();
							}
					}
				}
				$allid .=  $key->meta->thread_key.",";
		 	}
		 return $allid;
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
