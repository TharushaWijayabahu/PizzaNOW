<?php


class MovieModel extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	public function getAllMovie(){
		$query = $this->db->get('film');
		$movie = array('movie' => $query->result());
		return $movie;
	}
	public function getMovieByTitle($title){
		$query = $this->db->get('film');
		foreach ($query->result() as $row) {
			if ($title == $row->title) {
				return array('movie' => $row);
			}
			return array('movie' => null);
		}
	}

}
