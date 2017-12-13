<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('item_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Tenant View
	public function post_item()
	{
		// kalau create item baru
		if ($this->input->method() == "post") $this->post_item_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('tenant/post_item', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_item_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$items = $this->Item_model->get_all();
		$this->load->model('views/tenant/post_item_list_view_model');
		$this->post_item_list_view_model->get($items);
		$data['model'] = $this->post_item_list_view_model;
		
		$this->load->view('tenant/post_item_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_item_detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("tenant/post_item_detail");
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('tenant/post_item_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function search()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$keywords = $this->input->get('keywords');
		
		$this->load->model('item_model');
		$items = $this->item_model->get_from_search($keywords);
		$this->load->model('views/search_view_model');
		$this->search_view_model->get($items);
		
		$data['title'] = 'Hasil Pencarian';
		$data['model'] = $this->search_view_model;
		$this->load->view('search', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_item_do()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('posted_item_name', 'Nama', 'required');
		$this->form_validation->set_rules('price', 'Harga', 'required|integer');
		$this->form_validation->set_rules('item_type', 'Tipe', 'required');
		$this->form_validation->set_rules('quantity_avalaible', 'Jumlah Stok', 'integer');
		$this->form_validation->set_rules('unit_weight', 'Berat', 'integer');
		$this->form_validation->set_rules('posted_item_description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('category_id', 'Kategori', 'required');
		$this->form_validation->set_rules('brand_id', 'Brand', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Item_model');
			$this->Item_model->insert_from_post();
			
			redirect('Item/post_item_list');
		}
	}
	
}
