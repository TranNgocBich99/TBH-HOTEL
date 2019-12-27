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
}
