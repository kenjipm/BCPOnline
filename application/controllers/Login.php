<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['message'] = "";
		if ($this->input->get('err') !== null)
		{
			$data['message'] = $this->get_error_message($this->input->get('err'));
		}
		$data['model'] = new class{};
		$this->load->view('login_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function validate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$this->load->model('Account_model');
		$user = $this->Account_model->get_from_login($email, $password);
		$account_id = "";
		$type = $email; //""; dummy buat bypass kalo mau login type lain
		
		if ($user !== null)
		{
			$account_id = $user->account_id;
			$type = $user->type;
		}
		
		// if ($user !== null)
		{
			$userdata = array(
				'id' => 1,
				'account_id' => $account_id,
				'type' => $type,
				'cart' => array()
			);
			
			$this->session->set_userdata($userdata);
			
			if ($type == "CUSTOMER")
			{
				redirect('dashboard');
			}
			else if ($type == "TENANT")
			{
				redirect('tenant');
			}
			else if ($type == "ADMIN")
			{
				redirect('admin');
			}
			else if ($type == "DELIVERY")
			{
				redirect('delivery');
			}
		}
		
		$this->session->sess_destroy();
		redirect('login?err=1');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
	
	private function get_error_message($error_code)
	{
		if ($error_code == 1)
		{
			return "Username / Password salah";
		}
		else
		{
			return "Unknown Error";
		}
	}
}
