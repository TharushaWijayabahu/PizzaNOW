<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends MY_Controller {

	public function __construct() {
		parent::__construct();
//		if(!$this->session->userdata('id')){
//			redirect('login');
//		}
	}

	function index() {
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
		$this->render('cart/cart', $data);
	}

	function addToCart() {
		$item = new stdClass;
		$item->id = $this->input->post('sideID');
		$item->name = $this->input->post('sideName');
		$item->description = $this->input->post('sideDescription');
		$item->imgUrl = $this->input->post('sideImgURL');
		$item->price = $this->input->post('sidePrice');
		$item->qty = $this->input->post('sideQty');
		$item->total = $item->qty * $item->price;
		$item->isNew = true;
		$total = 0;

		if ($this->session->has_userdata('itemList')) {
			$itemList = $this->session->userdata('itemList');
			$totalAmount = $this->session->userdata('totalAmount');
			foreach ($itemList as $row => $row_value) {
				if (($item->id) == ($row_value->id)) {
					$row_value->qty += 1;
					$row_value->total = ($row_value->qty)*($item->total);
					$item->isNew = false;
					$total = $totalAmount + $item->total;
					break;
				}
			}
			if($item->isNew){
				array_push($itemList, $item);
				$total = ($item->total)*($item->qty) + $totalAmount;
			}
			$this->session->set_userdata('itemList',$itemList);
			$this->session->set_userdata('totalAmount',$total);
		} else {
			$uniqId = uniqid();
			$list = array(
				'userId' => $uniqId,
				'itemList' => array($item),
				'totalAmount' => ($item->total)*($item->qty)
			);
			$this->session->set_userdata($list);
		}
		$this->index();
	}


	function removeItem() {
		$id = $this->input->post('id');
		$itemList = $this->session->userdata('itemList');
		$totalAmount = $this->session->userdata('totalAmount');
		foreach ($itemList as $row => $row_value) {
			if ($row == $id) {
				array_splice($itemList, $row, 1);
				if(count($itemList) > 0){
					$totalAmount = $totalAmount - ($row_value->total);
					$this->session->set_userdata('itemList',$itemList);
					$this->session->set_userdata('totalAmount',$totalAmount);
				}else{
					$data = array(
						'isSet' => false,
						'itemList' => null,
						'totalAmount' => 0
					);
					$this->session->set_userdata($data);

				}
				break;
			}
		}
		$this->index();
	}

	function addQuantity(){
		$id = $this->input->post('id');
		$quantity = $this->input->post('quantity');
		$itemList = $this->session->userdata('itemList');
		$totalAmount = $this->session->userdata('totalAmount');
		foreach ($itemList as $row => $row_value) {
			if ($row == $id) {
				$total = $row_value->total;
				$row_value->qty = $quantity;
				$row_value->total = $quantity * $row_value->price;
				$totalAmount = $totalAmount + ($row_value->total - $total);
				$this->session->set_userdata('itemList',$itemList);
				$this->session->set_userdata('totalAmount',$totalAmount);
				break;
			}
		}
		$this->index();
	}

	function logout() {
		$data = $this->session->all_userdata();
		foreach ($data as $row => $rows_value) {
			$this->session->unset_userdata($row);
		}
	}

}
