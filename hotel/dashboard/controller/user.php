<?php
class User extends Base_Controller{
	public function __construct() {
		parent::__construct();
	}
	public function getUser(){
		$data = $this->model->getUserAdmin();
		$this->loadView('user/listUser', array('res' => $data));
	}
	public function add_User(){
		if(isset($_SESSION['login']) && ($_SESSION['login']['role'] == 0)){
			if(isset($_POST['add_user'])){
				$err = array();

				$name = UE_Input::post('username');
				if(empty($name)){
					array_push($err, 'Tên tài khoản không được trống');
				}
				if(!empty($err)){
					$err_str = implode('<br />', $err);
					UE_Message::add($err_str, 'message', 'danger');
				}else{
					$post_data = $_POST;
					$res = $this->model->add($post_data);
					if($res > 0){
					//$message =  "Thanh cong";
						UE_Message::add('Thêm mới thành công', 'message', 'success');
					}else{
						UE_Message::add('Thêm mới thất bại', 'message', 'danger');
					}
				}
			}
		}
		$this->loadView('user/addUser');
	}
}