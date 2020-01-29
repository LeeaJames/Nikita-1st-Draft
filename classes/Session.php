<?php 
class Session {

	//Session exists
	public static function exists($name) {
		return (isset($_SESSION[$name])) ? true : false;
	}

	// Create a Session
	public static function put($name, $value) {
		return $_SESSION[$name] = $value;
	}

	//Get a Session
	public static function get($name) {
		return $_SESSION[$name];
	}

	//Delete a Session
	public static function delete($name) {
		if(self::exists($name)) {
			unset($_SESSION[$name]);
		}
	}

	//Flash a message
	public static function flash($name, $string = ''){
		if(self::exists($name)) {
			$session = self::get($name);
			self::delete($name);
			return $session;
		} else {
			self::put($name, $string);
		}
	}

}