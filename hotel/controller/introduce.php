<?php
class Introduce extends Base_Controller{
	public function __construct() {
		parent::__construct();

	}
	public function index() {
		$this->loadView('introduce/introduce');
	}
}