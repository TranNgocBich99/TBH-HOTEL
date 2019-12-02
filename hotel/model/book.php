
<?php
class Book_Model extends Base_Model{
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
}