<?php
class Base_Model{
	protected $conn;
	public function __construct(){
		$this->conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
		if (!$this->conn) {
			die('Connect Error: ' . mysqli_connect_error());
		}
		mysqli_set_charset($this->conn, 'UTF8');
	}
}