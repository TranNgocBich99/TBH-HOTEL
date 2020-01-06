<?php
class Room_Model extends Base_Model{
	public function __construct(){
		parent:: __construct();
	}
	public function getRoom($search_text){
		$sql = "SELECT * FROM room WHERE room_name LIKE '%{$search_text}%' OR confirmation LIKE '%{$search_text}%'";
		$query = mysqli_query($this->conn, $sql);
		$result = array();
		if(!empty($query) && $query->num_rows > 0){
			while ($row = mysqli_fetch_assoc($query)) {
				# code...
				$result[] = $row;
			}
		}
		return $result;
	}
	public function getRoomByID($room_id){
		$sql = "SELECT * FROM room WHERE room_id = {$room_id}";
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
