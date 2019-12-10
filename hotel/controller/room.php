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
	public function detail($room_id = ''){
		if(!empty($room_id)) {
			$data = $this->model->getRoomByID($room_id);
		}else{
			$data = array();
		}
		$this->loadView('room/detail', array('res' => $data));
	}
}