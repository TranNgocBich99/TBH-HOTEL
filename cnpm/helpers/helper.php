<?php
if(!function_exists('dd')){
	function dd($arr){
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}
}
if(!function_exists('ue_cut_string')){
	function ue_cut_string($str){
		$count_str = 75;
		if($count_str >= strlen($str)){
			return $str;
		}else{
			$str = substr($str, 0, $count_str);
			return $str . '...';
		}		
	}
}

if(!function_exists('ue_get_link')){
	function ue_get_link($controller = '', $action = 'index'){
		return SITEURL . $controller . '/' . $action;
	}
}

if(!function_exists('ue_get_admin_link')){
	function ue_get_admin_link($controller = '', $action = 'index'){
		return SITEURL . 'dashboard/' . $controller . '/' . $action;
	}
}

if(!function_exists('ue_is_login')){
	function ue_is_login(){
		$logged = UE_Input::get_session('login');
		if(!empty($logged)){
			return true;
		}else{
			return false;
		}
	}
}

if(!function_exists('ue_get_user_data')){
	function ue_get_user_data(){
		return UE_Input::get_session('login');
	}
}

if(!function_exists('ue_format_price')){
	function ue_format_price($price){
		return number_format($price, false, false, '.') . ' đ';
	}
}

if(!function_exists('ue_get_cart_total_price')){
	function ue_get_cart_total_price(){
		$cart = UE_Input::get_session('cart');
		$total_price = 0;
		foreach ($cart as $k => $v){
			$total_price += ($v['price'] * $v['number']);
		}
		return $total_price;
	}
}

