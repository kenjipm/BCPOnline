<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$data['title'] = "Daftar Billing";
		
		if ($this->session->userdata('username') == "tenant") // dummy
		{
			$this->load->view('tenant/billing_list', $data);
		}
		else
		{
			$this->load->view('billing_list', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Billing";
		$data['model'] = new class{};
		
		if ($this->session->userdata('username') == "tenant") // dummy
		{
			$this->load->view('tenant/billing', $data);
		}
		else
		{
			$this->load->view('billing', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
}
