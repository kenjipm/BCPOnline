<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Billing extends CI_Controller {
	
	const ALLOWED_ROLE = array(
		TYPE['name']['CUSTOMER'],
		TYPE['name']['TENANT'],
		TYPE['name']['ADMIN'],
	);
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->id == null)
		{
			redirect('');
		}
		
		if (!in_array($this->session->type, $this::ALLOWED_ROLE))
		{
			redirect('login');
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
		$data['title'] = "Daftar Billing";
		
		if ($this->session->type == TYPE['name']['TENANT'])
		{
			redirect('');
		}
		else if ($this->session->userdata('type') == TYPE['name']['ADMIN']) // dummy
		{
			$this->load->model('Billing_model');
			$items = $this->Billing_model->get_all();
			
			$this->load->model('views/admin/billing_list_view_model');
			$this->billing_list_view_model->get($items);
			
			$data['model'] = $this->billing_list_view_model;
			$this->load->view('admin/billing_list', $data);
		}
		else // if ($this->session->userdata('type') == TYPE['name']['CUSTOMER']) // CUSTOMER
		{
			if ($this->input->method() == "post") redirect('order/get_item_customer_do');
			
			$this->load->view('customer/repair_list', $data);
			
			$this->load->model('billing_model');
			$billings = $this->billing_model->get_all_from_customer_id($this->session->child_id);
			
			$data['title'] = "HISTORI TRANSAKSI";
			$this->load->model('views/customer/billing_list_view_model');
			$this->billing_list_view_model->get($billings);
			
			$data['model'] = $this->billing_list_view_model;
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
			$this->load->view('tenant/billing_detail', $data);
		}
		if ($this->session->userdata('type') == "ADMIN") // dummy
		{
			$this->load->model('Order_details_model');
			$this->load->model('Billing_model');
			$orders = $this->Order_details_model->get_all_from_billing_id($id);
			$billings = $this->Billing_model->get_from_id($id);
			$this->load->model('views/admin/billing_detail_view_model');
			$this->billing_detail_view_model->get_order($orders);
			$this->billing_detail_view_model->get_billing($billings);
			$data['model'] = $this->billing_detail_view_model;
			$this->load->view('admin/billing_detail', $data);
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
		$is_cart_valid = true;
		$cart = $this->session->cart;
		$this->load->model('posted_item_variance_model');
		foreach ($cart as $posted_item_variance_id => $cart_item)
		{
			$posted_item_variance = $this->posted_item_variance_model->get_from_id($posted_item_variance_id);
			if ($cart[$posted_item_variance_id]['quantity'] > $posted_item_variance->quantity_available)
			{
				$cart[$posted_item_variance_id]['quantity'] = $posted_item_variance->quantity_available;
				
				$is_cart_valid = false;
			}
		}
		if (!$is_cart_valid)
		{
			$this->session->cart = $cart;
			redirect('customer/cart');
		}
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing', 'ro_shipping_fee');
		$this->load->view('header', $data_header);
		
		// Load Body
		$address_id = $this->input->post('address_id');
		
		$this->load->model('shipping_address_model');
		// $shipping_address = $this->shipping_address_model->get_by_customer_id($this->session->child_id);
		$shipping_address = $this->shipping_address_model->get_from_id($address_id);
		
		$this->load->model('shipping_charge_model');
		$shipping_charge = $this->shipping_charge_model->get_from_shipping_address($shipping_address);
		
		$this->load->model('billing_model');
		$new_billing = $this->billing_model->get_from_create_new($this->session->cart, $shipping_address, $shipping_charge);
		
		$this->load->model('views/customer/billing_view_model');
		$this->billing_view_model->get_from_cart($this->session->cart, $shipping_address, $shipping_charge, $new_billing);
		
		$data['title'] = "BILLING";
		$data['model'] = $this->billing_view_model;
		$this->load->view('customer/billing', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// view billing dari billing_unconfirmed
	public function confirm()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('billing');
		$this->load->view('header', $data_header);
		
		// Load Body
		$billing_id = $this->input->post('billing_id');
		$address_id = $this->input->post('address_id');
		
		$this->load->model('shipping_address_model');
		$shipping_address = $this->shipping_address_model->get_from_id($address_id);
		
		$this->load->model('shipping_charge_model');
		$shipping_charge = $this->shipping_charge_model->get_from_shipping_address($shipping_address);
		
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_all_from_billing_id($billing_id);
		
		$this->load->model('billing_model');
		$unconfirmed_billing = $this->billing_model->get_from_id($billing_id);
		
		$this->load->model('views/customer/billing_view_model');
		$this->billing_view_model->get_from_order_details($order_details, $shipping_address, $shipping_charge, $unconfirmed_billing);
		
		$data['title'] = "Konfirmasi Billing";
		$data['model'] = $this->billing_view_model;
		$this->load->view('customer/billing', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function confirm_do()
	{
		if (($this->session->type == TYPE['name']['CUSTOMER']) &&
			($this->input->post('customer_id') == $this->session->child_id))
		{
			$billing_id = $this->input->post('billing_id');
			
			// update bill here
			$this->load->model('shipping_charge_model');
			$shipping_charge = $this->shipping_charge_model;
			$shipping_charge->fee_amount	= $this->input->post('fee_amount');
			$shipping_charge->insert();
			
			$this->load->model('setting_reward_model');
			$setting_reward = $this->setting_reward_model->get_latest_setting_reward();
			
			$this->load->model('billing_model');
			$billing = $this->billing_model->get_from_id($billing_id);
			$billing->delivery_method		= $this->input->post('delivery_method');
			$billing->shipping_address_id	= $this->input->post('shipping_address_id');
			$billing->shipping_charge_id	= $shipping_charge->id;
			$billing->setting_reward_id		= $setting_reward->id;
			$billing->total_payable			+= $shipping_charge->fee_amount;
			$billing->update();
			
			// insert billing to chosen payment method
			
			// ga jadi lgsg masukin payment, kalo udah milih cara payment, tapi bayarnya pake cara laen mah ga mungkin bisa, soalnya ga ada tagihan di bank lainnya.
			// eh jadi ding??? kalo ga dimasukin, kalo ke close browser nya masa kudu ngulang
			$this->load->model('payment_model');
			$payment = $this->payment_model;
			$payment->payment_method		= $this->input->post('payment_method');
			$payment->paid_amount			= 0;
			$payment->billing_id			= $billing->id;
			$payment->insert();
			
			$this->load->config('payment_method_'.ENVIRONMENT);
			if (in_array($this->input->post('payment_method'), $this->config->item('no_wait_payment_methods'))) // kalau customer milih payment method yg ga perlu nunggu pembayaran (lgsg kirim)
			{
				$this->load->model('order_details_model');
				$order_details = new Order_details_model();
				$order_details = $order_details->set_all_paid_from_billing_id($billing->id);
			}
			else // kalau nunggu pembayaran
			{
				$cur_payment_method = $this->config->item($this->input->post('payment_method'));
				// insert billing using api
			}
			
			// redirect to confirmation page
			redirect('billing/status/'.$billing->id);
		}
		redirect('');
	}
	
	//
	public function status($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('customer/billing_status');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('billing_model');
		$billing = $this->billing_model->get_from_id($id);
		
		if ($billing == null) redirect('');
		
		$billing->init_shipping_address();
		$billing->init_shipping_charge();
		
		$this->load->model('payment_model');
		$payments = $this->payment_model->get_all_from_billing_id($billing->id);
		
		$this->load->model('order_details_model');
		$orders = $this->order_details_model->get_all_from_billing_id($billing->id);
		
		$this->load->model('views/customer/billing_status_view_model');
		$this->billing_status_view_model->get($billing, $payments, $orders);
		
		$billing->mark_as_read_order_status_customer();
		
		$data['title'] = "STATUS TRANSAKSI";
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
			// >>>>> disini harus check item di cart dulu, stok nya cukup ga. kalau ga cukup, lgsg redirect & kasih pesan error	
			
			// cek voucher dulu
			$this->load->model('voucher_model');
			$voucher = new voucher_model();
			$voucher_code = $this->input->post('voucher_code');
			if ($voucher_code)
			{
				$vouchered_item_variance_id = $this->voucher_model->get_first_item_id_from_voucher_code($voucher_code);
				if ($vouchered_item_variance_id)
				{
					$voucher = $this->voucher_model->get_from_voucher_code($voucher_code);
					if ($voucher)
					{
						$cart = $this->session->cart;
						if (isset($cart[$vouchered_item_variance_id]))
						{
							$cart[$vouchered_item_variance_id]['voucher_cut_price'] = $voucher->voucher_worth;
							
							$this->session->cart = $cart;
							
							$voucher->quantity_sub(1);
						}
					}
				}
				else // kalo ga ada item yg bisa di voucher kan oleh kode voucher yg dimasukkan
				{
					redirect('billing/cart');
				}
			}
		
			// create new bill here
			$this->load->model('shipping_charge_model');
			$shipping_charge = $this->shipping_charge_model;
			$shipping_charge->fee_amount	= $this->input->post('fee_amount');
			$shipping_charge->insert();
			
			$this->load->model('setting_reward_model');
			$setting_reward = $this->setting_reward_model->get_latest_setting_reward();
			
			$this->load->model('billing_model');
			$billing = $this->billing_model;
			$billing->delivery_method		= $this->input->post('delivery_method');
			$billing->date_created			= $this->input->post('date_created');
			$billing->date_closed			= $this->input->post('date_closed');
			$billing->customer_id			= $this->input->post('customer_id');
			$billing->shipping_address_id	= $this->input->post('shipping_address_id');
			$billing->delivery_type			= $this->input->post('delivery_type');
			$billing->shipping_charge_id	= $shipping_charge->id;
			$billing->setting_reward_id		= $setting_reward->id;
			$billing->calculate_total_payable_from_cart($this->session->cart);
			$billing->total_payable += $shipping_charge->fee_amount;
			$billing->insert();
			
			$this->load->model('order_details_model');
			$this->order_details_model->insert_from_cart($this->session->cart, $billing->id, $voucher->id);
			
			// insert billing to chosen payment method
			
			// ga jadi lgsg masukin payment, kalo udah milih cara payment, tapi bayarnya pake cara laen mah ga mungkin bisa, soalnya ga ada tagihan di bank lainnya.
			// eh jadi ding??? kalo ga dimasukin, kalo ke close browser nya masa kudu ngulang
			$this->load->model('payment_model');
			$payment = $this->payment_model;
			$payment->payment_method		= $this->input->post('payment_method');
			$payment->paid_amount			= 0;
			$payment->billing_id			= $billing->id;
			$payment->insert();
			
			// kurangi stock dari barang yang dibeli
			$this->load->model('posted_item_variance_model');
			$this->posted_item_variance_model->quantity_sub_from_cart($this->session->cart);
			
			$this->load->config('payment_method_'.ENVIRONMENT);
			if (in_array($this->input->post('payment_method'), $this->config->item('no_wait_payment_methods'))) // kalau customer milih payment method yg ga perlu nunggu pembayaran (lgsg kirim)
			{
				$this->load->model('order_details_model');
				$order_details = new Order_details_model();
				$order_details = $order_details->set_all_paid_from_billing_id($billing->id);
				
				// baru kosongkan cart nya
				$this->session->cart = array();
			
				// redirect to confirmation page
				redirect('billing/status/'.$billing->id);
			}
			else // kalau nunggu pembayaran
			{
				$cur_payment_method = $this->config->item($this->input->post('payment_method'));
				
				// insert billing using api (insert row ke doku table, http post redirect ke doku)
				$this->load->model('doku_model');
				$new_doku = new doku_model();
				$new_doku->transidmerchant	= $payment->payment_id;
				$new_doku->insert();
				
				// SIAPIN DATA BUAT API PAYMENT REQUEST DOKU
				
				// BASKET
				$basket_str = "";
				foreach($this->session->cart as $id => $cart_item)
				{
					$posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
					$posted_item_variance->init_posted_item();
					
					$basket_str .= (($basket_str == "") ? "" : ";") .
						$posted_item_variance->posted_item->posted_item_name . "," .
						number_format($cart_item['price'], 2, '.', "") . "," .
						$cart_item['quantity'] . "," .
						number_format($cart_item['quantity'] * $cart_item['price'], 2, '.', "");
				}
				
				// MALL ID
				$mall_id = $this->config->item('mall_id');
				
				// AMOUNT
				$amount = number_format($billing->total_payable, 2, '.', "");
				
				// WORDS
				$words = sha1($amount . $mall_id . $this->config->item('shared_key') . $payment->payment_id);
				
				// REQUESTDATETIME
				$cur_date = date("YmdHis");
				
				// CURRENCY
				$idr_currency_code = $this->config->item('idr_currency_code');
				
				// SESSIONID
				$this->load->library('id_generator');
				$session_id = $this->id_generator->generate_session(20);
				
				// NAME
				$this->load->model('account_model');
				$cur_account = $this->account_model->get_from_id($this->session->id);
				$name = substr($cur_account->name, 0, 50);
				
				// EMAIL
				$email = substr($cur_account->email, 0, 254);
				
				// PAYMENTCHANNEL
				$payment_channel_code = $cur_payment_method['doku_channel_code'];
				
				$data_doku = array();
				$data_doku['action_url'] = $this->config->item('payment_request_api_url');
				$data_doku['BASKET'] = $basket_str;
				$data_doku['MALLID'] = $mall_id;
				$data_doku['CHAINMERCHANT'] = "NA";
				$data_doku['AMOUNT'] = $amount;
				$data_doku['PURCHASEAMOUNT'] = $amount;
				$data_doku['TRANSIDMERCHANT'] = $payment->payment_id;
				$data_doku['PAYMENTTYPE'] = "SALE";
				$data_doku['WORDS'] = $words;
				$data_doku['REQUESTDATETIME'] = $cur_date;
				$data_doku['CURRENCY'] = $idr_currency_code;
				$data_doku['PURCHASECURRENCY'] = $idr_currency_code;
				$data_doku['SESSIONID'] = $session_id;
				$data_doku['NAME'] = $name;
				$data_doku['EMAIL'] = $email;
				$data_doku['PAYMENTCHANNEL'] = $payment_channel_code;
				$this->load->view('customer/doku_payment_request', $data_doku);
			}
			// baru kosongkan cart nya
			$this->session->cart = array();
		}
		else
		{
			redirect('');
		}
	}
	
	public function payment_dummy_bayar($id)
	{
		$this->db->trans_start();
		
			$this->load->model('payment_model');
			$payment = new Payment_model();
			$payment = $payment->get_from_id($id);
			$payment->init_billing();
			$total_paid = $payment->get_total_paid_from_billing_id($payment->billing->id);
			$payment->paid_amount	= $payment->billing->total_payable - $total_paid; // dummy ceritanya bayar semua aja
			$payable_left = $payment->set_paid($id);
			
			if ($payable_left <= 0)
			{
				$this->load->model('order_details_model');
				$order_details = new Order_details_model();
				$order_details->set_all_paid_from_billing_id($payment->billing->id);
				
				$this->load->model('setting_reward_model');
				$latest_setting_reward = $this->setting_reward_model->get_latest_setting_reward();
				
				$total_paid = $payment->paid_amount;
				$point_get = floor($total_paid / $latest_setting_reward->price_per_point) * $latest_setting_reward->point_get;
				
				$this->recursive_point_increment($point_get, "", $payment->billing->id, $this->session->child_id);
		
				// kirim email ke tenant ybs
				$order_details = $this->order_details_model->get_all_from_billing_id($payment->billing->id);
				$sent_tenant_email = array();
				
				$this->load->library('email');
				foreach($order_details as $order_detail)
				{
					$order_detail->init_posted_item_variance();
					$order_detail->posted_item_variance->init_posted_item();
					$order_detail->posted_item_variance->posted_item->init_tenant();
					$order_detail->posted_item_variance->posted_item->tenant->init_account();
					
					$email = $order_detail->posted_item_variance->posted_item->tenant->account->email;
					$tenant_name = $order_detail->posted_item_variance->posted_item->tenant->tenant_name;
					
					$is_email_sent = false;
					$i = 0;
					while (!$is_email_sent && ($i < count(ADMIN_EMAILS)))
					{
						$this->email->from(ADMIN_EMAILS[$i], 'Admin '.COMPANY_NAME);
						$this->email->to($email);

						$this->email->subject('Pesanan Baru!');
						$this->email->message("Halo, ".$tenant_name."! Ada pesanan baru di ".COMPANY_NAME.", silakan cek di bagian Penjualanku");

						$is_email_sent = $this->email->send();
						
						$i++;
					}
					
					if ($is_email_sent)
					{
						$sent_tenant_email[] = $email;
					}
				}
			}
			
		$this->db->trans_complete();
		
		redirect('billing/status/'.$payment->billing->id);
	}
	
	public function payment_do($natural_id)
	{
		$this->db->trans_start();
		
			$this->load->model('payment_model');
			$payment = new Payment_model();
			$payment = $payment->get_from_natural_id($natural_id);
			$payment->init_billing();
			$total_paid = $payment->get_total_paid_from_billing_id($payment->billing->id);
			$payment->paid_amount	= $payment->billing->total_payable - $total_paid; // dummy ceritanya bayar semua aja
			$payable_left = $payment->set_paid($payment->id);
			
			if ($payable_left <= 0)
			{
				$this->load->model('order_details_model');
				$order_details = new Order_details_model();
				$order_details->set_all_paid_from_billing_id($payment->billing->id);
				
				$this->load->model('setting_reward_model');
				$latest_setting_reward = $this->setting_reward_model->get_latest_setting_reward();
				
				$total_paid = $payment->paid_amount;
				$point_get = floor($total_paid / $latest_setting_reward->price_per_point) * $latest_setting_reward->point_get;
				
				$this->recursive_point_increment($point_get, "", $payment->billing->id, $this->session->child_id);
		
				// kirim email ke tenant ybs
				$order_details = $this->order_details_model->get_all_from_billing_id($payment->billing->id);
				$sent_tenant_email = array();
				
				$this->load->library('email');
				foreach($order_details as $order_detail)
				{
					$order_detail->init_posted_item_variance();
					$order_detail->posted_item_variance->init_posted_item();
					$order_detail->posted_item_variance->posted_item->init_tenant();
					$order_detail->posted_item_variance->posted_item->tenant->init_account();
					
					$email = $order_detail->posted_item_variance->posted_item->tenant->account->email;
					$tenant_name = $order_detail->posted_item_variance->posted_item->tenant->tenant_name;
					
					$is_email_sent = false;
					$i = 0;
					while (!$is_email_sent && ($i < count(ADMIN_EMAILS)))
					{
						$this->email->from(ADMIN_EMAILS[$i], 'Admin '.COMPANY_NAME);
						$this->email->to($email);

						$this->email->subject('Pesanan Baru!');
						$this->email->message("Halo, ".$tenant_name."! Ada pesanan baru di ".COMPANY_NAME.", silakan cek di bagian Penjualanku");

						$is_email_sent = $this->email->send();
						
						$i++;
					}
					
					if ($is_email_sent)
					{
						$sent_tenant_email[] = $email;
					}
				}
			}
			
		$this->db->trans_complete();
		
		redirect('billing/status/'.$payment->billing->id);
	}
	
	public function recursive_point_increment($point_get, $point_description, $billing_id, $customer_id, $repeat_count=0)
	{
		$this->load->model('point_history_model');
		$this->load->model('customer_model');
		$this->load->model('setting_reward_model');
		
		$point_history = new point_history_model();
		
		$point_history->insert($point_get, $point_description, $billing_id, $customer_id);
		$this->customer_model->reward_point_increment($customer_id, $point_get);
		
		$customer = $this->customer_model->get_from_id($customer_id);
		if ($customer->upline_id != NULL)
		{
			$this->load->config('reward_point');
			$ratio_percent_repeat = $this->config->item('RATIO_PERCENT_REPEAT');
			$latest_setting_reward = $this->setting_reward_model->get_latest_setting_reward();
			$multiplier = 1;
			
			if ($repeat_count == 0) // kalau baru dari level pertama (upline lgsg dipotong kan)
			{
				$multiplier = $latest_setting_reward->base_percent / 100;
			}
			
			$repeat_count++;
			if ($repeat_count > $ratio_percent_repeat) // kalo udah naek level upline melebihi jumlah repeat yg ditentukan
			{
				$multiplier = $latest_setting_reward->ratio_percent / 100;
				$repeat_count = 1;
			}
			
			$upline_point_get = ceil($multiplier * $point_get); // pembulatan ke atas
			$this->recursive_point_increment($upline_point_get, $point_description, $billing_id, $customer->upline_id, $repeat_count);
		}
	}
	
	public function edit()
	{
		// edit bill here
		
		// redirect to confirmation page
		$id = 0;
		redirect('billing/status/'.$id);
	}

	public function doku_notify()
	{
		$this->load->model('doku_model');
		$result = $this->doku_model->update_from_notify();
		
		if ($result) { echo "CONTINUE"; }
		else {
			// check status API ?
		}
	}
	
	public function doku_redirect()
	{
		$this->load->model('doku_model');
		$result = $this->doku_model->get_from_redirect();
		
		if ($result->trxstatus == "Success")
		{
			// redirect ke payment success
			redirect('billing/payment_do/'.$result->transidmerchant);
		}
		else // if ($result->trxstatus == "Failed")
		{
			// redirect ke payment gagal
		}
	}
	
}