<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->type != TYPE['name']['CUSTOMER']) // check account type, kalau bukan customer, redirect ke login page
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
		$this->load->view('', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function profile($id=0)
	{
		// kalau signup account baru
		if ($this->input->method() == "post") $data = $this->profile_edit_do();
		
		// Load Header
        $data_header['css_list'] = array('profile');
        $data_header['js_list'] = array('simpleUpload', 'photo_upload_simple');
		$this->load->view('header', $data_header);
		
		// Load Body
		if ($id == 0) $id = $this->session->userdata('id') ?? redirect('login');
		
		$this->load->model('account_model');
		$account = $this->account_model->get_from_id($this->session->id);
		
		$this->load->model('customer_model');
		$customer = $this->customer_model->get_from_id($this->session->child_id);
		
		$this->load->model('views/customer/profile_main_view_model');
		$this->profile_main_view_model->get($account, $customer);
		
		$this->load->model('redeem_reward_model');
		$redeem_rewards = $this->redeem_reward_model->get_all();
		
		$this->load->model('reward_model');
		$rewards = $this->reward_model->get_all_not_expired();
		$reward_points = $customer->reward_points;
		
		$this->load->model('views/customer/reward_redeem_view_model');
		$this->reward_redeem_view_model->get($redeem_rewards, $reward_points);
		
		$this->load->model('views/customer/reward_main_view_model');
		$this->reward_main_view_model->get($rewards, $reward_points);
		
		$data['title'] = "Profil";
		$data['model'] = $this->profile_main_view_model;
		$data['model_reward'] = $this->reward_main_view_model;
		$data['model_reward_redeem'] = $this->reward_redeem_view_model;
		
		$this->load->view('customer/profile_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}

	// view shopping cart
	public function cart()
	{
		// Load Header
        $data_header['css_list'] = array('cart');
        $data_header['js_list'] = array('customer/cart');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('shipping_address_model');
		$shipping_addresses = $this->shipping_address_model->get_all_by_customer_id($this->session->child_id);
		
		$this->load->model('views/customer/cart_view_model');
		$this->cart_view_model->get($this->session->cart, $shipping_addresses);
		
		$data['title'] = "Keranjang";
		$data['model'] = $this->cart_view_model;
		$this->load->view('customer/cart', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function billing_unconfirmed($billing_id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('customer/billing_unconfirmed');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('shipping_address_model');
		$shipping_addresses = $this->shipping_address_model->get_all_by_customer_id($this->session->child_id);
		
		$this->load->model('billing_model');
		$billing = $this->billing_model->get_from_id($billing_id);
		
		if ($billing == null) { redirect(''); } // ga ada billing nya
		
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_all_from_billing_id($billing->id);
		
		if (count($order_details) <= 0) { redirect(''); } // ga ada order_details nya
		
		$this->load->model('views/customer/billing_unconfirmed_view_model');
		$this->billing_unconfirmed_view_model->get($billing_id, $order_details, $shipping_addresses);
		
		$data['title'] = "Konfirmasi Pembayaran";
		$data['model'] = $this->billing_unconfirmed_view_model;
		$this->load->view('customer/billing_unconfirmed', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function favorite_item()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$id = $this->session->child_id;
		
		$this->load->model('favorite_item_model');
		$favorite_items = $this->favorite_item_model->get_all_from_customer_id($id, 6);
		
		$this->load->model('views/customer/favorite_item_view_model');
		$this->favorite_item_view_model->get($favorite_items);
		
		$data['title'] = "Daftar Barang Favorit";
		$data['model'] = $this->favorite_item_view_model;
		$this->load->view('customer/favorite_item', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function followed_tenant()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$id = $this->session->child_id;
		
		$this->load->model('following_tenant_model');
		$followed_tenants = $this->following_tenant_model->get_all_from_customer_id($id);
		
		$this->load->model('views/customer/followed_tenant_view_model');
		$this->followed_tenant_view_model->get($followed_tenants);
		
		$data['title'] = "Tenant Diikuti";
		$data['model'] = $this->followed_tenant_view_model;
		$this->load->view('customer/followed_tenant', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function order_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$customer_id = $this->session->child_id;
		
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_all_from_customer_id($customer_id);
		
		$this->load->model('views/customer/order_list_view_model');
		$this->order_list_view_model->get($order_details);
		
		$data['title'] = "Order List";
		$data['model'] = $this->order_list_view_model;
		$this->load->view('customer/order_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function shipping_address()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('customer/shipping_address');
		$this->load->view('header', $data_header);
		
		// Load Body
		$id = $this->session->child_id;
		
		$this->load->model('shipping_address_model');
		$shipping_addresses = $this->shipping_address_model->get_all_by_customer_id($this->session->child_id);
		
		$this->load->model('views/customer/shipping_address_view_model');
		$this->shipping_address_view_model->get($shipping_addresses);
		
		$data['title'] = "Daftar Alamat Kirim";
		$data['model'] = $this->shipping_address_view_model;
		$this->load->view('customer/shipping_address', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function shipping_address_delete()
	{
		$shipping_address_id = $this->input->post('shipping_address_id');
		$customer_id = $this->session->child_id;
		
		$this->load->model('shipping_address_model');
		$result = $this->shipping_address_model->delete_from_id($customer_id, $shipping_address_id);
		
		echo $result ? "1" : "0";
	}
	
	public function shipping_address_set_primary()
	{
		$shipping_address_id = $this->input->post('shipping_address_id');
		$customer_id = $this->session->child_id;
		
		$this->load->model('shipping_address_model');
		$result = $this->shipping_address_model->set_primary($customer_id, $shipping_address_id);
		
		echo $result ? "1" : "0";
	}
	
	public function reward()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('customer/reward_main');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('reward_model');
		$rewards = $this->reward_model->get_all_not_expired();
		
		$this->load->model('customer_model');
		$customer = $this->customer_model->get_from_id($this->session->child_id);
		$reward_points = $customer->reward_points;
		
		$this->load->model('views/customer/reward_main_view_model');
		$this->reward_main_view_model->get($rewards, $reward_points);
		
		$data['model'] = $this->reward_main_view_model;
		$data['title'] = "Reward";
		$this->load->view('customer/reward_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function redeem_reward_do()
	{
		$reward_id = $this->input->post('reward_id');
		$customer_id = $this->session->child_id;
		
		$this->load->model('reward_model');
		$reward = $this->reward_model->get_from_id($reward_id);
		
		$this->load->model('customer_model');
		$customer = $this->customer_model->get_from_id($this->session->child_id);
		$reward_points = $customer->reward_points;
		
		if ($reward_points > $reward->points_needed) // kalau reward mencukupi
		{
			if (!$reward->is_expired())
			{
				$this->load->model('redeem_reward_model');
				$redeem_reward = new redeem_reward_model();
				$redeem_reward->insert($reward_id, $customer_id);
				
				$this->customer_model->reward_point_decrement($this->session->child_id, $reward->points_needed);
				
				redirect('customer/redeem_reward');
			}
		}
		
		redirect('customer/reward');
	}
	
	public function redeem_reward()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('redeem_reward_model');
		$redeem_rewards = $this->redeem_reward_model->get_all();
		
		$this->load->model('customer_model');
		$customer = $this->customer_model->get_from_id($this->session->child_id);
		$reward_points = $customer->reward_points;
		
		$this->load->model('views/customer/reward_redeem_view_model');
		$this->reward_redeem_view_model->get($redeem_rewards, $reward_points);
		
		$data['model'] = $this->reward_redeem_view_model;
		$data['title'] = "Reward yang sudah diklaim";
		$this->load->view('customer/reward_redeem', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function profile_edit_do()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nama', 'required');
		// $this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('date_of_birth', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('phone_number', 'No HP', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		// $this->form_validation->set_rules('password', 'Password', 'required');
		// $this->form_validation->set_rules('passconf', 'Pengulangan Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == TRUE)
		{
			// $data['error'] = array();
			// $file_path = array();
			// $this->load->config('upload');
			
			// // upload identification_pic
			// $config_upload_identification_pic = $this->config->item('upload_identification_pic');
			// $config_upload_identification_pic['upload_path'] .= $this->session->account_id."/";
			// $this->load->library('upload', $config_upload_identification_pic);
			// if ($_FILES['identification_pic']['name'])
			// {
				// if (!is_dir($config_upload_identification_pic['upload_path'])) {
					// mkdir($config_upload_identification_pic['upload_path']);
				// }
				
				// if (!$this->upload->do_upload('identification_pic'))
				// {
					// $data['error'] = $this->upload->display_errors();
				// }
				// else $file_path['identification_pic'] = $config_upload_identification_pic['upload_path'].$this->upload->data('file_name');
			// }
			
			// // upload profile pic
			// $config_upload_profpic = $this->config->item('upload_profpic');
			// $config_upload_profpic['upload_path'] .= $this->session->account_id."/";
			// $this->upload->initialize($config_upload_profpic);
			// if ($_FILES['profile_pic']['name'])
			// {
				// if (!is_dir($config_upload_profpic['upload_path'])) {
					// mkdir($config_upload_profpic['upload_path']);
				// }
				// if (!$this->upload->do_upload('profile_pic'))
				// {
					// $data['error'] = $this->upload->display_errors();
				// }
				// else $file_path['profile_pic'] = $config_upload_profpic['upload_path'].$this->upload->data('file_name');
			// }
			
			// if (count($data['error']) == 0)
			// {
				$this->load->model('Account_model');
				$this->Account_model->update_from_post();
				
				redirect('customer/profile');
			// }
		}
		//return $data;
	}
	
	public function cart_add_do($is_ajax=false)
	{
		$posted_item_variance_id = $this->input->post('posted_item_variance_id');
		$this->load->model('posted_item_variance_model');
		$posted_item_variance = $this->posted_item_variance_model->get_from_id($posted_item_variance_id);
		
		if ($posted_item_variance != null) // siapatau pas di add, item tiba2 udah ke delete
		{
			$posted_item_variance->init_posted_item();
			
			$quantity = $this->input->post('quantity');
			$cart = $this->session->cart;
			
			if (!isset($cart[$posted_item_variance_id]))
			{
				$cart[$posted_item_variance_id] = array();
				$cart[$posted_item_variance_id]['name']				= $posted_item_variance->posted_item->posted_item_name;
				$cart[$posted_item_variance_id]['price']			= $posted_item_variance->posted_item->price;
				$cart[$posted_item_variance_id]['voucher_cut_price']	= 0;
				$cart[$posted_item_variance_id]['var_type']			= $posted_item_variance->var_type;
				$cart[$posted_item_variance_id]['var_description']	= $posted_item_variance->var_description;
				$cart[$posted_item_variance_id]['quantity']			= 0;
			}
			
			$cart[$posted_item_variance_id]['quantity'] += $quantity;
			
			// kalau stok ga mencukupi
			if ($cart[$posted_item_variance_id]['quantity'] > $posted_item_variance->quantity_available)
			{
				$cart[$posted_item_variance_id]['quantity'] = $posted_item_variance->quantity_available;
			}
			
			$this->session->cart = $cart;
		}
		
		if (!$is_ajax) $this->default_redirect();
		
		echo "1";
	}
	
	public function cart_sub_do($is_ajax=false)
	{
		$posted_item_variance_id = $this->input->post('posted_item_variance_id');
		$quantity = $this->input->post('quantity');
		$cart = $this->session->cart;
		
		if (!isset($cart[$posted_item_variance_id])) redirect('customer/cart');
		
		$cart[$posted_item_variance_id]['quantity'] -= $quantity;
		if ($cart[$posted_item_variance_id]['quantity'] <= 0)
		{
			unset($cart[$posted_item_variance_id]);
		}
		// else
		// {
			// // kalau stok mencukupi
			// if ($cart[$posted_item_variance_id]['quantity'] <= $posted_item_variance->quantity_available)
			// {
				// $this->session->cart = $cart;
			// }
		// }
		
		$this->session->cart = $cart;
		
		if (!$is_ajax) $this->default_redirect();
		
		echo "1";
	}
	
	public function bid_post_do()
	{
		$bidding_item_id = $this->input->post('bidding_item_id');
		$bidding_next_price = $this->input->post('bidding_next_price');
		
		$this->load->model('item_model');
		$bidding_item = $this->item_model->get_from_id($bidding_item_id);
		
		$this->load->model('customer_model');
		$cur_customer = $this->customer_model->get_from_id($this->session->child_id);
		
		$this->load->model('bidding_model');
		$last_bidding = $this->bidding_model->get_from_customer_id_and_item_id($this->session->child_id, $bidding_item_id);
		if ($last_bidding == null)
		{
			$last_bidding = new class{};
			$last_bidding->bid_time = null;
		}
		
		if (!$cur_customer->deposit_status) echo "-9"; // customer belum dapat melakukan bidding
		else if ($bidding_item == null) echo "-1"; // item tidak ditemukan
		else if ($bidding_item->item_type != "BID") echo "-2"; // item bukan item bidding
		else if ($bidding_item->is_expired()) echo "-3"; // bidding sudah tidak berlaku
		else if (!$bidding_item->is_bid_price_valid($bidding_next_price)) echo "-4"; // harga bidding tidak valid
		else if (!$bidding_item->is_can_bid_this_session($last_bidding->bid_time)) echo "-5"; // customer sudah melakukan bidding
		else 
		{
			$this->load->model('bidding_model');
			$bidding = new bidding_model();
			
			$bidding->bid_time			= date("Y-m-d H:i:s");
			$bidding->bid_price			= $bidding_next_price;
			$bidding->customer_id		= $this->session->child_id;
			$bidding->posted_item_id	= $bidding_item_id;
			
			$bidding_id = $bidding->insert_from_stub();
			echo ($bidding_id > 0) ? "1" : "0"; // 1 = success, 0 = failed to add
		}
	}
	
	public function bid_live_post_do()
	{
		$json_result = new class{};
		$json_result->code = "0";
		$json_result->bid_time_left = "";
		
		$bidding_item_id = $this->input->post('bidding_item_id');
		$bidding_next_price = $this->input->post('bidding_next_price');
		
		$this->load->model('item_model');
		$bidding_item = $this->item_model->get_from_id($bidding_item_id);
		
		$this->load->model('customer_model');
		$cur_customer = $this->customer_model->get_from_id($this->session->child_id);
		
		$this->load->model('bidding_live_model');
		$last_bidding = $this->bidding_live_model->get_from_customer_id_and_item_id($this->session->child_id, $bidding_item_id);
		if ($last_bidding == null)
		{
			$last_bidding = new class{};
			$last_bidding->bid_time = null;
		}
		
		if (!$cur_customer->deposit_status) $json_result->code = "-9"; // customer belum dapat melakukan bidding
		else if ($bidding_item == null) $json_result->code = "-1"; // item tidak ditemukan
		else if ($bidding_item->item_type != "BID") $json_result->code = "-2"; // item bukan item bidding
		else if ($bidding_item->is_expired()) $json_result->code = "-3"; // bidding sudah tidak berlaku
		else if (!$bidding_item->is_bid_live_price_valid($bidding_next_price)) $json_result->code = "-4"; // harga bidding tidak valid
		//else if (!$bidding_item->is_can_bid_this_session($last_bidding->bid_time)) $json_result->code = "-5"; // customer sudah melakukan bidding
		else 
		{
			$bidding = new bidding_live_model();
			
			$bidding->bid_time			= date("Y-m-d H:i:s");
			$bidding->bid_price			= $bidding_next_price;
			$bidding->customer_id		= $this->session->child_id;
			$bidding->posted_item_id	= $bidding_item_id;
				
			$bidding_id = $bidding->insert_from_stub();
			
			$this->item_model->update_price_live($bidding_next_price, $bidding_item_id);
			$json_result->code = ($bidding_id > 0) ? "1" : "0"; // 1 = success, 0 = failed to add
			
			$cur_item = $this->item_model->get_from_id($bidding_item_id);
			$bid_time_left = $cur_item->get_bid_time_left();
			
			$hour_left = floor($bid_time_left / 3600);
			$minute_left = floor(($bid_time_left % 3600) / 60);
			$second_left = $bid_time_left % 3600 % 60;
			
			// $json_result->bid_time_left = str_pad($hour_left, 2) . ":" . str_pad($minute_left, 2) . ":" . str_pad($second_left, 2);
			$json_result->bid_time_left = $hour_left . " jam " . $minute_left . " menit " . $second_left . " detik";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($json_result);
	}
	
	public function dummy_deposit_done()
	{
		$this->load->model('customer_model');
		$this->customer_model->deposit_status_set($this->session->child_id, 1);
		
		echo "1";
	}
	
	public function address_add_do()
	{
		$address = new class{};
		$address->city				= $this->input->post('city');
		$address->kecamatan			= $this->input->post('kecamatan');
		$address->kelurahan			= $this->input->post('kelurahan');
		$address->postal_code		= $this->input->post('postal_code');
		$address->address_detail	= $this->input->post('address_detail');
		$address->latitude			= $this->input->post('lat') . ", " . $this->input->post('lng');
		
		$this->load->model('shipping_address_model');
		$this->shipping_address_model->insert($address);
		
		$this->default_redirect();
	}
	
	public function upload_profpic()
	{
		$data['error'] = array();
		$file_path = array();
		$this->load->config('upload');
		
		$config_upload_profpic = $this->config->item('upload_profpic');
		$config_upload_profpic['upload_path'] .= $this->session->account_id."/";
		$this->load->library('upload', $config_upload_profpic);
		
		$config_compress_image = $this->config->item('compress_image_profpic');
		$this->load->library('image_lib');
		
		if ($_FILES['profile_pic']['name'])
		{
			if (!is_dir($config_upload_profpic['upload_path'])) {
				mkdir($config_upload_profpic['upload_path']);
			}
			if (!$this->upload->do_upload('profile_pic'))
			{
				$data['error'] = $this->upload->display_errors('', '');
			}
			else
			{
				$file_path['profile_pic'] = $config_upload_profpic['upload_path'].$this->upload->data('file_name');
				
				$config_compress_image['source_image'] = $file_path['profile_pic'];
				$this->image_lib->initialize($config_compress_image);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		if (count($data['error']) == 0)
		{
			$this->load->model('Account_model');
			$this->Account_model->update_profile_pic($this->session->id, $file_path['profile_pic']);
			
			$data['image_url'] = site_url($file_path['profile_pic']);
		}
			
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($data);
	}
	
	public function upload_idpic()
	{
		$data['error'] = array();
		$file_path = array();
		$this->load->config('upload');
		
		$config_upload_identification_pic = $this->config->item('upload_identification_pic');
		$config_upload_identification_pic['upload_path'] .= $this->session->account_id."/";
		$this->load->library('upload', $config_upload_identification_pic);
		
		$config_compress_image = $this->config->item('compress_image_idpic');
		$this->load->library('image_lib');
		
		if ($_FILES['identification_pic']['name'])
		{
			if (!is_dir($config_upload_identification_pic['upload_path'])) {
				mkdir($config_upload_identification_pic['upload_path']);
			}
			if (!$this->upload->do_upload('identification_pic'))
			{
				$data['error'] = $this->upload->display_errors('', '');
			}
			else 
			{
				$file_path['identification_pic'] = $config_upload_identification_pic['upload_path'].$this->upload->data('file_name');
				
				$config_compress_image['source_image'] = $file_path['identification_pic'];
				$this->image_lib->initialize($config_compress_image);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		if (count($data['error']) == 0)
		{
			$this->load->model('Account_model');
			$this->Account_model->update_identification_pic($this->session->id, $file_path['identification_pic']);
			
			$data['image_url'] = site_url($file_path['identification_pic']);
		}
			
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($data);
	}
	
	public function toggle_tenant_favorite()
	{
		$tenant_id = $this->input->post('tenant_id');
		$customer_id = $this->session->child_id;
		
		$this->load->model('following_tenant_model');
		$result = $this->following_tenant_model->toggle_tenant_favorite($customer_id, $tenant_id);
		
		echo $result ? "1" : "0";
	}
	
	public function toggle_item_favorite()
	{
		$posted_item_id = $this->input->post('posted_item_id');
		$customer_id = $this->session->child_id;
		
		$this->load->model('favorite_item_model');
		$result = $this->favorite_item_model->toggle_item_favorite($customer_id, $posted_item_id);
		
		echo $result ? "1" : "0";
	}
	
	public function mark_order_finish()
	{
		$order_detail_id = $this->input->post('order_detail_id');
		$customer_id = $this->session->child_id;
		
		$this->load->model('order_details_model');
		$result = $this->order_details_model->update_order_status($order_detail_id, ORDER_STATUS['name']['RECEIVED'], ORDER_STATUS['name']['DONE'], $customer_id);
		
		echo $result ? "1" : "0";
	}
	
	public function create_dispute()
	{
		$tenant_id = $this->input->post('tenant_id');
		$this->load->model('tenant_model');
		$tenant = $this->tenant_model->get_from_id($tenant_id);
		
		$party_one_id = $this->session->id;
		$party_two_id = $tenant->account_id;
		$order_detail_id = $this->input->post('order_detail_id');
		
		$this->load->model('dispute_model');
		$dispute = $this->dispute_model->get_from_parties_id($party_one_id, $party_two_id, $order_detail_id);
		
		if ($dispute == null) // kalau blm pernah dispute sm account ybs, bikin chat room baru
		{
			$dispute = new dispute_model();
			$dispute->insert_from_parties_id($party_one_id, $party_two_id, $order_detail_id);
		}
		redirect('dispute/detail/' . $dispute->id);
	}
	
	public function create_feedback()
	{
		$this->load->model('feedback_model');
		$order_detail_id = $this->input->post('order_detail_id');
		
		$feedback = $this->feedback_model->get_from_order_detail_id($order_detail_id);
		$feedback->rating = $this->input->post('rating');
		$feedback->feedback_text = $this->input->post('feedback_text');
		$feedback->feedback_reply = "";
		$feedback->submitted_by = $this->session->child_id;
		$feedback->feedback_for = $this->input->post('feedback_for');
		$feedback->order_detail_id = $this->input->post('order_detail_id');
		
		if ($feedback->id == null) // kalau blm pernah ngasih feedback dari order detail ybs, bikin feedback baru
		{
			$result = $feedback->insert_from_stub();
		}
		else
		{
			$result = $feedback->update_from_stub();
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function load_googlemaps()
	{
		$this->load->view('googlemaps');
	}
	
	public function default_redirect()
	{
		if ($this->input->post('return_url') != null)
		{
			redirect($this->input->post('return_url'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
