<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
	public function category_list()
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
		// $this->load->model('Category_model');
		$items = $this->category_model->get_all();
		$this->load->model('views/admin/category_list_view_model');
		$this->category_list_view_model->get($items);
		$data['model'] = $this->category_list_view_model;
		
		$this->load->view('admin/category_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_category()
	{
		if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
		
		// kalau create kategori baru
		if ($this->input->method() == "post") $this->post_category_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/create_category', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_category_do()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('category_name', 'Nama', 'required');
		$this->form_validation->set_rules('category_description', 'Deskripsi', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			// $this->load->model('Category_model');
			$this->category_model->insert_from_post();
			
			redirect('Category/category_list');
		}
	}
}
