<?php
class Room extends Base_controller{
	public function __construct(){
		parent:: __construct();
	}

	public function search(){
		$s = UE_Input::get('s');
		$data = $this->model->getRoom($s);
		$this->loadView('room/list', array('res' => $data));
	}
}