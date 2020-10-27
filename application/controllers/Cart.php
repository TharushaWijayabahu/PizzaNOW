<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

	public function __construct() {
		parent::__construct();
//		if(!$this->session->userdata('id')){
//			redirect('login');
//		}
	}

	function index(){
		$this->render('cart/cart');
//		echo '<h2 align="center">Welcome User </h2>';
//		echo '<p align="center"><a href="'.base_url().'cart/logout">Logout</a> </p>';
	}

	function logout(){
		$data = $this->session->all_userdata();
		foreach ($data as $row => $rows_value){
			$this->session->unset_userdata($row);
		}
		redirect('login');
	}

}
