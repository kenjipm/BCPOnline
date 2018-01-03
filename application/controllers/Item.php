<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index($id) // load view item untuk customer
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('item_main');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$item = $this->item_model->get_from_id($id);
		
		$this->load->model('posted_item_variance_model');
		$item_variances = $this->posted_item_variance_model->get_all_from_posted_item_id($id);
		
		$item_main_view = $this->load->model('views/item_main_view_model');
		$this->item_main_view_model->get($item, $item_variances);
		
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
		$this->load->model('Category_model');
		$this->load->model('Brand_model');
		$categories = $this->Category_model->get_all();
		$brands = $this->Brand_model->get_all();
		$this->load->model('views/tenant/post_item_view_model');
		$this->post_item_view_model->get($categories, $brands);
		$data['model'] = $this->post_item_view_model;
		
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
		$this->load->model('Posted_item_variance_model');
		$this->load->model('Negotiated_price_model');
		$item = $this->Item_model->get_from_id($id);
		$posted_item_variance = $this->Posted_item_variance_model->get_all($id);
		$negotiated_price = $this->Negotiated_price_model->get_by_item_id($id);
		$this->load->model('views/tenant/post_item_detail_view_model');
		$this->post_item_detail_view_model->get($item, $posted_item_variance, $negotiated_price);
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
			$this->load->model('Posted_item_variance_model');
			$this->load->model('Tag_model');
			$this->Item_model->insert_from_post();
			$this->Posted_item_variance_model->insert_from_post($this->Item_model->id);
			$this->Tag_model->insert_from_post($this->Item_model->id);
			
			redirect('Item/post_item_list');
		}
	}
	
	public function set_nego_price_do($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('customer_email[]', 'Email', 'required');
		$this->form_validation->set_rules('discounted_price[]', 'Harga Diskon', 'required|integer');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Negotiated_price_model');
			$this->Negotiated_price_model->insert_from_post($id);
			
			redirect('Item/post_item_detail/' . $id);
		}
	}
	
	public function upload_image($item_id, $index)
	{
		$data['error'] = array();
		$file_path = array();
		$this->load->config('upload');
		
		$config_upload_image = $this->config->item('upload_profpic');
		$config_upload_image['upload_path'] .= $this->session->account_id."/";
		$config_upload_image['file_name'] = $item_id."-".$index.".jpg";
		$this->load->library('upload', $config_upload_image);
		
		if ($_FILES['profile_pic']['name'])
		{
			if (!is_dir($config_upload_image['upload_path'])) {
				mkdir($config_upload_image['upload_path']);
			}
			if (!$this->upload->do_upload('profile_pic'))
			{
				$data['error'] = $this->upload->display_errors('', '');
			}
			else $file_path['profile_pic'] = $config_upload_image['upload_path'].$this->upload->data('file_name');
		}
		
		if (count($data['error']) == 0)
		{
			$this->load->model('Account_model');
			$this->Account_model->update_profile_pic($this->session->id, $file_path['profile_pic']);
			
			$data['image_url'] = site_url($file_path['profile_pic']);
		}
			
		header("Cache-Control: no-store, no-cache, no-referrer-when-downgrade, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($data);
	}
	
}
