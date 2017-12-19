<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('type') != TYPE['name']['CUSTOMER']) // check account type, kalau bukan customer, redirect ke login page
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
        $data_header['js_list'] = array();
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
		$data['title'] = "Daftar Barang Favorit";
		$data['model'] = new class{};
		$this->load->view('customer/favorite', $data);
		
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
		$data['title'] = "Tenant Diikuti";
		$data['model'] = new class{};
		$this->load->view('customer/followed_tenant', $data);
		
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
			$data['error'] = array();
			$file_path = array();
			$this->load->config('upload');
			
			// upload identification_pic
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
					$data['error'] = $this->upload->display_errors();
				}
				else $file_path['identification_pic'] = $config_upload_identification_pic['upload_path'].$this->upload->data('file_name');
			}
			
			// upload profile pic
			$config_upload_profpic = $this->config->item('upload_profpic');
			$config_upload_profpic['upload_path'] .= $this->session->account_id."/";
			$this->upload->initialize($config_upload_profpic);
			if ($_FILES['profile_pic']['name'])
			{
				if (!is_dir($config_upload_profpic['upload_path'])) {
					mkdir($config_upload_profpic['upload_path']);
				}
				if (!$this->upload->do_upload('profile_pic'))
				{
					$data['error'] = $this->upload->display_errors();
				}
				else $file_path['profile_pic'] = $config_upload_profpic['upload_path'].$this->upload->data('file_name');
			}
			
			if (count($data['error']) == 0)
			{
				$this->load->model('Account_model');
				$this->Account_model->update_from_post(TYPE['name']['CUSTOMER'], $file_path);
				
				redirect('customer/profile');
			}
			
		}
		return $data;
	}
	
	public function cart_add_do()
	{
		$item_id = $this->input->post('item_id');
		$this->load->model('posted_item_variance_model');
		$posted_item_variance = $this->posted_item_variance_model->get_from_id($item_id);
		if ($posted_item_variance != null) // siapatau pas di add, item tiba2 udah ke delete
		{
			$posted_item_variance->init_posted_item();
			
			$quantity = $this->input->post('quantity');
			$cart = $this->session->cart;
			
			if (!isset($cart[$item_id]))
			{
				$cart[$item_id] = new class{};
				$cart[$item_id]->name		= $posted_item_variance->posted_item->posted_item_name;
				$cart[$item_id]->price		= $posted_item_variance->posted_item->price;
				$cart[$item_id]->quantity	= 0;
			}
			
			$cart[$item_id]->quantity += $quantity;
			$this->session->cart = $cart;
		}
		$this->default_redirect();
	}
	
	public function cart_sub_do()
	{
		$item_id = $this->input->post('item_id');
		$quantity = $this->input->post('quantity');
		$cart = $this->session->cart;
		
		if (!isset($cart[$item_id])) redirect('customer/cart');
		
		$cart[$item_id]->quantity -= $quantity;
		if ($cart[$item_id] <= 0) unset($cart[$item_id]);
		
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
	
	public function default_redirect()
	{
		if ($this->input->post('return_url') != null)
		{
			redirect($this->input->post('return_url'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function load_googlemaps()
	{
		$this->load->view('googlemaps');
	}
}
