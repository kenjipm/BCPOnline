<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

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
	
	// Admin view
	public function voucher_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Voucher_model');
		$vouchers = $this->Voucher_model->get_all();
		$this->load->model('views/admin/voucher_list_view_model');
		$this->voucher_list_view_model->get($vouchers);
		$data['model'] = $this->voucher_list_view_model;
		
		$this->load->view('admin/voucher_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_voucher()
	{
		if ($this->input->method() == "post") $this->post_voucher_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("admin/create_voucher");
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Brand_model');
		$brands = $this->Brand_model->get_all();
		$this->load->model('views/admin/create_voucher_view_model');
		$this->create_voucher_view_model->get($brands);
		$data['model'] = $this->create_voucher_view_model;
		
		$this->load->view('admin/create_voucher', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_voucher_do()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('voucher_worth', 'Harga', 'required|integer');
		$this->form_validation->set_rules('voucher_description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('voucher_worth', 'Harga', 'required|integer');
		$this->form_validation->set_rules('voucher_code', 'Kode Voucher', 'required');
		$this->form_validation->set_rules('min_order_price', 'Minimal pembelanjaan', 'required|integer');
		$this->form_validation->set_rules('use_per_day', 'Pemakaian per Hari', 'required|integer');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Voucher_model');
			$this->Voucher_model->insert_from_post();
			
			redirect('Voucher/voucher_list');
		}
	}
}
