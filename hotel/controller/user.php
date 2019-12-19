<?php
class User extends Base_Controller{
	public function __construct() {
		parent::__construct();

	}
	public function login() {
		$this->loadView('user/login');
	}
}