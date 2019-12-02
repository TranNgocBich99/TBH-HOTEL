<?php
class Category_Model extends Base_Model{
	public function __construct(){
		parent:: __construct();
	}
	public function getCategory(){
		$sql = 'SELECT * FROM room_category';
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

?>