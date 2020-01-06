<?php
if(!session_id()){
	session_start();
}

class HOTEL_Admin{
	public function __construct() {
		$this->init();
		$this->route();
	}

	public function route(){
		$url = UE_Input::get('url');
		$url = rtrim($url, '/');
		$params = array();
		if(!empty($url)){
			$url = explode('/', $url);
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
			$controller = 'admin';
			$action = 'index';
		}

		$controller_name = ucfirst($controller);
		if(method_exists($controller_name, $action)){
			$c = new $controller_name();
			$c->loadModel($controller_name, true);
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
			'../config/config'
		);


		$helper_files = array(
			'../helpers/message',
			'../helpers/input',
			'../helpers/helper'
		);

		$core_files = array(
			'../core/Base_Model',
			'../core/Base_Controller',
		);

		$files = array(
			'model/user',
			'model/room',
			'model/category',
			'controller/admin',
			'controller/room',
			'controller/user',
			'controller/category'
		);
		$this->load($config_files);
		$this->load($helper_files);
		$this->load($core_files);
		$this->load($files);

		/*if(!ue_is_login()){
			header('location: ' . SITEURL);
		}*/
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
new HOTEL_Admin();