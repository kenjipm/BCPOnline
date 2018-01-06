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
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('simpleUpload', 'photo_upload_simple');
		$this->load->view('header', $data_header);
		
		// Load Body
		if ($id == 0) $id = $this->session->userdata('id') ?? redirect('login');
		
		$this->load->model('account_model');
		$account = $this->account_model->get_from_id($this->session->id);
		
		$this->load->model('views/customer/profile_main_view_model');
		$this->profile_main_view_model->get($account);
		
		$data['title'] = "Profil";
		$data['model'] = $this->profile_main_view_model;
		$this->load->view('customer/profile_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}

	// view shopping cart
	public function cart()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('shipping_address_model');
		$shipping_address = $this->shipping_address_model->get_by_customer_id($this->session->child_id);
		
		$this->load->model('views/customer/cart_view_model');
		$this->cart_view_model->get($this->session->cart, $shipping_address);
		
		$data['title'] = "Keranjang Belanja";
		$data['model'] = $this->cart_view_model;
		$this->load->view('customer/cart', $data);
		
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
	
	public function profile_edit_do()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
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
		return $data;
	}
	
	public function cart_add_do()
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
				$cart[$posted_item_variance_id]['var_type']			= $posted_item_variance->var_type;
				$cart[$posted_item_variance_id]['var_description']	= $posted_item_variance->var_description;
				$cart[$posted_item_variance_id]['quantity']			= 0;
			}
			
			$cart[$posted_item_variance_id]['quantity'] += $quantity;
			$this->session->cart = $cart;
		}
		$this->default_redirect();
	}
	
	public function cart_sub_do()
	{
		$posted_item_variance_id = $this->input->post('posted_item_variance_id');
		$quantity = $this->input->post('quantity');
		$cart = $this->session->cart;
		
		if (!isset($cart[$posted_item_variance_id])) redirect('customer/cart');
		
		$cart[$posted_item_variance_id]['quantity'] -= $quantity;
		if ($cart[$posted_item_variance_id]['quantity'] <= 0) unset($cart[$posted_item_variance_id]);
		
		$this->session->cart = $cart;
		
		$this->default_redirect();
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
		
		if ($_FILES['profile_pic']['name'])
		{
			if (!is_dir($config_upload_profpic['upload_path'])) {
				mkdir($config_upload_profpic['upload_path']);
			}
			if (!$this->upload->do_upload('profile_pic'))
			{
				$data['error'] = $this->upload->display_errors('', '');
			}
			else $file_path['profile_pic'] = $config_upload_profpic['upload_path'].$this->upload->data('file_name');
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
		
		if ($_FILES['identification_pic']['name'])
		{
			if (!is_dir($config_upload_identification_pic['upload_path'])) {
				mkdir($config_upload_identification_pic['upload_path']);
			}
			if (!$this->upload->do_upload('identification_pic'))
			{
				$data['error'] = $this->upload->display_errors('', '');
			}
			else $file_path['identification_pic'] = $config_upload_identification_pic['upload_path'].$this->upload->data('file_name');
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
