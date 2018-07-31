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
	
	public function confirm_redeem_reward()
	{
		if ($this->session->type == TYPE['name']['ADMIN'])
		{
			$redeem_reward_id 	= $this->input->post('redeem_reward_id');
			
			$this->load->model('Redeem_reward_model');
			$redeem_reward = $this->Redeem_reward_model->get_from_id($redeem_reward_id);
			
			// validasi, kalau redeem ga ada (error)
			if ($redeem_reward == null) { echo "-1"; return -1; }
			
			$this->Redeem_reward_model->confirm_redeem_reward($redeem_reward_id);
			
			echo "1"; return "1";
		}
	}
	
	// Admin view	
	public function reward_list()
	{
		if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/reward_list');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Reward_model');
		$this->load->model('Redeem_reward_model');
		$this->load->model('Setting_reward_model');
		$rewards = $this->Reward_model->get_all();
		$i = 0;
		foreach($rewards as $reward)
		{
			$redeems[$i] = $this->Redeem_reward_model->get_redeem_from_reward_id($reward->id);
			$i++;
		}
		$setting_reward = $this->Setting_reward_model->get_latest_setting_reward();
		$this->load->model('views/admin/reward_list_view_model');
		$this->reward_list_view_model->get($rewards, $redeems);
		$this->reward_list_view_model->get_setting($setting_reward);
		$data['model'] = $this->reward_list_view_model;
		$this->load->view('admin/reward_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_reward()
	{
		if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
		
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
		if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
		
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
