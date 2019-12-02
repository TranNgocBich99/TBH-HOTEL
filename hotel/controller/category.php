<?php
class Category extends Base_controller{
	public function __construct(){
		parent:: __construct();
	}

	public function detail($cate_id){
		$data = $this->model->getCategoryByID($cate_id);
		$this->loadView('category/detail', array('res' => $data));
	}

}