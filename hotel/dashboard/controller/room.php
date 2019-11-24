<?php
class Room extends Base_controller{
	public function __construct(){
		parent:: __construct();
	}
	public function listRoom(){
		$data = $this->model->getRoom();
		$this->loadView('room/list', array('res' => $data));
	}
	public function delete($room_id){
		if(!empty($room_id)){
			$res = $this->model->delete($room_id);
			if($res > 0){
				UE_Message::add('Bạn đã xóa thành công', 'room', 'success');
			}else{
				UE_Message::add('Đã có lỗi xảy ra', 'room', 'warning');
			}
		}
		header('location: ' . ue_get_admin_link('room', 'listRoom'));
	}
}
?>