<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

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
		redirect('message/detail');
		// // Load Header
        // $data_header['css_list'] = array();
        // $data_header['js_list'] = array();
		// $this->load->view('header', $data_header);
		
		// // Load Body
		// $account_id = $this->session->id;
		
		// $this->load->model('message_inbox_model');
		// $message_inboxes = $this->message_inbox_model->get_all_from_account_id($account_id);
		
		// $this->load->model('views/message_main_view_model');
		// $this->message_main_view_model->get($message_inboxes);
		
		// $data['title'] = "Kotak Masuk";
		// $data['model'] = $this->message_main_view_model;
		// $this->load->view('message_main', $data);
		
		// // Load Footer
		// $this->load->view('footer');
	}
	
	public function detail($id=0)
	{
		// Load Header
        $data_header['css_list'] = array();
        if ($id == 0) $data_header['js_list'] = array();
        else $data_header['js_list'] = array('message_detail');
		$data_header['no_loading_overlay'] = true;
		$this->load->view('header', $data_header);
		
		// Load Body
		$account_id = $this->session->id;
		
		$this->load->model('message_inbox_model');
		$message_inboxes = $this->message_inbox_model->get_all_from_account_id($account_id);
		
		if ($id == 0) $message_inbox = new message_inbox_model();
		else
		{
			$message_inbox = $this->message_inbox_model->get_from_id($id);
			$this->message_inbox_model->mark_as_read_message_text();
		}
		
		$this->load->model('message_text_model');
		if ($id == 0) { $message_texts = array(); }
		else $message_texts = $this->message_text_model->get_all_from_message_inbox_id($id);
		
		$this->load->model('views/message_detail_view_model');
		$this->message_detail_view_model->get($message_inboxes, $message_inbox, $message_texts);
		
		// $data['title'] = "Percakapan dengan ";
		$data['model'] = $this->message_detail_view_model;
		$this->load->view('message_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function get_detail()
	{
		$message_inbox_id = $this->input->post('message_inbox_id');
		
		$this->load->model('message_inbox_model');
		$message_inbox = $this->message_inbox_model->get_from_id($message_inbox_id);
		
		$this->load->model('message_text_model');
		$message_texts = $this->message_text_model->get_all_from_message_inbox_id($message_inbox_id);
		
		$this->load->model('views/message_detail_view_model');
		$this->message_detail_view_model->get_detail($message_inbox, $message_texts);
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($this->message_detail_view_model);
	}
	
	public function open_detail_do()
	{
		$party_one_id = $this->session->id;
		$party_two_id = $this->input->post('receiver_account_id');
		
		$this->load->model('message_inbox_model');
		$message_inbox = $this->message_inbox_model->get_from_parties_id($party_one_id, $party_two_id);
		
		if ($message_inbox == null) // kalau blm pernah message sm account ybs, bikin chat room baru
		{
			$message_inbox = new message_inbox_model();
			$message_inbox->insert_from_parties_id($party_one_id, $party_two_id);
		}
		redirect('message/detail/' . $message_inbox->id);
	}
	
	public function send_message_do()
	{
		$this->load->model('message_text_model');
		$message_text_id = $this->message_text_model->insert_from_post();
		
		echo $message_text_id ? "1" : "0";
	}
}
