<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant_Pay_Receipt extends CI_Controller {

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
	
	public function tenant_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$data['title'] = "Daftar Tenant yang Perlu Dibayar";
		
		$this->load->model('Tenant_Pay_Receipt');
		$items = $this->Tenant_Pay_Receipt->get_all();
		
		$this->load->model('views/admin/tenant_pay_receipt_list_view_model');
		$this->tenant_pay_receipt_list_view_model->get($items);
		
		$data['model'] = $this->tenant_pay_receipt_list_view_model;
		$this->load->view('admin/tenant_pay_receipt_list', $data);
	}
}
