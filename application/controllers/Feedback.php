<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function get_customer_json()
	{
		$result = new class{};
		$order_detail_id = $this->input->post('order_detail_id');
		
		$this->load->model('feedback_model');
		$result->feedback = $this->feedback_model->get_from_order_detail_id($order_detail_id);
		
		if ($result->feedback->id == null)
		{
			$result->is_exist = false;
		}
		else
		{
			$result->is_exist = true;
		}
		
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
}
