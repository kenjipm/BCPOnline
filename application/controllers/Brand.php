<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

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
	
	// Admin View
	public function brand_list()
	{
		if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Brand_model');
		$items = $this->Brand_model->get_all();
		$this->load->model('views/admin/brand_list_view_model');
		$this->brand_list_view_model->get($items);
		$data['model'] = $this->brand_list_view_model;
		$this->load->view('admin/brand_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Admin Post Brand
	public function create_brand()
	{
		if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
		
		// kalau create brand baru
		if ($this->input->method() == "post") $this->post_brand_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/create_brand', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_brand_do()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('brand_name', 'Nama', 'required');
		$this->form_validation->set_rules('brand_description', 'Deskripsi', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Brand_model');
			$this->Brand_model->insert_from_post();
			
			redirect('Brand/brand_list');
		}
	}
}
