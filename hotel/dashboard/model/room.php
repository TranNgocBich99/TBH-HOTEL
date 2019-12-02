<?php
class Room_Model extends Base_Model{
	public function __construct(){
		parent:: __construct();
	}
	public function getRoom(){
		$sql = 'SELECT * FROM room';
		$query = mysqli_query($this->conn, $sql);
		$result = array();
		if($query->num_rows > 0){
			while ($row = mysqli_fetch_assoc($query)) {
				# code...
				$result[] = $row;
			}
		}

		return $result;
		
	}
	public function delete($room_id){
		$sql = "DELETE FROM room WHERE room_id = $room_id";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}
	public function add($data){
		$sql = "INSERT INTO room(room_name, price, adults, children, category_id, confirmation, thumb) VALUES('{$data['room_name']}', '{$data['price']}', '{$data['adults']}', '{$data['children']}', '{$data['category_id']}', '{$data['confirmation']}', '{$data['thumb']}')";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}
	public function update($room_id, $data){
		$sql = "UPDATE room SET thumb = '{$data['thumb']}', room_name = '{$data['room_name']}', price='{$data['price']}', adults = {$data['adults']}, children={$data['children']}, category_id={$data['category_id']}, confirmation='{$data['confirmation']}' WHERE room_id = $room_id";
		/*dd($sql);die;*/
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}public function getRoomByID($room_id){
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
?>