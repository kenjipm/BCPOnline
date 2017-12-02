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
		$data['model'] = new class{};
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
	
	//Customer View
	public function favorite()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Daftar Barang Favorit";
		$data['model'] = new class{};
		$this->load->view('customer/favorite', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
