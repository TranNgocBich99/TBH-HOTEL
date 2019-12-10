<?php
class Category extends Base_controller{
	public function __construct(){
		parent:: __construct();
	}
	public function listCategory(){
		$data = $this->model->getCategory();
		$this->loadView('category/list', array('res' => $data));
	}
	public function delete($category_id){
		if(!empty($category_id)){
			$res = $this->model->delete($category_id);
			if($res > 0){
				UE_Message::add('Bạn đã xóa thành công', 'category', 'success');
			}else{
				UE_Message::add('Đã có lỗi xảy ra', 'category', 'warning');
			}
		}
		header('location: ' . ue_get_admin_link('category', 'listCategory'));
	}
}