<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

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
	
	// Admin view
	public function voucher_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Voucher_model');
		$this->load->model('Brand_model');
		if ($this->session->userdata('type') == TYPE['name']['ADMIN']) // dummy
		{
			$vouchers = $this->Voucher_model->get_all();
			$i = 0;
			foreach($vouchers as $voucher)
			{
				$brands[$i] = $this->Brand_model->get_from_voucher_id($voucher->id);
				$i++;
			}
			$this->load->model('views/admin/voucher_list_view_model');
			$this->voucher_list_view_model->get($vouchers, $brands);
			$data['model'] = $this->voucher_list_view_model;
			$this->load->view('admin/voucher_list', $data);
		} 
		else if ($this->session->userdata('type') == TYPE['name']['CUSTOMER'])
		{
			$vouchers = $this->Voucher_model->get_all_active();
			$this->load->model('views/customer/voucher_list_view_model');
			$this->voucher_list_view_model->get($vouchers);
			$data['model'] = $this->voucher_list_view_model;
			$this->load->view('customer/voucher_list', $data);
		}
	
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_voucher()
	{
		if ($this->input->method() == "post") $this->post_voucher_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("admin/create_voucher");
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Brand_model');
		$brands = $this->Brand_model->get_all();
		$this->load->model('views/admin/create_voucher_view_model');
		$this->create_voucher_view_model->get($brands);
		$data['model'] = $this->create_voucher_view_model;
		
		$this->load->view('admin/create_voucher', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_voucher_do()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('voucher_worth', 'Harga', 'required|integer');
		$this->form_validation->set_rules('voucher_description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('voucher_worth', 'Harga', 'required|integer');
		$this->form_validation->set_rules('voucher_code', 'Kode Voucher', 'required');
		$this->form_validation->set_rules('min_order_price', 'Minimal pembelanjaan', 'required|integer');
		$this->form_validation->set_rules('use_per_day', 'Pemakaian per Hari', 'required|integer');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Voucher_model');
			$this->Voucher_model->insert_from_post();
			
			redirect('Voucher/voucher_list');
		}
	}
	
	public function cek_kode_voucher()
	{
		$voucher_code = $this->input->post('voucher_code');
		
		if ($voucher_code)
		{
			$this->load->model('voucher_model');
			$vouchered_item_variance_id = $this->voucher_model->get_first_item_id_from_voucher_code($voucher_code);
			
			if ($vouchered_item_variance_id > 0)
			{
				echo "1";
			}
			else if ($vouchered_item_variance_id == -1)
			{
				echo "-1";
			}
			else if ($vouchered_item_variance_id == -2)
			{
				echo "-2";
			}
			else if ($vouchered_item_variance_id == -3)
			{
				echo "-3";
			}
			else if ($vouchered_item_variance_id == -4)
			{
				echo "-4";
			}
			else //if ($vouchered_item_variance_id == 0)
			{
				echo "0";
			}
			// $voucher = $this->voucher_model->get_from_voucher_code($voucher_code);
			
			// if ($voucher)
			// {
				// if ($voucher->is_expired()) { echo "-1"; return false; }
				// if (!$voucher->is_ready_stock()) { echo "-2"; return false; }
				
				// $this->load->model('voucher_brand_model');
				// $voucher_brands = $this->voucher_brand_model->get_all_from_voucher_id($voucher->id);
				
				// $this->load->model('posted_item_variance_model');
				// $cart = $this->session->cart;
				// foreach ($cart as $id => $cart_item)
				// {
					// $posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
					// $posted_item_variance->init_posted_item();
					
					// foreach ($voucher_brands as $voucher_brand)
					// {
						// // echo "brand: ".$posted_item_variance->posted_item->brand_id."    ";
						// if ($voucher_brand->brand_id == $posted_item_variance->posted_item->brand_id)
						// {
							// echo "1"; return true;
						// }
					// }
				// }
			// }
		}
		else
		{
			echo "1";
		}
	}
}
