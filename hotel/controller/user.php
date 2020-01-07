<?php
class User extends Base_Controller{
	public function __construct() {
		parent::__construct();

	}
	public function login() {
		if(isset($_POST['login_action'])){
			$username = UE_Input::post('username');
			$password = UE_Input::post('password');
			if(empty($username) || empty($password)){
				$this->loadView('user/login', array('errors' => 'Tài khoản hoặc Mật khẩu không được trống.'));
			}else{
				$user_data = $this->model->getUserData($username, $password);
				if(!empty($user_data)){
					$_SESSION['login'] = array_shift($user_data);
					header('Location: http://localhost/CNPM/hotel/');
				}else{
					$this->loadView('user/login', array('errors' => 'Đăng nhập thất bại.'));
				}
			}
			return;
		}
		$this->loadView('user/login');
	}
	public function logout(){
		if(isset($_SESSION['login'])){
			unset($_SESSION['hotel_cart']);
			unset($_SESSION['login']);
		}
		header('location: ' . SITEURL);
		exit();
	}
	public function register() {
		$val = new UE_Validate();
		$err = array();
		if(isset($_POST['signup_action'])){

			$username = UE_Input::post('username');
			$email = UE_Input::post('email');
			$password = UE_Input::post('password');
			$re_password = UE_Input::post('re_password');

			if(empty($username)){
				$err['username'] = "Tên tài khoản không được trống";
			}else{
				if($val->minLength($username, 6)){
					$err['username'] = "Tên tài khoản phải lớn hơn hoặc bằng 6 ký tự";	
				}else{
				/*	dd(2344);die;*/
					$check_username = $this->model->username_exists($username);
					if($check_username){
						$err['username'] = "Tên tài khoản đã tồn tại";
					}
				}
			}

			if(empty($email)){
				$err['email'] = "Email không được trống";
			}else{
				if(!$val->isEmail($email)){
					$err['email'] = "Email không đúng định dạng";
				}else{
					$check_email = $this->model->email_exists($email);
					if($check_email){
						$err['email'] = "Email đã tồn tại";	
					}
				}
			}

			if(empty($password)){
				$err['password'] = "Mật khẩu không được trống";
			}else{
				if($password != $re_password){
					$err['password'] = "Mật khẩu không giống nhau";
				}
			}

			if(!empty($err)){
				$err_str = implode('<br />', $err);
			}else{
				$post_data = $_POST;
				$res = $this->model->add_user($post_data);
				if($res > 0){
					UE_Message::add('Đăng ký thành công', 'message', 'success');
				}else{
					UE_Message::add('Đăng ký thất bại', 'message', 'danger');
				}
			}
			
		}
			$this->loadView('user/register', array('err' => $err));
	}
}