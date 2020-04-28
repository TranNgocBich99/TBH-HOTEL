
<?php
class Book_Model extends Base_Model{
	public function __construct(){
		parent:: __construct();
	}


	public function getRoom(){
		$sql = 'SELECT * FROM room';

		$check_in_out = UE_Input::get('daterange');
		if(!empty($check_in_out)){
			$check_in_out = explode(' - ', $check_in_out);
			if(count($check_in_out) == 2){
				$check_out = strtotime($check_in_out[1]) + 3600;
				$sql = "SELECT * FROM room WHERE room_id NOT IN (SELECT post_id FROM room_availability WHERE ((check_in BETWEEN {$check_in} AND {$check_out}) OR (check_out BETWEEN {$check_in} AND {$check_out})) AND status = 'unavailable')";
			}
		}

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
}