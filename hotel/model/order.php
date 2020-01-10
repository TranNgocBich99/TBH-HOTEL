<?php
class Order_Model extends Base_Model{
	public function __construct(){
		parent:: __construct();
	}
	
	public function createOrder($cart, $user_id, $user_fullname, $price){
		$sql = "INSERT INTO bills (room_data, guest_id, username, price, status) VALUES ('$cart', $user_id, '$user_fullname', '$price', 'complete')";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}

	public function updateAvailability($room_id, $check_in){
		$sql = "SELECT * FROM room_availability WHERE post_id = {$room_id} AND check_in = {$check_in}";
		$query = mysqli_query($this->conn, $sql);

		if($query->num_rows <= 0){

			$insert_sql = "INSERT INTO room_availability (post_id, check_in, check_out, price, status, parent_id, `number`, booking_period, adult_number, child_number) VALUES ({$room_id}, {$check_in}, {$check_in}, '100', 'unavailable', 0, 1, 1, 1, 1)";
			mysqli_query($this->conn, $insert_sql);
		}else{
			$update_sql = "UPDATE room_availability SET status = 'unavailable' WHERE post_id = {$room_id} AND check_in = {$check_in}";
			mysqli_query($this->conn, $update_sql);
		}
	}
}
?>