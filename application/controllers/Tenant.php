<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('tenant/dashboard_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function profile($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['echo'] = "Profile";
		$this->load->view('tenant/profile_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
