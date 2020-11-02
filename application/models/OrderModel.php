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
}
