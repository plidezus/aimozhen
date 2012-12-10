<?php

class Visitor {

	public static $user;

	public static function user() {
		if (!self::$user || self::$user->id != $_SESSION['user_id']) {
			self::$user = new User();
			if (isset($_SESSION['user_id'])) {
				self::$user->load($_SESSION['user_id']);
			}
		}
		return self::$user;
	}
	
	public static function login($username, $password) {
		$user = new User();
		$user->username = $username;
		$find = reset($user->find(array('limit' => 1)));
		if ($find && $find->password == md5($password)) {
			$_SESSION['user_id'] = $find->id;
			return true;
		} else {
			return false;
		}
	}

}

?>
