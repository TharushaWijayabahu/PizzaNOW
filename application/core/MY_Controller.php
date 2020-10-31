<?php


class MY_Controller extends CI_Controller {

	public function render($view,$data = array()){
		$this->load->view('common/header',$data);
		$this->load->view($view,$data);
		$this->load->view('common/footer');
	}

}
