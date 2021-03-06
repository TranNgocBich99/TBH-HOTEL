<?php
class Cart extends Base_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function add_cart(){
		if(ue_is_login()){
			if(isset($_POST['add_to_cart'])){
				$check_in = UE_Input::post('check_in');
				$check_out = UE_Input::post('check_out');

				if(!empty($check_in) && !empty($check_out)){
					$book_id = UE_Input::post('room_id');
					if(!empty($book_data)){			
						$_SESSION['hotel_cart'][$book_data['room_id']]['check_out'] = $check_out;

					}
				}else{
					UE_Message::add('Bạn cần chọn ngày để đặt phòng.', 'message_addcart', 'warning');
					header('location: ' . ue_get_link('book', 'index') . '#message_addcart');exit();
				}				
			}
			header('location: ' . ue_get_link('cart', 'detail'));exit();
		}else {
			header('location: ' . ue_get_link('user', 'info-user'));exit();
		}
	}

	public function detail(){
		$this->loadView('room/cart');
	}

	public function remove(){
		if(ue_is_login()){
			$book_id = UE_Input::get('room_id');
			if(!empty($book_id)){
				if(isset($_SESSION['hotel_cart']) && isset($_SESSION['hotel_cart'][$book_id])){
					unset($_SESSION['hotel_cart'][$book_id]);//remove theo id của cart (theo id của phòng)
				}
			}
			header('location: ' . ue_get_link('cart', 'detail'));
		}
	}

}