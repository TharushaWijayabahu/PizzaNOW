<?php


class SideModel extends CI_Model {

	public function getAllSide(){
		$this->db->where("side_availability", "yes");
		$query = $this->db->get("side");
		return $query->result();
	}
}
