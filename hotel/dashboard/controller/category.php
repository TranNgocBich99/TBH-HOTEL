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
	public function add(){
		$err = array();
		if(isset($_POST['add_category'])){
			
			$name = UE_Input::post('category_name');
			if(empty($name)){
				$err['category_name'] = "Tên danh mục không được để trống";
			}
			if(!empty($err)){
				$err_str = implode('<br />', $err);
				UE_Message::add($err_str, 'message', 'danger');
			}else{
				$post_data = $_POST;

				/*$current_user = ue_get_user_data();
				$post_data['author'] = $current_user['id'];*/

				$thumb = $this->uploadFile();
				if(!empty($thumb)){
					$post_data['thumb'] = 'uploads/' . $thumb;
				}

				$res = $this->model->add($post_data);
				if($res > 0){
					UE_Message::add('Thêm mới thành công', 'message', 'success');
				}else{
					UE_Message::add('Thêm mới thất bại', 'message', 'danger');
				}
			}
		}
		$this->loadView('category/addCategory');
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
	public function edit($category_id){
		if(isset($_POST['edit-category'])){
			$post_data = $_POST;

			if(isset($_FILES['thumb']) && !empty($_FILES['thumb']['name'])){
				$thumb = $this->uploadFile();
				if(!empty($thumb)){
					$post_data['thumb'] = 'uploads/' . $thumb;
				}
			}else{
				$post_data['thumb'] = $post_data['thumb_temp'];
			}
				
			$res = $this->model->update($category_id, $post_data);
			if($res > 0){
				UE_Message::add('Cập nhật thành công', 'category', 'success');
				header('location: ' . ue_get_admin_link('category', 'listCategory'));

			}else{
				UE_Message::add('Cập nhật thất bại', 'category', 'warning');
				header('location: ' . ue_get_admin_link('category', 'listCategory'));
			}
		}

		$currentCate = $this->model->getCategoryByID($category_id);
		$this->loadView('category/edit', array('data' => $currentCate));
	}
}