<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 7/7/2019
 * Time: 10:17 AM
 */
class UE_Input{
	public static function post($key, $default = ''){
		if(isset($_POST[$key])){
			return $_POST[$key];
		}else{
			return $default;
		}
	}

	public static function get($key, $default = ''){
		if(isset($_GET[$key])){
			return $_GET[$key];
		}else{
			return $default;
		}
	}

	public static function get_session($key){
		if(isset($_SESSION[$key]) && !empty($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return '';
		}
	}
}