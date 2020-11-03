<?php


class Order extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('OrderModel');

	}

	public function index() {
		if ($this->session->has_userdata('itemList')) {
			$data = array(
				'isSet' => true,
				'itemList' => $this->session->userdata('itemList'),
				'totalAmount' => $this->session->userdata('totalAmount'),
			);
		} else {
			$data = array(
				'isSet' => false,
				'itemList' => null
			);
		}
//		$data['drinkItem'] = $this->MenuModel->getAllDrink();

		$this->render('menu/home', $data);
	}

	public function checkout() {
		$customer = $this->session->userdata('customer');
		$itemList = $this->session->userdata('itemList');
		$totalAmount = $this->session->userdata('totalAmount');

		if (isset($itemList)) {
			if(isset($customer)){
				$data = array(
					'isSet' => true,
					'itemList' => $itemList,
					'totalAmount' => $totalAmount,
					'customer' => $customer
				);
				redirect('index.php/order/confirmOrder',$data);
			}else{
				$data = array(
					'isSet' => true,
					'itemList' => $itemList,
					'totalAmount' => $totalAmount,
				);
				$this->render('order/checkout', $data);
			}
		} else {
			redirect('index.php/cart');
		}
	}

	public function validation() {
		$this->form_validation->set_rules('first_name', 'First name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email Address',
			'required|trim|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('number', 'Mobile Number',
			'required|exact_length[10]');

		if ($this->form_validation->run()) {
			$customer = new stdClass;
			$customer->name = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
			$customer->email = $this->input->post('email');
			$customer->address = $this->input->post('address');
			$customer->number = $this->input->post('number');
			$this->session->set_userdata('customer', $customer);
			$data = array(
				'isSet' => true,
				'itemList' => $this->session->userdata('itemList'),
				'totalAmount' => $this->session->userdata('totalAmount'),
				'customer' => $customer,
				'orderStatus' => 'Pending'
			);
			$this->render('order/confirmOrder',$data);
		} else {
			$data = array(
				'isSet' => true,
				'itemList' => $this->session->userdata('itemList'),
				'totalAmount' => $this->session->userdata('totalAmount'),
			);
			$this->render('order/checkout', $data);
		}
	}

	public function confirmOrder() {
		$customer = $this->session->userdata('customer');
		$itemList = $this->session->userdata('itemList');
		$totalAmount = $this->session->userdata('totalAmount');

		if(isset($customer)){
			$data = array(
				'isSet' =>true,
				'itemList' => $itemList,
				'totalAmount' => $totalAmount,
				'customer' => $customer,
				'orderStatus' => 'Pending'
			);
			if(isset($itemList)){
//				$this->sendEmail();
				$this->render('order/confirmOrder',$data);
			}else{
				redirect('index.php/cart/cart',$data);
			}
		}else{
			redirect('index.php/cart');
		}
	}

	public function placeOrder(){
		$customer = $this->session->userdata('customer');
		$itemList = $this->session->userdata('itemList');
		$total = $this->session->userdata('totalAmount');
		$customerEntity = array(
			'customer_name' => $customer->name,
			'customer_email' => $customer->email,
			'customer_address' => $customer->address,
			'customer_mobile' => $customer->number,
		);
		$cId = 1;
//			$this->OrderModel->addCustomer($customerEntity);
			if($cId> 0){
				$orderEntity = array(
					'customer_id' => $cId,
					'order_price' => $total,
					'order_delivery_address' => $customer->address,
					'order_date' => date('Y-m-d H:i:s'),
					'delivery_time' => date('H:i:s', strtotime('+30 minutes')),
					'order_status' => 'Success'
				);
				$oId = 1;
//					$this->OrderModel->addOrder($orderEntity);
				if($oId>0){
					$pizzaToppingEntity = array();
					$pizzaEntity = array();
					$sideEntity = array();
					$drinkEntity = array();
					$smEntity = array();
					foreach ($itemList as $row => $item){
//						print_r($item);
						if($item->type == 'PIZZA'){
							if(count($item->selectedTopping)>0){
								foreach ($item->selectedTopping as $topping){
									$pizzaToppingEntity[] = array(
										'order_id' => $oId,
										'pizza_id' => $item->id,
										'topping_id' => $topping['toppingId'],
										'quantity' => $item->qty,
										'total' => $item->total
									);
								}
							}else{
								$pizzaEntity[] = array(
									'order_id' => $oId,
									'pizza_id' => $item->id,
									'quantity' => $item->qty,
									'total' => $item->total
								);
							}
						}elseif ($item->type == 'SIDE'){
							$sideEntity[] = array(
								'order_id' => $oId,
								'side_id' => $item->id,
								'quantity' => $item->qty,
								'total' => $item->total
							);

						}elseif ($item->type == 'DRINK'){
							$drinkEntity[] = array(
								'order_id' => $oId,
								'beverage_id' => $item->id,
								'quantity' => $item->qty,
								'total' => $item->total
							);

						}else{
							$smEntity[] = array(
								'order_id' => $oId,
								'sm_id' => $item->id,
								'quantity' => $item->qty,
								'total' => $item->total
							);

						}
					}

					$this->addOrderToDB($pizzaToppingEntity, $pizzaEntity, $sideEntity, $drinkEntity, $smEntity);
				}
			}

	}
	public function addOrderToDB($pizzaToppingEntity, $pizzaEntity, $sideEntity, $drinkEntity, $smEntity){
		if(count($pizzaToppingEntity) > 0){
			$id = $this->OrderModel->addPizzaTopping($pizzaToppingEntity);
			print_r('addPizzaTopping '. $id);
		}
		if(count($pizzaEntity) > 0){
			$id = $this->OrderModel->addPizza($pizzaEntity);
			print_r('addPizza '. $id);
		}
		if(count($sideEntity) > 0){
			$id = $this->OrderModel->addSide($sideEntity);
			print_r('addSide '. $id);
		}
		if(count($drinkEntity) > 0){
			$id = $this->OrderModel->addDrink($drinkEntity);
			print_r('addDrink '. $id);
		}
		if(count($smEntity) > 0){
			$id = $this->OrderModel->addSM($smEntity);
			print_r('addSM '. $id);
		}
		return true;
	}

	public function sendEmailReceipt(){
		$subject = "Pizza Now Order";
		$customer = $this->session->userdata('customer');
		$item = array(
			'itemList' => $this->session->userdata('itemList'),
			'totalAmount' => $this->session->userdata('totalAmount'),
			'customer' => $customer,
			'orderStatus' => 'Success'
		);
		$message = $message = $this->load->view('order/placeOrder',$item,true);
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
		$this->email->to($customer->email);
		$this->email->set_newline("\r\n");
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
			$this->session->set_flashdata('message',
				'Check in your email for email verification mail');
			redirect('index.php/register');
		}
	}
}
