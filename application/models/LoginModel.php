<?php


class LoginModel extends CI_Model {

	function canLogin($email, $password){
		$this->db->where('email', $email);
		$query= $this->db->get('user');
		if($query->num_rows()>0){
			foreach ($query->result() as $row){
				if($row->is_email_verified == 'yes'){
					$store_password = $this->encryption->decrypt($row->password);
					var_dump($store_password, $password);
					if($password == $store_password){
						$this->session->set_userdata('id', $row->id);
						return '';
					}else{
						return 'Wrong Password';
					}
				}else{
					return 'First verified your email address';
				}
			}
		}else{
			return 'Please enter valid email address';
		}
	}

}
