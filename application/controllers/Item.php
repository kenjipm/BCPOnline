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
}
