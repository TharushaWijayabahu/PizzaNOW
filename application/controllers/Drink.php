<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drink extends MY_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index(){
		if ($this->session->has_userdata('itemList')) {
			$data = array(
				'isSet' => true,
				'itemList' => $this->session->userdata('itemList'),
				'totalAmount' => $this->session->userdata('totalAmount')
			);
		} else {
			$data = array(
				'isSet' => false,
				'itemList' => null
			);
		}
		$this->render('menu/drink', $data);
	}

}
