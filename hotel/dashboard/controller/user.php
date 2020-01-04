<?php
class User extends Base_Controller{
	public function __construct() {
		parent::__construct();
	}
	public function getUser(){
		$data = $this->model->getUserAdmin();
		$this->loadView('user/listUser', array('res' => $data));
	}
}