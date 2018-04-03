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
		$this->load->model('Setting_reward_model');
		$rewards = $this->Reward_model->get_all();
		$setting_reward = $this->Setting_reward_model->get_latest_setting_reward();
		$this->load->model('views/admin/reward_list_view_model');
		$this->reward_list_view_model->get($rewards);
		$this->reward_list_view_model->get_setting($setting_reward);
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
        $data_header['js_list'] = array('admin/setting_reward');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('setting_reward_model');
		$latest_setting_reward = $this->setting_reward_model->get_latest_setting_reward(false);
		
		$this->load->model('views/admin/setting_reward_view_model');
		$setting_reward_view_model = new setting_reward_view_model();
		$setting_reward_view_model->get($latest_setting_reward);
		
		$data['model'] = $setting_reward_view_model;
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
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Setting_reward_model');
			$this->Setting_reward_model->insert_from_post();
			
			redirect('Reward/reward_list');
		}
	}
	
	public function setting_reward_approve_do()
	{
		$password = $this->input->post('password');
		$json_result = new class{};
		$json_result->code = "-1";
		
		$this->load->model('account_model');
		if ($this->account_model->is_superadmin($password)) // if true
		{
			$setting_reward_id = $this->input->post('setting_reward_id');
			
			$this->load->model('setting_reward_model');
			$setting_reward = $this->setting_reward_model->get_from_id($setting_reward_id);
			$setting_reward->set_is_confirmed();
			$json_result->code = "1";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($json_result);
	}
	
	public function setting_reward_decline_do()
	{
		$password = $this->input->post('password');
		$json_result = new class{};
		$json_result->code = "-1";
		
		$this->load->model('account_model');
		if ($this->account_model->is_superadmin($password)) // if true
		{
			$setting_reward_id = $this->input->post('setting_reward_id');
			
			$this->load->model('setting_reward_model');
			$this->setting_reward_model->delete_from_id($setting_reward_id);
			
			$json_result->code = "1";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($json_result);
	}
}
