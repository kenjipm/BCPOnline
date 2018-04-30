<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispute extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (($this->session->type != TYPE['name']['CUSTOMER']) // check account type, kalau bukan customer, redirect ke login page
		 && ($this->session->type != TYPE['name']['TENANT'])
		 && ($this->session->type != TYPE['name']['ADMIN']))
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
	}

	public function index()
	{
		redirect('dispute/detail');
		
		// // Load Header
        // $data_header['css_list'] = array();
        // $data_header['js_list'] = array();
		// $this->load->view('header', $data_header);
		
		// // Load Body
		// $account_id = $this->session->id;
		
		// $this->load->model('dispute_model');
		// $disputes = $this->dispute_model->get_all_from_account_id($account_id);
		
		// $this->load->model('views/dispute_main_view_model');
		// $this->dispute_main_view_model->get($disputes);
		
		// $data['title'] = "Dispute - Kotak Masuk";
		// $data['model'] = $this->dispute_main_view_model;
		// $this->load->view('dispute_main', $data);
		
		// // Load Footer
		// $this->load->view('footer');
	}
	
	public function detail($id=0)
	{
		// Load Header
        $data_header['css_list'] = array();
        if ($id == 0) $data_header['js_list'] = array();
        else $data_header['js_list'] = array('dispute_detail');
		$this->load->view('header', $data_header);
		
		// Load Body
		$account_id = $this->session->id;
		
		$this->load->model('dispute_model');
		if ($this->session->type == "ADMIN") $disputes = $this->dispute_model->get_all();
		else $disputes = $this->dispute_model->get_all_from_account_id($account_id);
		
		if ($id == 0) $dispute = new dispute_model();
		else $dispute = $this->dispute_model->get_from_id($id);
		
		$this->load->model('dispute_text_model');
		if ($id == 0) $dispute_texts = array();
		else $dispute_texts = $this->dispute_text_model->get_all_from_dispute_id($id);
		
		$this->load->model('views/dispute_detail_view_model');
		$this->dispute_detail_view_model->get($disputes, $dispute, $dispute_texts);
		
		$data['title'] = "Dispute dengan ";
		$data['model'] = $this->dispute_detail_view_model;
		$this->load->view('dispute_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function get_detail()
	{
		$dispute_id = $this->input->post('dispute_id');
		
		$this->load->model('dispute_model');
		$dispute = $this->dispute_model->get_from_id($dispute_id);
		
		$this->load->model('dispute_text_model');
		$dispute_texts = $this->dispute_text_model->get_all_from_dispute_id($dispute_id);
		
		$this->load->model('views/dispute_detail_view_model');
		$this->dispute_detail_view_model->get_detail($dispute, $dispute_texts);
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($this->dispute_detail_view_model);
	}
	
	public function open_detail_do()
	{
		$party_one_id = $this->session->id;
		$party_two_id = $this->input->post('receiver_account_id');
		
		$this->load->model('dispute_model');
		$dispute = $this->dispute_model->get_from_parties_id($party_one_id, $party_two_id);
		
		if ($dispute == null) // kalau blm pernah dispute sm account ybs, bikin chat room baru
		{
			$dispute = new dispute_model();
			$dispute->insert_from_parties_id($party_one_id, $party_two_id);
		}
		redirect('dispute/detail/' . $dispute->id);
	}
	
	public function send_dispute_do()
	{
		$this->load->model('dispute_text_model');
		$dispute_text_id = $this->dispute_text_model->insert_from_post();
		
		echo $dispute_text_id ? "1" : "0";
	}
}
