<?php
class Book extends Base_Controller{
	public function __construct() {
		parent::__construct();

	}
	public function index() {
		$this->loadView('book/book');
	}
}