<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pizza extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('PizzaModel');
	}

	public function index(){
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
//			$this->render('menu/pizza/pizzaItem');
		}
	}
}
