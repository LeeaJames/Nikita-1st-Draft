<?php 
class Hash {
	//make a hash
	public static function make($string, $salt = '') {
		return hash('sha256', $string . $salt);
	}

	// Create a salt
	public static function salt($length) {
		return mcrypt_create_iv($length);
	}

	// Make it unique
	public static function unique() {
		return self::make(uniqid());
	}
}