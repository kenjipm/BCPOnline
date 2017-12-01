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
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$userdata = array(
			'username' => $username,
			'cart' => array()
		);
		$this->session->set_userdata($userdata);
		
		if ($username == "member")
		{
			redirect('dashboard');
		}
		else if ($username == "tenant")
		{
			redirect('tenant');
		}
		else if ($username == "admin")
		{
			redirect('admin');
		}
		else if ($username == "delivery")
		{
			redirect('delivery');
		}
		
		$this->session->sess_destroy();
		redirect('login?err=1');
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
