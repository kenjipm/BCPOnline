<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	
	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('message_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('message_detail');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('message_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
