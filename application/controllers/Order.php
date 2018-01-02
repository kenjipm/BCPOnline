<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
	
	// View Detail
	public function transaction_detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('transaction_detail');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Detail Transaksi";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT']) // dummy
		{
			$this->load->view('tenant/transaction_detail', $data);
		}
		else if ($this->session->userdata('type') == TYPE['name']['CUSTOMER'])
		{
			$this->load->view('customer/transaction_detail', $data);
		}
		else // Deliverer
		{
			$this->load->view('deliverer/transaction_detail', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function order_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Daftar Order";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == TYPE['name']['ADMIN']) // dummy
		{
			$this->load->model('Order_details_model');
			$orders = $this->Order_details_model->get_all();
			$deliverers = $this->Order_details_model->get_idle_deliverer();
			$this->load->model('views/admin/order_list_view_model');
			$this->order_list_view_model->get($orders, $deliverers);
			$data['model'] = $this->order_list_view_model;
			
			$this->load->view('admin/order_list', $data);
		}
		else // DELIVERER
		{
			$this->load->model('Order_details_model');
			$orders = $this->Order_details_model->get_collection_task_from_deliverer_id();
			$delivers = $this->Order_details_model->get_deliver_task_from_deliverer_id();
			$this->load->model('views/deliverer/order_list_view_model');
			$this->order_list_view_model->get_collection_task($orders);
			$this->order_list_view_model->get_deliver_task($delivers);
			$data['model'] = $this->order_list_view_model;
			
			$this->load->view('deliverer/order_list', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
}
