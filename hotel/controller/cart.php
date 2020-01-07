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
			header('location: ' . SITEURL);
		}
	}

	public function detail(){
		$this->loadView('room/cart');
	}

	public function remove(){
		if(ue_is_login()){
			$book_id = UE_Input::get('book_id');
			if(!empty($book_id)){
				if(isset($_SESSION['cart']) && isset($_SESSION['cart'][$book_id])){
					unset($_SESSION['cart'][$book_id]);//remove theo id của cart (theo id của sách)
				}
			}
			header('location: ' . ue_get_link('cart', 'detail'));
		}
	}

	public function update(){
		if(isset($_POST['update_cart'])){
			$number = UE_Input::post('number');
			$book_id = UE_Input::post('book_id');
			$cart = UE_Input::get_session('cart');
			if(!empty($book_id)) {
				foreach ( $book_id as $k => $v ) {
					if ( isset( $cart[ $v ] ) ) {
						$_SESSION['cart'][ $v ]['number'] = $number[ $k ];
					}
				}
			}
		}
		header('location: ' . ue_get_link('cart', 'detail'));
	}
}