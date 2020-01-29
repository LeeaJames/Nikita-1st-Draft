<?php 
class Quote extends User {
	private $_db,
			$_data;

	public function __construct($quote = null) {
		$this->_db = DB::getInstance();
	}


	public function create($fields = array()) {
		if (!$this->_db->insert('quotes', $fields)) {
			throw new Exception('There was a problem adding your quote');
		}
	}

	public function find($quote = null) {
		if($quote) {
			$field = (is_numeric($quote)) ? 'id' : 'client_name';
			$data = $this->_db->get('quotes', array($field, '=', $quote));

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