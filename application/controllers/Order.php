<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// View Detail
	public function transaction_detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('transaction_detail');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Detail Transaksi";
		$data['model'] = new class{};
		
		if ($this->session->userdata('username') == "tenant") // dummy
		{
			$this->load->view('tenant/transaction_detail', $data);
		}
		else if ($this->session->userdata('username') == "member")
		{
			$this->load->view('customer/transaction_detail', $data);
		} else // Deliverer
		{
			$this->load->view('deliverer/transaction_detail', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function order_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Daftar Order";
		$data['model'] = new class{};

		$this->load->view('deliverer/order_list', $data);

		
		// Load Footer
		$this->load->view('footer');
	}
}
