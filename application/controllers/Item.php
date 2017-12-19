<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index($id) // load view item untuk customer
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$item = $this->item_model->get_from_id($id);
		
		$item_main_view = $this->load->model('views/item_main_view_model');
		$this->item_main_view_model->get($item);
		
		$data['model'] = $this->item_main_view_model;
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
        $data_header['js_list'] = array("tenant/post_item_variance");
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
		// Submit Negotiated Price
		if ($this->input->method() == "post") $this->set_nego_price_do($id);
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("tenant/post_item_detail");
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$item = $this->Item_model->get_from_id($id);
		$this->load->model('views/tenant/post_item_detail_view_model');
		$this->post_item_detail_view_model->get($item);
		$data['model'] = $this->post_item_detail_view_model;
		
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
	
	public function category($category_id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$items = $this->item_model->get_all_from_category_id($category_id);
		
		$this->load->model('category_model');
		$category = $this->category_model->get_from_id($category_id);
		
		$this->load->model('views/search_view_model');
		$this->search_view_model->get($items);
		
		$data['title'] = 'Kategori '.$category->category_name;
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
	
	public function set_nego_price_do($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('customer_email_0', 'Email', 'required');
		$this->form_validation->set_rules('discounted_price_0', 'Harga Diskon', 'required|integer');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Negotiated_price_model');
			$this->Negotiated_price_model->insert_from_post($id);
			
			redirect('Item/post_item_detail/' . $id);
		}
	}
	
}
