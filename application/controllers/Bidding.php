<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidding extends CI_Controller {

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
	public function bidding_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$this->load->model('Bidding_model');
		$items = $this->Item_model->get_all();
		$biddings = $this->Bidding_model->get_all();
		$this->load->model('views/admin/bidding_list_view_model');
		$this->bidding_list_view_model->get($items, $biddings);
		$data['model'] = $this->bidding_list_view_model;
		$this->load->view('admin/bidding_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function bidding_detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
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
}
