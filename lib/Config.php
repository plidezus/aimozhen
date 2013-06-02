<?php
//fcrosfly@gmail.com
class Config {
	private static $configs = array();
	private static $cache = array();

	public static function get($path) {
		return self::match($path);
	}

	protected static function match($path) {
		if (!isset(self::$cache[$path])) {
			$nodes = explode('.', $path);
			$root = array_shift($nodes);
			self::$cache[$path] = self::find($nodes, self::load($root));
		}
		return self::$cache[$path];
	}

	private static function find($nodes, $config) {
		while ($nodes) {
			$node = array_shift($nodes);
			if (!isset($config[$node])) {
				$config = null;
				break;
			}
			$config = $config[$node];
		}
		return $config;
	}

	private static function load($root) {
		if (!isset(self::$configs[$root])) {
			$config = include(HTDOCS_DIR . "/config/{$root}.php");
			self::$configs[$root] = $config;
		}
		return self::$configs[$root];
	}

	public static function search($path) {
		return self::match($path);
	}
}