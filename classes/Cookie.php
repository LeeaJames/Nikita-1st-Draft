<?php 
class Cookie {
	// Does a cookie exists
	public static function exists($name) {
		return (isset($_COOKIE[$name])) ? true : false;
	}

	// Get a cookie
	public static function get($name) {
		return $_COOKIE[$name];
	}

	// Create a cookie
	public static function put($name, $value, $expiry) {
		if(setcookie($name, $value, time() + $expiry, '/')) {
			return true;
		}
		return false;
	}

	// Delete a cookie
	public static function delete($name) {
		self::put($name, '', time() - 1);
	}
}