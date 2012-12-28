<?php

/*
	This class creates a tiny abstraction on top of PDO to handle initial connection and setup
*/

class DB {
	private $db;

	//class constructor with basic setup
	public function __construct($file) {
		$this->db = new PDO('sqlite:'.$file);
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	//straight call of PDO's functions
	public function __call($fn, $args) {
		return call_user_func_array(array($this->db, $fn), $args);
	}
}
