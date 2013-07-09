<?php

include '../../include/init.php';



if(isset($_GET['code'])) {
	$config = Config::get('env.weibo');

	$code = $_GET['code'];

	$ch = curl_init('https://api.weibo.com/oauth2/access_token');

	curl_setopt($ch, CURLOPT_POST, true);

	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(

		'client_id' => $config['client_id'],

		'client_secret' => $config['client_secret'],

		'grant_type' => 'authorization_code',

		'code' => $code,

		'redirect_uri' => 'http://aimozhen.com/ajax/oauth/weibo.php'



	)));

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$user = json_decode(curl_exec($ch));

	if ($user->uid) {

		$visitor->weiboId = $user->uid;
		$visitor->exterweibo = 'http://www.weibo.com/' . $user->uid;  ;

		$visitor->save();

	}

	header("LOCATION:/home/settings/");

}

