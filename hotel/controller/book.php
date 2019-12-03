<?php
class Book extends Base_Controller{
	public function __construct() {
		parent::__construct();

	}
	public function index() {
		$data = $this->model->getRoom();
		$this->loadView('book/book', array('res' => $data));
	}
}