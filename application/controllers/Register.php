<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('RegisterModel');
	}

	function index(){
		$this->render('register/register');
	}

	function validation(){
		$this->form_validation->set_rules('user_name','Name', 'required|trim');
		$this->form_validation->set_rules('user_email','Email Address',
			'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('user_password','Password',
			'required');

		if($this->form_validation->run()){
			$verificationKey = md5(rand());
			$encryptedPassword = $this->encryption->encrypt($this->input->post('user_password'));

			$data = array(
				'name' => $this->input->post('user_name'),
				'email' => $this->input->post('user_email'),
				'password' => $encryptedPassword,
				'verification_key' => $verificationKey,
				'is_email_verified' => 'no'
			);
			$id = $this->RegisterModel->insert($data);
			if ($id>0){
				$subject = "Please verify email for login";
				$item = array(
					'isSet' => true,
					'itemList' => $this->session->userdata('itemList'),
					'totalAmount' => $this->session->userdata('totalAmount'),
					'customer' => $this->session->userdata('customer'),
					'orderStatus' => 'Success'
				);
				$message = $message = $this->load->view('order/placeOrder',$item,true);
//					"
//				<p>Hi ".$this->input->post('user_name')."</p>
//				<p>This is email verification mail from PizzaNow  system. For complete registration process
//				and login into system. First you want to verify you email by click
//				this <a href='".base_url()."register/verify_email/".$verificationKey."'>link</a>.</p><br />
//				<p>Thanks,</p>
//				";
				$this->load->library('email');
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.gmail.com',
					'smtp_port' => '465',
					'smtp_user' => 'epillPod2018@gmail.com',
					'smtp_from_name' => 'Pizza Now',
					'smtp_pass' => 'shereenP98',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'newline' => "\r\n",
					'smtp_crypto'   => 'ssl',
					'wordwrap' => TRUE
				);
				$this->email->initialize($config);
				$this->email->from('epillPod2018@gmail.com');
				$this->email->to($this->input->post('user_email'));
				$this->email->set_newline("\r\n");
				$this->email->subject($subject);
				$this->email->message($message);
				if($this->email->send()){
					$this->session->set_flashdata('message',
						'Check in your email for email verification mail');
					redirect('register');
				}
			}
		}else{
			$this->index();
		}
	}

	function verify_email(){
		if($this->uri->segment(3)){
			$verification_key = $this->uri->segment(3);
			if($this->RegisterModel->verify_email($verification_key)){
				$data['message'] = '<h1 align="center">Your Email has been successfully verified,
 					Now you can log from <a href="'.base_url().'login">here</a></h1>';
			}else{
				$data['message'] = '<h1 align="center">Invalid Link</h1>';
			}
			$this->load->view('register/emailVerification', $data);
		}
	}
}
