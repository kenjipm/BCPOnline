<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		// {
			// $return_url = $this->input->post_get('return_url') ?? "";
			// redirect('login?return_url='.$return_url);
		// }
	}

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/dashboard_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function hot_item_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Hot_item_model');
		$this->load->model('Tenant_bill_model');
		$hot_items = $this->Hot_item_model->get_all_registered();
		$tenant_bills = $this->Tenant_bill_model->get_all_unpaid_by_tenants();
		
		$this->load->model('views/admin/hot_item_view_model');
		$this->hot_item_view_model->get($hot_items, $tenant_bills);
		
		$data['model'] = $this->hot_item_view_model;
		$data['title'] = "Tenant yang Belum Bayar";
		$this->load->view('admin/hot_item_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function seo_item_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Tenant_bill_model');
		$tenant_bills = $this->Tenant_bill_model->get_all_seo_unpaid_by_tenants();
		
		$this->load->model('views/admin/seo_item_view_model');
		$this->seo_item_view_model->get($tenant_bills);
		
		$data['model'] = $this->seo_item_view_model;
		$data['title'] = "Tenant yang Belum Bayar";
		$this->load->view('admin/seo_item_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_tenant_bill($id)
	{
		if ($this->input->method() == "post") $this->create_tenant_bill_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Hot_item_model');
		$this->load->model('Item_model');
		$this->load->model('Posted_item_variance_model');
		$item_id = $this->Hot_item_model->get_posted_item_id($id);
		$item = $this->Item_model->get_from_id($item_id);
		$this->load->model('views/admin/create_tenant_bill_view_model');
		$this->create_tenant_bill_view_model->get($item, $id);
		$data['model'] = $this->create_tenant_bill_view_model;
		
		$this->load->view('admin/create_tenant_bill', $data);
	}
	
	public function create_tenant_bill_seo($id)
	{
		if ($this->input->method() == "post") $this->create_tenant_bill_seo_do($id);
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Tenant_bill_model');
		$tenant_bill = $this->Tenant_bill_model->get_from_id($id);
		$this->load->model('views/admin/create_tenant_bill_seo_view_model');
		$this->create_tenant_bill_seo_view_model->get($tenant_bill);
		$data['model'] = $this->create_tenant_bill_seo_view_model;
		
		$this->load->view('admin/create_tenant_bill_seo', $data);
	}
	
	public function create_tenant_bill_do()
	{	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('payment_value', 'Harga', 'required');
		$this->form_validation->set_rules('payment_expiration', 'Masa Berlaku', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Tenant_bill_model');
			$this->Tenant_bill_model->insert_from_post();
			
			redirect('Item/hot_item_list');
		}
	}
	
	public function create_tenant_bill_seo_do($id)
	{	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('payment_value', 'Harga', 'required');
		$this->form_validation->set_rules('payment_expiration', 'Masa Berlaku', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Tenant_bill_model');
			$this->Tenant_bill_model->confirm_seo_item($id);
			
			redirect('Item/post_item_list');
		}
	}
	
	public function tenant_to_pay_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/tenant_to_pay_list');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_all_unpaid_by_tenants();
		
		$this->load->model('views/admin/tenant_to_pay_list_view_model');
		$this->tenant_to_pay_list_view_model->get($order_details);
		
		$data['model'] = $this->tenant_to_pay_list_view_model;
		$data['title'] = "Tenant yang Belum Dibayar";
		$this->load->view('admin/tenant_to_pay_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function tenant_to_pay_print_preview()
	{
		$tenant_id = $this->input->post('tenant_id');
		$tnt_paid_receipt_id = $this->input->post('tnt_paid_receipt_id');
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/print_proof_payment_to_tenant');
		$this->load->view('header_print_preview', $data_header);
		
		// Load Body
		$this->load->model('tenant_model');
		$tenant = $this->tenant_model->get_from_id($tenant_id);
		
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_from_tnt_paid_receipt_id($tnt_paid_receipt_id);
		
		$this->load->model('views/admin/tenant_to_pay_print_preview_view_model');
		$this->tenant_to_pay_print_preview_view_model->get($tenant, $order_details);
		
		$data['model'] = $this->tenant_to_pay_print_preview_view_model;
		$data['title'] = "Detail Pembayaran Tenant";
		$this->load->view('admin/tenant_to_pay_print_preview', $data);
		
		// Load Footer
		$this->load->view('footer_print_preview');
	}
	
	public function create_tenant_pay_receipt()
	{
		$tenant_id = $this->input->post('tenant_id');
		if (!$tenant_id)
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_unpaid_from_tenant_id($tenant_id);
		$paid_amount = 0;
		$list_order_detail_id = array();
		foreach ($order_details as $order_detail)
		{
			$payment_period_start	= NULL;
			$payment_period_end		= NULL;
			$payment_purpose		= "";
			
			$order_detail->init_voucher();
			$paid_amount += ($order_detail->quantity * $order_detail->sold_price) + $order_detail->voucher->voucher_worth;
			
			$list_order_detail_id[] = $order_detail->id;
		}
		
		$this->load->model('tenant_pay_receipt_model');
		$tenant_pay_receipt = new tenant_pay_receipt_model();
		
		$tenant_pay_receipt->payment_period_start	= $payment_period_start;
		$tenant_pay_receipt->payment_period_end		= $payment_period_end;
		$tenant_pay_receipt->payment_purpose		= $payment_purpose;
		$tenant_pay_receipt->paid_amount			= $paid_amount;
		$tenant_pay_receipt->admin_id				= $this->session->child_id;
		
		$tenant_pay_receipt_id = $tenant_pay_receipt->insert_from_stub();
		
		$this->load->model('order_details_model');
		$this->order_details_model->update_tenant_pay_receipt_id($list_order_detail_id, $tenant_pay_receipt_id);
		
		echo $tenant_pay_receipt_id;
	}
	
	public function unblock_account($id)
	{
		if ($this->input->method() == "post")
		{
			$this->load->model('Account_model');
			$this->Account_model->unblock_account($id);
		}
		redirect('account/account_detail/' . $id);
	}
	
	public function block_account($id)
	{
		if ($this->input->method() == "post")
		{
			$this->load->model('Account_model');
			$this->Account_model->block_account($id);
		}
		redirect('account/account_detail/' . $id);
	}
	
	public function unverify_account($id)
	{
		if ($this->input->method() == "post")
		{
			$this->load->model('Customer_model');
			$this->Customer_model->unverify_account($id);
		}
		redirect('account/account_detail/' . $id);
	}
	
	public function verify_account($id)
	{
		if ($this->input->method() == "post")
		{
			$this->load->model('Customer_model');
			$this->Customer_model->verify_account($id);
		}
		redirect('account/account_detail/' . $id);
	}
	
	public function get_header_print()
	{
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header_print', $data_header);
	}
	
	public function get_footer_print()
	{
		$this->load->view('footer_print');
	}
}
