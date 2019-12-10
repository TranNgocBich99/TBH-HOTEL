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
	public function uploadFile(){
		if(!empty($_FILES) && isset($_FILES['thumb'])){
			$uploadDir = SITEPATH . 'assets/uploads/';
			$file_name = $_FILES['thumb']['name'];
			$file_type = $_FILES['thumb']['type'];
			
			$file_size = $_FILES['thumb']['size'];
			$file_temp = $_FILES['thumb']['tmp_name'];

			$ext = pathinfo($file_name, PATHINFO_EXTENSION);

			$file_name = str_replace('.' . $ext, '', $file_name);

			$file_name = $file_name  . '_' . time() . '.' . $ext;


			$target_file = $uploadDir . basename($file_name);

			if (move_uploaded_file($file_temp, $target_file)) {
		    	return $file_name;
		    }else{
		    	return '';
		    }
		}
	}
}