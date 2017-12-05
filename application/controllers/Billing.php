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
		
		if ($this->session->userdata('type') == "TENANT") // dummy
		{
			$this->load->view('tenant/billing_list', $data);
		}
		else
		{
			$this->load->view('customer/billing_list', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Billing";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == "TENANT") // dummy
		{
			$this->load->view('tenant/billing', $data);
		}
		else
		{
			// if not paid
			$this->load->view('customer/billing', $data);
			
			// if paid
			// redirect('billing/status');
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// view billing dari shopping cart
	public function cart()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Keranjang Belanja";
		$data['model'] = new class{}; // bedanya sama detail, modelnya pake session
		$this->load->view('customer/billing', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	//
	public function status($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Status Pembayaran";
		$data['model'] = new class{};
		$this->load->view('customer/billing_status', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create()
	{
		// create new bill here
		
		// redirect to confirmation page
		$id = 0;
		redirect('billing/status/'.$id);
	}
	
	public function edit()
	{
		// edit bill here
		
		// redirect to confirmation page
		$id = 0;
		redirect('billing/status/'.$id);
	}
}