<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('customer/reward_main');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$data['title'] = "Reward";
		$this->load->view('customer/reward_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}

	// redeem page view
	public function redeem()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$data['title'] = "Redeem Reward";
		$this->load->view('customer/reward_redeem', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Admin view
	public function reward_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/reward_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_reward()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/create_reward', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
