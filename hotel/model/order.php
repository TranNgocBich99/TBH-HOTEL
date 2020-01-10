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
}
?>