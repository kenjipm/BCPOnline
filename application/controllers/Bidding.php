<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidding extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('bidding');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$bidding_item = $this->item_model->get_last_bidding_item();
		
		$this->load->model('bidding_model');
		$last_bidding = $this->bidding_model->get_from_customer_id_and_item_id($this->session->child_id, $bidding_item->id);
		if ($last_bidding == null)
		{
			$last_bidding = new class{};
			$last_bidding->bid_time = null;
		}
		
		$this->load->model('views/bidding_main_view_model');
		$this->bidding_main_view_model->get($bidding_item, $last_bidding);
		
		$data['model'] = $this->bidding_main_view_model;
		$this->load->view('bidding_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Admin View
	public function bidding_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$this->load->model('Bidding_model');
		$items = $this->Item_model->get_all_bidding_items();
		$biddings = $this->Bidding_model->get_all();
		$this->load->model('views/admin/bidding_list_view_model');
		$this->bidding_list_view_model->get($items, $biddings);
		$data['model'] = $this->bidding_list_view_model;
		$this->load->view('admin/bidding_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function bidding_detail($posted_item_id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Bidding_model');
		$this->load->model('Item_model');
		$biddings = $this->Bidding_model->get_all_from_posted_item_id($posted_item_id);
		$item = $this->Item_model->get_from_id($posted_item_id);
		if (strtotime(date('Y-m-d H:m:s')) > strtotime($item->date_expired))
			$is_expired = 1;
		else	
			$is_expired = 0;
		$this->load->model('views/admin/bidding_detail_view_model');
		$this->bidding_detail_view_model->get($biddings, $is_expired);
		$data['model'] = $this->bidding_detail_view_model;
		$this->load->view('admin/bidding_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_bidding()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Category_model');
		$this->load->model('Brand_model');
		$this->load->model('Item_model');
		$categories = $this->Category_model->get_all();
		$brands = $this->Brand_model->get_all();
		$items = $this->Item_model->get_all_for_admin();
		$this->load->model('views/admin/create_bidding_view_model');
		$this->create_bidding_view_model->get($categories, $brands, $items);
		$data['model'] = $this->create_bidding_view_model;
		
		$this->load->view('admin/create_bidding', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function update_price()
	{
		$this->load->model('Item_model');
		$this->Item_model->update_price();
		
		redirect('Bidding/bidding_list');
	}
	
	public function choose_winner()
	{
		$this->load->model('Billing_model');
		
		redirect('Bidding/bidding_list');
	}
}
