<?php
class Category extends Base_controller{
	public function __construct(){
		parent:: __construct();
	}
	public function listCategory(){
		$data = $this->model->getCategory();
		$this->loadView('category/list', array('res' => $data));
	}
}