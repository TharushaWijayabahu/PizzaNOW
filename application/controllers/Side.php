<?php


class Side extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('SideModel');
	}

	public function index(){
		$data['sideItem'] = $this->SideModel->getAllSide();
		$this->render('menu/side', $data);
	}

//	function addToCart() {
//
//		$id = $this->input->post('sideID');
//		$name = $this->input->post('sideName');
//		$description = $this->input->post('sideDescription');
//		$imgUrl = $this->input->post('sideImgURL');
//		$price = $this->input->post('sidePrice');
//		$qty = $this->input->post('sideQty');
//
//		$item = array(
//			'sideID' => $this->input->post('sideID'),
//			'sideName' => $this->input->post('sideName'),
//			'sideDescription' => $this->input->post('sideDescription'),
//			'sideImgURL' => $this->input->post('sideImgURL'),
//			'sidePrice' => $this->input->post('sidePrice'),
//			'sideQty' => $this->input->post('sideQty'),
//		);
//		if ($this->session->has_userdata('userId')) {
//			$itemList[] = $this->session->userdata('itemList');
//			array_push($itemList, $item);
//			$this->session->set_userdata('itemList', $itemList);
//		} else {
//			$uniqId = uniqid();
//			$list = array(
//				'userId' => $uniqId,
//				'itemList' => array($item)
//			);
//			$this->session->set_userdata($list);
//		}
//		$this->index();
////		redirect('');
//	}
}
