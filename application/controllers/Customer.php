<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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

	// view shopping cart
	public function cart()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Keranjang Belanja";
		$data['model'] = new class{};
		$this->load->view('customer/cart', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function followed_tenant()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Tenant Diikuti";
		$data['model'] = new class{};
		$this->load->view('customer/followed_tenant', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
