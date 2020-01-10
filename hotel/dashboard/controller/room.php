<?php
class Room extends Base_controller{
	public function __construct(){
		parent:: __construct();
	}

	public function getAvailability(){
		$results = [];
		$post_id       = UE_Input::post( 'post_id', '' );
		$check_in      = UE_Input::post( 'start', '' );
		$check_out     = UE_Input::post( 'end', '' );

		if(!empty($post_id) and !empty($check_in) and !empty($check_out)){
			$data = $this->model->getRoomAvailability($post_id, $check_in, $check_out);
			for ( $i = intval( $check_in ); $i <= intval( $check_out ); $i = strtotime( '+1 day', $i ) ) {
				$in_date = false;
				if ( is_array( $data ) and ! empty( $data ) ) {
					foreach ( $data as $key => $val ) {
						if ( $i >= intval( $val['check_in'] ) && $i <= intval( $val['check_out'] ) ) {
							$item = [
								'id' => $i,
								'title' => 'room_' . $post_id,
								'start'   => date( 'Y-m-d', $i ),
								'price'   => floatval( $val['price'] ),
								'status'  => $val['status'],
								'is_base' => 0
							];
							if ( ! $in_date ) {
								$in_date = true;
							}
						}
					}
				}
				if ( isset( $item ) ) {
					$results[] = $item;
					unset($item);
				}
			}
		}
		echo json_encode($results);die;
	}

	public function addAvailability(){
		$check_in = UE_Input::post('calendar_check_in', '');
		$check_out = UE_Input::post('calendar_check_out', '');

		if ( empty( $check_in ) or empty( $check_out ) ) {
			echo json_encode([
				'status' => false,
				'message' => 'The check in or check out field is not empty.'
			]);die;
		}

		if ( $check_in > $check_out ) {
			echo json_encode([
				'status' => false,
				'message' => 'The check out is later than the check in field.'
			]);die;
		}

		$status = UE_Input::post( 'calendar_status', 'available' );
		$price = UE_Input::post( 'calendar_price', '' );
		if ( $status == 'available' ) {
			if(empty($price)){
				echo json_encode([
					'status' => false,
					'message' => 'The price field is required.'
				]);die;
			}
			if ( filter_var( $price, FILTER_VALIDATE_FLOAT ) === false ) {
				echo json_encode([
					'status' => false,
					'message' => 'The price field is not a number.'
				]);die;
			}
		}
		$post_id = UE_Input::post( 'calendar_post_id', '' );
		$parent_id = 0;
		$number = 1;
		$booking_period = 3;
		$adult_number = 2;
		$child_number = 4;

		if(empty($price))
			$price = '';

		for ( $i = $check_in; $i <= $check_out; $i = strtotime( '+1 day', $i ) ) {
			$data = [
				'post_id'   => $post_id,
				'check_in'  => $i,
				'check_out' => $i,
				'price'     => $price,
				'status'    => $status,
				'parent_id' => $parent_id,
				'number' => $number,
				'booking_period' => $booking_period,
				'adult_number' => $adult_number,
				'child_number' => $child_number,
			];
			$data = $this->model->insertOrUpdate($data);
		}

		$arr_success = [
			'type' => 'success',
			'status' => 1,
			'message' => 'Successfully'
		];
		echo json_encode($arr_success);die;
	}

	public function listRoom(){
		$data = $this->model->getRoom();
		$this->loadView('room/list', array('res' => $data));
	}
	public function delete($room_id){
		if(!empty($room_id)){
			$res = $this->model->delete($room_id);
			if($res > 0){
				UE_Message::add('Bạn đã xóa thành công', 'room', 'success');
			}else{
				UE_Message::add('Đã có lỗi xảy ra', 'room', 'warning');
			}
		}
		header('location: ' . ue_get_admin_link('room', 'listRoom'));
	}
	public function add(){
		$err = array();
		if(isset($_POST['add_room'])){
			
			$name = UE_Input::post('room_name');
			if(empty($name)){
				$err['room_name'] = "Tên phòng không được để trống";
			}
			if(!empty($err)){
				$err_str = implode('<br />', $err);
				UE_Message::add($err_str, 'message', 'danger');
			}else{
				$post_data = $_POST;

				/*$current_user = ue_get_user_data();
				$post_data['author'] = $current_user['id'];*/

				$thumb = $this->uploadFile();
				if(!empty($thumb)){
					$post_data['thumb'] = 'uploads/' . $thumb;
				}

				$res = $this->model->add($post_data);
				if($res > 0){
					UE_Message::add('Thêm mới thành công', 'message', 'success');
				}else{
					UE_Message::add('Thêm mới thất bại', 'message', 'danger');
				}
			}
		}
		$this->loadModel('Category');
		$cate_data = $this->model->getCategory();
		$this->loadView('room/addRoom', array('data' => $cate_data, 'err' => $err));
	}
	public function uploadFile(){
		if(!empty($_FILES) && isset($_FILES['thumb'])){
			$uploadDir = SITEPATH . 'assets/uploads/';
			$file_name = $_FILES['thumb']['name'];
			$file_type = $_FILES['thumb']['type'];
			
			$file_size = $_FILES['thumb']['size'];
			$file_temp = $_FILES['thumb']['tmp_name'];

			$ext = pathinfo($file_name, PATHINFO_EXTENSION);

			$file_name = str_replace('.' . $ext, '', $file_name);

			$file_name = $file_name  . '_' . time() . '.' . $ext;


			$target_file = $uploadDir . basename($file_name);

			if (move_uploaded_file($file_temp, $target_file)) {
		    	return $file_name;
		    }else{
		    	return '';
		    }
		}
	}
	public function edit($room_id){
		if(isset($_POST['edit-room'])){
			$post_data = $_POST;

			if(isset($_FILES['thumb']) && !empty($_FILES['thumb']['name'])){
				$thumb = $this->uploadFile();
				if(!empty($thumb)){
					$post_data['thumb'] = 'uploads/' . $thumb;
				}
			}else{
				$post_data['thumb'] = $post_data['thumb_temp'];
			}
				
			$res = $this->model->update($room_id, $post_data);
			if($res > 0){
				UE_Message::add('Cập nhật thành công', 'room', 'success');
				header('location: ' . ue_get_admin_link('room', 'listRoom'));

			}else{
				UE_Message::add('Cập nhật thất bại', 'room', 'warning');
				header('location: ' . ue_get_admin_link('room', 'listRoom'));
			}
		}

		$currentRoom = $this->model->getRoomByID($room_id);
		$this->loadModel('Category');
		$cate_data = $this->model->getCategory();
		$this->loadView('room/edit', array('book' => $currentRoom, 'cate' => $cate_data));
	}
}
?>