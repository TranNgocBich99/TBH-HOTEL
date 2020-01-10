<?php

class User_Model extends Base_Model {
	public function __construct() {
		parent::__construct();
	}
	public function getUserAdmin(){
		$sql = "SELECT * FROM guest";
		$query = mysqli_query($this->conn, $sql);
		$result = array();
		if(!empty($query) && $query->num_rows > 0){
			while ($row = mysqli_fetch_assoc($query)) {
				$result[] = $row;
			}
		}
		return $result;
	}
	public function add($data){
		$password = md5($data['password']);
		$sql = "INSERT INTO guest (username, password, email, role) VALUES('{$data['username']}', '{$password}', '{$data['email']}', '{$data['role']}')";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}
	public function update($user_id, $data){
		$password = md5($data['password']);
		$sql = "UPDATE guest SET username = '{$data['username']}', password = '{$password}' WHERE id = $user_id";

		$query = mysqli_query($this->conn, $sql);
		return $query;
	}
	public function getUserById($user_id){
		$sql = "SELECT * FROM guest WHERE id = {$user_id}";
		$query = mysqli_query($this->conn, $sql);
		$result = array();
		if(!empty($query) && $query->num_rows > 0){
			while ($row = mysqli_fetch_assoc($query)) {
				$result = $row;
			}
		}
		return $result;
	}
}