<?php
//fcrosfly@gmail.com
class Cookie {
	public static function set($name, $value, $ttl = 0, $http_only = false) {
		$expire = $ttl ? $ttl + time() : 0;
		$_COOKIE[$name] = $value;
		return setcookie($name, $value, $expire, '/', 'aimozhen.com', false, $http_only);
	}

	public static function get($name) {
		return isset($_COOKIE[$name]) ? trim($_COOKIE[$name]) : null;
	}

	public static function delete($name) {
		return self::set($name, null, -8640000);
	}
}