<?php
class Hotel extends Base_Controller{
	public function __construct() {
		parent::__construct();

	}
	public function index() {
		$this->loadView('room/room');
	}
}