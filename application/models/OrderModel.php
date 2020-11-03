<?php


class OrderModel extends CI_Model {

	public function placeOrder(){

	}

	public function addCustomer($customer){
		$this->db->insert('customer', $customer);
		return $this->db->insert_id();
	}

	public function addOrder($order){
		$this->db->insert('order', $order);
		return $this->db->insert_id();
	}

	public function addPizzaTopping($pizzaToppingEntity){
		$this->db->insert_batch('p_t_order', $pizzaToppingEntity);
		return $this->db->insert_id();
	}

	public function addPizza($pizzaEntity){
		$this->db->insert_batch('pizza_order', $pizzaEntity);
		return $this->db->insert_id();
	}

	public function addSide($sideEntity){
		$this->db->insert_batch('side_order', $sideEntity);
		return $this->db->insert_id();
	}

	public function addDrink($drinkEntity){
		$this->db->insert_batch('b_order', $drinkEntity);
		return $this->db->insert_id();
	}

	public function addSM($smEntity){
		$this->db->insert_batch('sm_order', $smEntity);
		return $this->db->insert_id();
	}
}
