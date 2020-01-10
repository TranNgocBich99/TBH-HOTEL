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
			$res = $this->model->createOrder(serialize($cart), $user['id'], $user['username'], $total_price);
			if($res > 0){
				unset($_SESSION['hotel_cart']);
				UE_Message::add('Thanh toán thành công');
			}else{
				UE_Message::add('Đã có lỗi xảy ra');
			}
		}else{
			UE_Message::add('Đã có lỗi xảy ra');
		}
		header('location: ' . ue_get_link('order', 'success'));
	}
}