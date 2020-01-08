<?php
class Cart extends Base_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function add_cart(){
		if(ue_is_login()){
			if(isset($_POST['add_to_cart'])){
				$book_id = UE_Input::post('room_id');
				$this->loadModel('Room');
				$book_data = $this->model->getRoomByID($book_id);
				if(!empty($book_data)){			
					$_SESSION['hotel_cart'][$book_data['room_id']] = $book_data;
				}
			}
			header('location: ' . ue_get_link('cart', 'detail'));
		}else {
			header('location: ' . ue_get_link('user', 'login'));
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