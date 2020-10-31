<?php


class PizzaModel extends CI_Model {

	public function getAllPizzaItem(){
		$this->db->where("pizza_availability", "yes");
		$query = $this->db->get("pizza");
		return $query->result();
	}

	public function getPizzaItemById($id){
		$this->db->where("pizza_id", $id);
		$query = $this->db->get("pizza");
		if($query->num_rows() > 0){
			return $query->result();
		}else {
			return array("message" => "404 Item NOT FOUND");
		}
	}

	public function getAllTopping(){
		$this->db->where("topping_availability", "yes");
		$query = $this->db->get("topping");
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array('message' => 'no toppings available');
		}

	}
}
