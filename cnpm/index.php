<?php
session_start();
class CNPM{
	public function __construct() {
		$this->init();
		$this->route();
	}

	public function route(){
		$url = UE_Input::get('url');

		//book/detail/2/
		$url = rtrim($url, '/');
		//book/detail/2
		$params = array();
		if(!empty($url)){
			$url = explode('/', $url);
			//book
			//dedtail
			//2
			$url_temp = $url;
			unset($url_temp[0]);
			$controller = $url[0];
			if(isset($url[1])){
				$action = $url[1];
				unset($url_temp[1]);
			}else{
				$action = 'index';
			}

			foreach ($url_temp as $k => $v){
				array_push($params, $v);
			}
		}else{
			$controller = 'room';
			$action = 'index';
		}
		$controller_name = ucfirst($controller);
		if(method_exists($controller_name, $action)){
			$c = new $controller_name();
			$c->loadModel($controller_name);
			if(!empty($params)){
				$c->$action(implode(', ', $params));
			}else{
				$c->$action();
			}
		}else{
			echo 'Không tìm thấy trang này.';
		}
	}

	public function init(){
		$config_files = array(
			'config/config'
		);


		$helper_files = array(
			'helpers/message',
			'helpers/input',
			'helpers/helper',
			'helpers/validate'
		);

		$core_files = array(
			'core/Base_Model',
			'core/Base_Controller',
		);

		$files = array(
			
			//'model/user',
			
			//'controller/introduce'
		);
		$this->load($config_files);
		$this->load($helper_files);
		$this->load($core_files);
		$this->load($files);
	}

	private function load($arr){
		foreach ($arr as $k => $v){
			$path = $v . '.php';
			if(file_exists($path)){
				require_once $path;
			}
		}
	}
}
/* Goi truc tiep toi function controller */
new CNPM();