<?php
class Category extends Base_controller{
	public function __construct(){
		parent:: __construct();
	}

	public function detail($cate_id){
		$data = $this->model->getCategoryByID($cate_id);
		$this->loadView('category/detail', array('res' => $data));
	}
	public function index() {
		$data = $this->model->getAllCategory();
		$this->loadView('category/index', array('res' => $data));
	}
	public function index1() {
		$data = $this->model->getAllCategory();
		$this->loadView1('', array('res' => $data));
	}


}