<?php

class User_Model extends Base_Model {
	public function __construct() {
		parent::__construct();
	}
	public function add_user($data){
		$password = md5($data['password']);
		
		$sql = "INSERT INTO guest (username, email, password,  role) VALUES ('{$data['username']}','{$data['email']}', '{$password}', '2')";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}
	public function getUserData($username, $password){
		$password = md5($password);
		$sql = "SELECT * FROM guest WHERE username='$username' AND password='$password' LIMIT 1";
		$query = mysqli_query($this->conn, $sql);
		$result = array();
		if(!empty($query) && $query->num_rows > 0){
			while ($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	public function email_exists($email){
		$sql = "SELECT * FROM guest WHERE email = '$email' LIMIT 1";

		$query = mysqli_query($this->conn, $sql);
		if(empty($query)){
			return false;
		}else{
			if($query->num_rows > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	public function username_exists($username){
		$sql = "SELECT * FROM guest WHERE username = '$username' LIMIT 1";
		$query = mysqli_query($this->conn, $sql);
		if(empty($query)){
			return false;
		}else{
			if($query->num_rows > 0){
				return true;
			}else{
				return false;
			}
		}
	}

}