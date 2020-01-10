<?php
class Order extends Base_Controller{
	public function __construct() {
		parent::__construct();
	}
	public function success(){
		$this->loadView('order/success');
	}
	public function create_order(){
		if(ue_is_login()){
			$user = ue_get_user_data();
			$cart = UE_Input::get_session('hotel_cart');
			/*dd($cart);die;*/
			$total_price = ue_get_cart_total_price();
			$this->updateAvailability();
			$res = $this->model->createOrder(serialize($cart), $user['id'], $user['username'], $total_price);			
			if($res > 0){
				unset($_SESSION['hotel_cart']);
			}
		}
		header('location: ' . ue_get_link('order', 'success'));
	}

	private function updateAvailability(){
		$cart = UE_Input::get_session('hotel_cart');
		foreach ($cart as $key => $value) {
			$check_in = strtotime($value['check_in']) + 3600;
			$check_out = strtotime($value['check_out']) + 3600;
			$room_id = $value['room_id'];			
			for($i = $check_in; $i <= $check_out; $i = strtotime("+1day", $i)){
				$this->model->updateAvailability($room_id, $i);
			}
		}
	}
}