<?php


class Side extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('SideModel');
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

		$data['sideItem'] = $this->SideModel->getAllSide();
		$this->render('menu/side', $data);
	}
}
