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
	public function delete($category_id){
		$sql = "DELETE FROM room_category WHERE category_id = $category_id";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}
	public function add($data){
		$sql = "INSERT INTO room_category(category_name, description, thumb) VALUES('{$data['category_name']}', '{$data['description']}','{$data['thumb']}')";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}
}

?>