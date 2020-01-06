
<?php
class Category_Model extends Base_Model{
	public function __construct(){
		parent:: __construct();
	}

	public function getCategoryByID($cate_id){

		$sql = "SELECT room.*, room_category.category_id as cate_id, room_category.category_name as cate_name FROM room INNER JOIN room_category ON room.category_id = room_category.category_id WHERE room.is_deleted = 0 AND  room.category_id = {$cate_id}";
		$query = mysqli_query($this->conn, $sql);	
		$result = array();
		if(!empty($query) && $query->num_rows > 0){
			while ($row = mysqli_fetch_assoc($query)) {
				$result[] = $row;
			}
		}
		return $result;
	}
	public function getAllCategory(){
		$sql = "SELECT * FROM room_category";
		$query = mysqli_query($this->conn, $sql);	
		$result = array();
		if(!empty($query) && $query->num_rows > 0){
			while ($row = mysqli_fetch_assoc($query)) {
				$result[] = $row;
			}
		}
		return $result;

	}
}