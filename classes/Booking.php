<?php 
class Booking {
		private $_db,
			$_data,
			$_sessionName,
			$_cookieName;

	public function __construct($book = null) {
		$this->_db = DB::getInstance();
	}


	public function create($fields = array()) {
		if (!$this->_db->insert('booking', $fields)) {
			throw new Exception('There was a problem adding your booking');
		}
	}

	public function find($book = null) {
		if($book) {
			$field = 'booked';
			$data = $this->_db->get('booking', array($field, '=', $book));

			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}

	public function data() {
		return $this->_data;
	}
}