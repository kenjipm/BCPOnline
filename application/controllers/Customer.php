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
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		if ($id == 0) $id = $this->session->userdata('id') ?? redirect('login');
		
		$data['title'] = "Profil";
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
