<?php



class Visitor {



	public static $user;



	public static function user() {

		if (!self::$user || self::$user->id != $_SESSION['user_id']) {

			self::$user = new User();

			if (isset($_SESSION['user_id'])) {

				self::$user->load($_SESSION['user_id']);

			} elseif (Cookie::get('__u')) {

				$temp_user = new User(intval(Cookie::get('__u')));

				if (sha1($temp_user->id . '3xtc' . $temp_user->password) ==

					Cookie::get('__c')) {

					self::$user = $temp_user;

				}

			}

		}



		return self::$user;

	}

	

	public static function login($email, $password) {

		$user = new User();

		$user->email = $email;

		$find = reset($user->find(array('limit' => 1)));

		if ($find && $find->password == md5($password)) {
			
			
			$token = array(
			"short_name"=>"aimozhen",
			"user_key"=> $find->id,
			"name"=> $find->username,
			);
			$duoshuoToken = JWT::encode($token, '040aa340e7a913c92890acf30fa1c9f9');

			Cookie::set('duoshuo_token', $duoshuoToken,  30 * 86400);
			
			Cookie::set('__u', $find->id,  30 * 86400);

			Cookie::set('__c', sha1($find->id . '3xtc' . md5($password)), 30 * 86400, true);

			$_SESSION['user_id'] = $find->id;

			return true;

		} else {

			return false;

		}

	}



}