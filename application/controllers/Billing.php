<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Billing extends CI_Controller {
	
	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$data['title'] = "Daftar Billing";
		
		if ($this->session->userdata('type') == "TENANT") // dummy
		{
			$this->load->model('Order_details_model');
			$items = $this->Order_details_model->get_all_from_tenant_id();
			$this->load->model('views/tenant/billing_list_view_model');
			$this->billing_list_view_model->get($items);
			$data['model'] = $this->billing_list_view_model;
			$this->load->view('tenant/billing_list', $data);
		}
		else
		{
			$this->load->view('customer/billing_list', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Billing";
		$data['model'] = new class{};
		
		if ($this->session->userdata('type') == "TENANT") // dummy
		{
			$this->load->view('tenant/billing', $data);
		}
		else
		{
			// if not paid
			$this->load->view('customer/billing', $data);
			
			// if paid
			// redirect('billing/status');
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// view billing dari shopping cart
	public function cart()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('shipping_address_model');
		$shipping_address = $this->shipping_address_model->get_by_customer_id($this->session->child_id);
		
		$this->load->model('shipping_charge_model');
		$shipping_charge = $this->shipping_charge_model->get_from_shipping_address($shipping_address);
		
		$this->load->model('billing_model');
		$new_billing = $this->billing_model->get_from_create_new($this->session->cart, $shipping_address, $shipping_charge);
		
		$this->load->model('views/customer/billing_view_model');
		$this->billing_view_model->get_from_cart($this->session->cart, $shipping_address, $shipping_charge, $new_billing);
		
		$data['title'] = "Keranjang Belanja";
		$data['model'] = $this->billing_view_model;
		$this->load->view('customer/billing', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	//
	public function status($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('billing_model');
		$billing = $this->billing_model->get_from_id($id);
		$billing->init_shipping_address();
		$billing->init_shipping_charge();
		
		$this->load->model('payment_model');
		$payments = $this->payment_model->get_all_from_billing_id($billing->id);
		
		$this->load->model('order_details_model');
		$orders = $this->order_details_model->get_all_from_billing_id($billing->id);
		// foreach ($orders as $order)
		// {
			// $order->init_posted_item_variance();
			// if ($order->posted_item_variance != null)
			// {
				// $order->posted_item_variance->init_posted_item();
			// }
		// }
		
		$this->load->model('billing_status_view_model');
		$this->billing_status_view_model->get($billing, $payments, $orders);
		
		$data['title'] = "Status Pembayaran";
		$data['model'] = $this->billing_status_view_model;
		$this->load->view('customer/billing_status', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create()
	{
		// create new bill here
		
		// redirect to confirmation page
		$id = 0;
		redirect('billing/status/'.$id);
	}
	
	public function create_from_cart()
	{
		if (($this->session->type == TYPE['name']['CUSTOMER']) &&
			($this->input->post('customer_id') == $this->session->child_id))
		{
			// create new bill here
			$this->load->model('shipping_charge_model');
			$shipping_charge = $this->shipping_charge_model;
			$shipping_charge->fee_amount	= $this->input->post('fee_amount');
			$shipping_charge->insert();
			
			$this->load->model('billing_model');
			$billing = $this->billing_model;
			$billing->payment_method		= $this->input->post('payment_method');
			$billing->date_created			= $this->input->post('date_created');
			$billing->date_closed			= $this->input->post('date_closed');
			$billing->customer_id			= $this->input->post('customer_id');
			$billing->shipping_address_id	= $this->input->post('shipping_address_id');
			$billing->shipping_charge_id	= $shipping_charge->id;
			$billing->calculate_total_payable_from_cart($this->session->cart);
			$billing->insert();
			
			$this->load->model('order_details_model');
			$this->order_details_model->insert_from_cart($this->session->cart, $billing->id);
			
			// redirect to confirmation page
			redirect('billing/status/'.$billing->id);
		}
		redirect('');
	}
	
	public function edit()
	{
		// edit bill here
		
		// redirect to confirmation page
		$id = 0;
		redirect('billing/status/'.$id);
	}
}