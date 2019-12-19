<?php
class Base_Controller{
	protected $model;
	public function __construct(){

	}

	public function loadModel($model){
		$model_name = $model . '_Model';
		if(class_exists($model_name)) {
			$this->model = new $model_name();
		}
	}

	public function loadView($path, $data = array(), $includeHF = true){
		/*echo $path;die;*/
		$menus = $this->getMenus(0);
		$path = 'view/'.$path .'.php';
		
		if(file_exists($path)){
			/*echo $path; die;*/
			extract($data);
			if($includeHF){
				include "view/header.php";
			}
			include $path;
			if($includeHF){
				include "view/footer.php";
			}
		}
	}
	public function loadView1($path = ''){

		$path = 'view/'.$path .'.php';
		
		if(file_exists($path)){
			extract($data);
			if($includeHF){
				include "view/header.php";
			}
			include $path;
			if($includeHF){
				include "view/footer.php";
			}
		}
	}

	public function getMenus($parent_id){
		if(class_exists('User_Model')){
			$user_model = new User_Model();
			$parent_menu = $user_model->getMenus($parent_id);
			
			foreach ($parent_menu as $k => $v) {
				$child = $user_model->getMenus($v['id']);
				if(!empty($child)){
					$parent_menu[$k]['child'] = $child;
				}
			}

			return $parent_menu;
		}else{
			return array();
		}
	}
}
