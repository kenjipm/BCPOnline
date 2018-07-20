<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->type != TYPE['name']['ADMIN']) // check account type, kalau bukan admin, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
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
	
	public function flash_sale_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$flash_sales = $this->Item_model->get_all_flash_sale();
		
		$this->load->model('views/admin/flash_sale_view_model');
		$this->flash_sale_view_model->get($flash_sales);
		
		$data['model'] = $this->flash_sale_view_model;
		$data['title'] = "Daftar Barang Flash Sale";
		$this->load->view('admin/flash_sale_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_flash_sale()
	{
		if ($this->input->method() == "post") $this->create_flash_sale_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("admin/flash_sale");
		$this->load->view('header', $data_header);
		
		// Load Body
		if ($this->session->userdata('type') == TYPE['name']['ADMIN'])
		{
			$this->load->model('Brand_model');
			$this->load->model('Category_model');
			$categories = $this->Category_model->get_all();
			$brands = $this->Brand_model->get_all();
			$this->load->model('views/admin/create_flash_sale_view_model');
			$this->create_flash_sale_view_model->get($categories, $brands);
			$data['model'] = $this->create_flash_sale_view_model;
			
			$this->load->view('admin/create_flash_sale', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_flash_sale_do()
	{
		$this->load->library('form_validation');

		if ($this->input->post('item_type') == "FLASH")
		{
			$this->form_validation->set_rules('posted_item_name', 'Nama', 'required');
			$this->form_validation->set_rules('price', 'Harga awal', 'required|integer');
			$this->form_validation->set_rules('promo_price', 'Harga promo', 'required|integer');
			$this->form_validation->set_rules('quantity_available', 'Jumlah Stok', 'required|integer');
			$this->form_validation->set_rules('unit_weight', 'Berat', 'integer');
			$this->form_validation->set_rules('posted_item_description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('var_desc', 'Deskripsi Varian', 'required');
			$this->form_validation->set_rules('date_expired', 'Tanggal Berlaku', 'required');
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');
			$this->form_validation->set_rules('brand_id', 'Brand', 'required');
		} 
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Item_model');
			$this->load->model('Posted_item_variance_model');
			$this->load->model('Tag_model');
			$this->load->model('Hot_item_model');
			$this->load->model('Tenant_bill_model');
			$this->Item_model->insert_from_post();
			$this->Posted_item_variance_model->insert_from_post($this->Item_model->id);
			$this->Tag_model->insert_from_post($this->Item_model->id);
			$this->Hot_item_model->insert_flash_item($this->Item_model->id);
			print_r($this->Hot_item_model->id);
			$this->Tenant_bill_model->insert_flash_item($this->Item_model->id, $this->Hot_item_model->id);
			
			redirect('admin/flash_sale_list');
		}
	}
	
	public function flash_sale_detail($id)
	{		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/flash_sale_detail', 'simpleUpload', 'photo_upload_simple');
		$this->load->view('header', $data_header);
		
		// Load Body
		
		if ($this->session->userdata('type') == TYPE['name']['ADMIN'])
		{
			$this->load->model('Item_model');
			$this->load->model('Posted_item_variance_model');
			$item = $this->Item_model->get_from_id($id);
			$posted_item_variance = $this->Posted_item_variance_model->get_all($id);
			$this->load->model('views/admin/flash_sale_detail_view_model');
			$this->flash_sale_detail_view_model->get($item, $posted_item_variance, $id);
			$data['model'] = $this->flash_sale_detail_view_model;
			
			$this->load->view('admin/flash_sale_detail', $data);
		}
		/* else if ($this->session->userdata('type') == TYPE['name']['TENANT']) // TENANT
		{
			if ($this->input->method() == "post") $data = $this->item_edit_do();
			
			$this->load->model('Item_model');
			$item = $this->Item_model->get_from_id($id);
			
			$this->load->model('Posted_item_variance_model');
			$posted_item_variance = $this->Posted_item_variance_model->get_all($id);
			
			$this->load->model('hot_item_model');
			$hot_item = $this->hot_item_model->get_from_posted_item_id($item->id);
			
			$this->load->model('tenant_bill_model');
			$seo_item = $this->tenant_bill_model->get_registered_seo($id);
			
			$this->load->model('Brand_model');
			$categories = $this->category_model->get_all();
			$brands = $this->Brand_model->get_all();
			
			$this->load->model('views/tenant/post_item_detail_view_model');
			$this->post_item_detail_view_model->get($item, $posted_item_variance, $hot_item, $seo_item, $categories, $brands);
			
			$data['model'] = $this->post_item_detail_view_model;
			
			$this->load->view('tenant/post_item_detail', $data);
		}*/
		
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
			
			redirect('admin/hot_item_list');
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
			
			redirect('admin/seo_item_list');
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
	
	public function report()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/report_main');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('tenant_model');
		$tenants = $this->tenant_model->get_all(true);
		
		$categories = $this->category_model->get_all();
		
		$this->load->model('brand_model');
		$brands = $this->brand_model->get_all();
		
		$this->load->model('views/admin/report_main_view_model');
		$this->report_main_view_model->get($tenants, $categories, $brands);
		
		$data['model'] = $this->report_main_view_model;
		$this->load->view('admin/report_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function get_report()
	{
		$json_result = new class{};
		$json_result->code = "1";
		$json_result->view = "";
		
		$report_type = $this->input->post('report_type');
		$tenant_id = $this->input->post('tenant_id');
		$category_id = $this->input->post('category_id');
		$brand_id = $this->input->post('brand_id');
		$keywords = $this->input->post('keywords');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		
		$view_data = array();
		$this->load->model('report_model');
		if ($report_type == "BY_TRANSACTION")
		{
			$transactions = $this->report_model->get_all_transaction_from_date($start_date, $end_date);
			
			$this->load->model('views/admin/report_by_transaction_view_model');
			$this->report_by_transaction_view_model->get($transactions);
			
			$view_data['model'] = $this->report_by_transaction_view_model;
			$json_result->view = $this->load->view('admin/report_by_transaction', $view_data, true);
		}
		else if ($report_type == "BY_TENANT")
		{
			$transactions = $this->report_model->get_all_transaction_from_tenant_and_date($tenant_id, $start_date, $end_date);
			
			$this->load->model('views/admin/report_by_tenant_view_model');
			$this->report_by_tenant_view_model->get($transactions);
			
			$view_data['model'] = $this->report_by_tenant_view_model;
			$json_result->view = $this->load->view('admin/report_by_tenant', $view_data, true);
		}
		else if ($report_type == "PRODUCT_BY_TENANT")
		{
			$transactions = $this->report_model->get_all_product_by_tenant_from_date($tenant_id, $start_date, $end_date);
			
			$this->load->model('views/admin/report_product_by_tenant_view_model');
			$this->report_product_by_tenant_view_model->get($transactions);
			
			$view_data['model'] = $this->report_product_by_tenant_view_model;
			$json_result->view = $this->load->view('admin/report_product_by_tenant', $view_data, true);
		}
		else if ($report_type == "BY_PRODUCT")
		{
			$transactions = $this->report_model->get_all_from_category_brand_and_date($category_id, $brand_id, $keywords, $start_date, $end_date);
			
			$this->load->model('views/admin/report_by_product_view_model');
			$this->report_by_product_view_model->get($transactions);
			
			$view_data['model'] = $this->report_by_product_view_model;
			$json_result->view = $this->load->view('admin/report_by_product', $view_data, true);
		}
		// else if ($report_type == "BY_ITEM")
		// {
			
		// }
		else if ($report_type == "HOT_ITEM")
		{
			$transactions = $this->report_model->get_all_hot_item_from_tenant_and_date($tenant_id, $start_date, $end_date);
			
			$this->load->model('views/admin/report_by_hot_item_view_model');
			$this->report_by_hot_item_view_model->get($transactions);
			
			$view_data['model'] = $this->report_by_hot_item_view_model;
			$json_result->view = $this->load->view('admin/report_by_hot_item', $view_data, true);
			
		}
		else
		{
			$json_result->code = "0";
			$json_result->view = "";
			// error
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($json_result);
	}
	
	public function report_print_preview()
	{
		$report_type 	= $this->input->post('cur_report_type');
		$tenant_id 		= $this->input->post('cur_tenant_id');
		$category_id 	= $this->input->post('cur_category_id');
		$brand_id 		= $this->input->post('cur_brand_id');
		$keywords 		= $this->input->post('cur_keywords');
		$start_date 	= $this->input->post('cur_start_date');
		$end_date 		= $this->input->post('cur_end_date');
		$report_html 	= $this->input->post('report_html');
		
		$tenant = "";
		$category = "";
		$brand = "";
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header_print_preview', $data_header);
		
		// Load Body
		if ((REPORT_TYPES[$report_type]['tenant_opt']) && ($tenant_id != "-1")) {
			$this->load->model('tenant_model');
			$tenant = $this->tenant_model->get_from_id($tenant_id);
		}
		
		if ((REPORT_TYPES[$report_type]['category_opt']) && ($category_id != "-1")) {
			$category = $this->category_model->get_from_id($category_id);
		}
		
		if ((REPORT_TYPES[$report_type]['brand_opt']) && ($brand_id != "-1")) {
			$this->load->model('brand_model');
			$brand = $this->brand_model->get_from_id($brand_id);
		}
		
		$this->load->model('views/admin/report_print_preview_view_model');
		$this->report_print_preview_view_model->get($report_type, $tenant, $category, $brand, $keywords, $start_date, $end_date, $report_html);
		
		$data['model'] = $this->report_print_preview_view_model;
		$data['title'] = REPORT_TYPES[$report_type]['description'];
		$this->load->view('admin/report_print_preview', $data);
		
		// Load Footer
		$this->load->view('footer_print_preview');
	}
	
	public function validate_superadmin()
	{
		$password = $this->input->post('password');
		$json_result = new class{};
		$json_result->code = "-1";
		
		$this->load->model('account_model');
		if ($this->account_model->is_superadmin($password)) // if true
		{
			$json_result->code = "1";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($json_result);
	}
}
