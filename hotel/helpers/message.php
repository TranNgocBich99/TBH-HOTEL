<?php
class UE_Message{
	public static function add($message = '', $key = 'message', $type = 'success'){
		$_SESSION[$key] = $message;
		$_SESSION[$key . '_type'] = $type;
	}

	public static function show($key = 'message'){
		if(isset($_SESSION[$key])){
			$type = $_SESSION[$key . '_type'];
			if($type == 'success'){
				echo '<div class="alert alert-success">'. $_SESSION[$key] .'</div>';
			}elseif($type == 'danger'){
				echo '<div class="alert alert-danger">'. $_SESSION[$key] .'</div>';
			}elseif ($type == 'warning'){
				echo '<div class="alert alert-warning">'. $_SESSION[$key] .'</div>';
			}else{
				echo '<div class="alert alert-info">'. $_SESSION[$key] .'</div>';
			}
		}
		unset($_SESSION[$key]);
		unset($_SESSION[$key . '_type']);
	}

}