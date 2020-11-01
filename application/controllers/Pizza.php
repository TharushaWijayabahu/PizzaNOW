<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pizza extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('PizzaModel');
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
		$data["pizzaItem"] = $this->PizzaModel->getAllPizzaItem();
		$this->render('menu/pizza/pizza', $data);
	}
	public function customize(){
		if($this->uri->segment(3)){
			$pizzaId = $this->uri->segment(3);
			$item["pizzaItem"] = $this->PizzaModel->getPizzaItemById($pizzaId);

			if(isset($item)){
				$topping["topping"] = $this->PizzaModel->getAllTopping();
				$data = array(
					'pizzaItem' => $item,
					'topping' => $topping
				);

				$this->render('menu/pizza/pizzaItem', $data);
			}
		}
	}
}
