<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('LoginModel');
	}

	function index(){
		$this->render('login/login');
	}

	function validation(){
		$this->form_validation->set_rules('user_email','Email Address',
			'required|trim|valid_email');
		$this->form_validation->set_rules('user_password','Password',
			'required');
		if($this->form_validation->run()){
			$result = $this->LoginModel->canLogin($this->input->post('user_email'),
			$this->input->post('user_password'));
			print_r($result);
			if($result == ''){
				redirect('cart');
			}else{
				$this->session->set_flashdata('message', $result);
				redirect('login');
			}
		}else{
			$this->index();
		}
	}
}
