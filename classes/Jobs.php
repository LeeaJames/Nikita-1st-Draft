<?php 
class Jobs {
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName;

	public function __construct($Jobs = null) {
		$this->_db = DB::getInstance();
	}


	public function create($fields = array()) {
		if (!$this->_db->insert('jobs', $fields)) {
			throw new Exception('There was a problem adding your Jobs');
		}
	}

	public function find($Jobs = null) {
		if($Jobs) {
			$field = (is_numeric($Jobs)) ? 'id' : 'username';
			$data = $this->_db->get('quotes', array($field, '=', $Jobs));

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