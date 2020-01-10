<?php
class Order extends Base_Controller{
	public function __construct() {
		parent::__construct();
	}
	public function success(){
		$this->loadView('order/success');
	}
}