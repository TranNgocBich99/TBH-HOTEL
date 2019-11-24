<?php
class Admin extends Base_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->loadView('admin/index');
	}
}