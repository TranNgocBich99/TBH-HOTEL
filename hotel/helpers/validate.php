<?php
class UE_Validate{
	public function __construct(){

	}

	public function isEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}
		return false;
	}

	public function minLength($str, $length){
		if(strlen($str) < $length){
			return true;
		}else{
			return false;
		}
	}
}