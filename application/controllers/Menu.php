<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MenuModel');
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
		$data['drinkItem'] = $this->MenuModel->getAllDrink();
		$this->render('menu/home', $data);
	}

	public function Pizza(){
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
		$data["pizzaItem"] = $this->MenuModel->getAllPizzaItem();
		$this->render('menu/pizza/pizza', $data);
	}

	public function pizzaCustomize(){
		if($this->uri->segment(3)){
			$pizzaId = $this->uri->segment(3);
			$item["pizzaItem"] = $this->MenuModel->getPizzaItemById($pizzaId);

			if(isset($item)){
				$topping["topping"] = $this->MenuModel->getAllTopping();
				$data = array(
					'pizzaItem' => $item,
					'topping' => $topping
				);

				$this->render('menu/pizza/pizzaItem', $data);
			}
		}
	}
	public function drink(){
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
		$data['drinkItem'] = $this->MenuModel->getAllDrink();
		$this->render('menu/drink', $data);
	}

	public function side(){
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

		$data['sideItem'] = $this->MenuModel->getAllSide();
		$this->render('menu/side', $data);
	}

	public function specialDeal(){

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

//		$data['sideItem'] = $this->MenuModel->getAllSide();
		$this->render('menu/specialDeal', $data);
	}

}
