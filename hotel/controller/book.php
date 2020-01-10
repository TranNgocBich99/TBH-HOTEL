<?php
class Book extends Base_Controller{
	public function __construct() {
		parent::__construct();

	}
	public function index() {
		$data = $this->model->getRoom();
		$check_in_out = UE_Input::get('daterange');
		$check_in = '';
		$check_out = '';
		if(!empty($check_in_out)){
			$check_in_out = explode(' - ', $check_in_out);
			if(count($check_in_out) == 2){
				$check_in = $check_in_out[0];
				$check_out = $check_in_out[1];
			}
		}
		$this->loadView('book/book', array('res' => $data, 'check_in' => $check_in, 'check_out'=> $check_out));

	}
}