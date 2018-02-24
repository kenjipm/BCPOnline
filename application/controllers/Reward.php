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
		$this->load->model('Reward_model');
		$rewards = $this->Reward_model->get_all();
		$this->load->model('views/admin/reward_list_view_model');
		$this->reward_list_view_model->get($rewards);
		$data['model'] = $this->reward_list_view_model;
		$this->load->view('admin/reward_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_reward()
	{
		// kalau create reward baru
		if ($this->input->method() == "post") $this->post_reward_do();
		
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
	
	public function post_reward_do()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('date_expired', 'Tanggal Expired', 'required');
		$this->form_validation->set_rules('points_needed', 'Poin', 'required|integer');
		$this->form_validation->set_rules('reward_description', 'Deskripsi', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Reward_model');
			$this->Reward_model->insert_from_post();
			
			redirect('Reward/reward_list');
		}
	}
	
	public function setting_reward()
	{
		// kalau create reward baru
		if ($this->input->method() == "post") $this->post_setting_reward_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/setting_reward', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_setting_reward_do()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('event_name', 'Nama Event', 'required');
		$this->form_validation->set_rules('base_percent', 'Persentase Awal', 'required|integer');
		$this->form_validation->set_rules('ratio_percent', 'Persentase Ratio', 'required|integer');
		$this->form_validation->set_rules('price_per_point', 'Harga', 'required|integer');
		$this->form_validation->set_rules('point_get', 'Poin', 'required|integer');
		$this->form_validation->set_rules('date_created', 'Tanggal mulai', 'required');
		$this->form_validation->set_rules('date_expired', 'Tanggal Selesai', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Setting_reward_model');
			$this->Setting_reward_model->insert_from_post();
			
			redirect('Reward/reward_list');
		}
	}
}
