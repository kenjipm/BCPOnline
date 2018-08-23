<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index($id) // load view item untuk customer
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('toggle_tenant_favorite', 'toggle_item_favorite', 'item_main');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$item = $this->item_model->get_from_id($id);
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT'])
		{
			redirect('Item/post_item_detail/'.$id);
		}
		else if (($this->session->userdata('type') == TYPE['name']['ADMIN']) ||
				 ($this->session->userdata('type') == TYPE['name']['DELIVERER']))
		{
			redirect('');
		}
		else //if ($this->session->userdata('type') == TYPE['name']['CUSTOMER'])
		{
			if ($item->item_type == "BID")
			{
				redirect('');
			}
			$other_items = $this->item_model->get_related_items($item);
		
			$this->load->model('posted_item_variance_model');
			$item_variances = $this->posted_item_variance_model->get_all_from_posted_item_id($id);
			
			$this->load->model('feedback_model');
			$feedbacks = $this->feedback_model->get_all_from_posted_item_id($id);
			
			$item_main_view = $this->load->model('views/item_main_view_model');
			$this->item_main_view_model->get($item, $item_variances, $other_items, $feedbacks);
			
			$data['model'] = $this->item_main_view_model;
			$this->load->view('item_main', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Tenant View
	public function post_item()
	{
		// kalau create item baru
		if ($this->input->method() == "post") $this->post_item_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("tenant/post_item_variance", "tenant/post_item");
		$this->load->view('header', $data_header);
		
		// Load Body
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT'])
		{
			// $this->load->model('Category_model');
			$this->load->model('Brand_model');
			$categories = $this->category_model->get_all();
			$brands = $this->Brand_model->get_all();
			$this->load->model('views/tenant/post_item_view_model');
			$this->post_item_view_model->get($categories, $brands);
			$data['model'] = $this->post_item_view_model;
			
			$this->load->view('tenant/post_item', $data);
		}
		else if ($this->session->userdata('type') == TYPE['name']['ADMIN'])
		{
			// $this->load->model('Category_model');
			$this->load->model('Brand_model');
			$this->load->model('Item_model');
			$categories = $this->category_model->get_all();
			$brands = $this->Brand_model->get_all();
			// $items = $this->Item_model->get_all_for_admin();
			
			$unconfirmed_item = $this->Item_model->get_unconfirmed_bidding_item();
			
			$this->load->model('views/admin/create_bidding_view_model');
			$this->create_bidding_view_model->get($categories, $brands, $unconfirmed_item);
			$data['model'] = $this->create_bidding_view_model;
			$this->load->view('admin/create_bidding', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function hot_item($id)
	{		
		// kalau create item baru
		if ($this->input->method() == "post") $this->hot_item_do($id);
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('tenant/create_hot_item');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$this->load->model('Posted_item_variance_model');
		$item = $this->Item_model->get_from_id($id);
		$posted_item_variance = $this->Posted_item_variance_model->get_all($id);
		$this->load->model('views/tenant/hot_item_view_model');
		$this->hot_item_view_model->get($item, $posted_item_variance);
		$data['model'] = $this->hot_item_view_model;
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT'])
		{
			$this->load->view('tenant/create_hot_item', $data);
		}
		else
		{
			redirect('Item/post_item_detail/'.$id);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_item_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		
		if ($this->session->userdata('type') == TYPE['name']['ADMIN'])
		{
			$this->load->model('Item_model');
			$items = $this->Item_model->get_all_for_admin();
			$this->load->model('views/admin/post_item_list_view_model');
			$this->post_item_list_view_model->get($items);
			$data['model'] = $this->post_item_list_view_model;
			
			$this->load->view('admin/post_item_list', $data);
		}
		else // TENANT
		{
			$this->load->model('Item_model');
			$items = $this->Item_model->get_all();
			$this->load->model('views/tenant/post_item_list_view_model');
			$this->post_item_list_view_model->get($items);
			$data['model'] = $this->post_item_list_view_model;
			
			$this->load->view('tenant/post_item_list', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function service($page=1)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		
		if ($this->session->userdata('type') == TYPE['name']['TENANT'])
		{			
			$this->load->model('item_model');
			$items = $this->item_model->get_all_service_tenant();
			
			$this->load->model('views/tenant/service_list_view_model');
			$this->service_list_view_model->get($items);
			
			$data['title'] = "SERVICE KU";
			$data['model'] = $this->service_list_view_model;
			$this->load->view('tenant/service_list', $data);
		}
		else //if ($this->session->userdata('type') == TYPE['name']['CUSTOMER'])
		{
			$id = $this->session->child_id;
			
			$this->load->model('item_model');
			$items = $this->item_model->get_all_service_items();
			$item_count = $this->item_model->count_all_service_items();
			
			$this->load->model('views/item_gallery_view_model');
			$this->item_gallery_view_model->get($items, 'item/service/');
			$this->item_gallery_view_model->calculate_pagination($item_count, $page);
			
			$data['title'] = "SERVICE";
			$data['model'] = $this->item_gallery_view_model;
			$this->load->view('item_gallery', $data);
		}
		
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_item_detail($id)
	{		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('tenant/post_item_detail', 'simpleUpload', 'photo_upload_simple');
		$this->load->view('header', $data_header);
		
		// Load Body
		
		if ($this->session->userdata('type') == TYPE['name']['ADMIN'])
		{
			$this->load->model('Item_model');
			$this->load->model('Posted_item_variance_model');
			$item = $this->Item_model->get_from_id($id);
			$posted_item_variance = $this->Posted_item_variance_model->get_all($id);
			$this->load->model('views/admin/post_item_detail_view_model');
			$this->post_item_detail_view_model->get($item, $posted_item_variance, $id);
			$data['model'] = $this->post_item_detail_view_model;
			
			$this->load->view('admin/post_item_detail', $data);
		}
		else if ($this->session->userdata('type') == TYPE['name']['TENANT']) // TENANT
		{
			if ($this->input->method() == "post") $data = $this->item_edit_do();
			
			$this->load->model('Item_model');
			$item = $this->Item_model->get_from_id($id);
			
			$this->load->model('Posted_item_variance_model');
			$posted_item_variance = $this->Posted_item_variance_model->get_all($id);
			
			$this->load->model('hot_item_model');
			$hot_item = $this->hot_item_model->get_from_posted_item_id($id);
			
			$this->load->model('tenant_bill_model');
			$seo_item = $this->tenant_bill_model->get_registered_seo($id);

			$this->load->model('Brand_model');
			$categories = $this->category_model->get_all();
			$brands = $this->Brand_model->get_all();
			
			$this->load->model('views/tenant/post_item_detail_view_model');
			$this->post_item_detail_view_model->get($item, $posted_item_variance, $hot_item, $seo_item, $categories, $brands);
			
			$data['model'] = $this->post_item_detail_view_model;
			
			$this->load->view('tenant/post_item_detail', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function hot_item_detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Hot_item_model');
		$this->load->model('Item_model');
		$this->load->model('Posted_item_variance_model');
		$this->load->model('Tenant_bill_model');
		$item_id = $this->Hot_item_model->get_posted_item_id($id);
		$item = $this->Item_model->get_from_id($item_id);
		$posted_item_variance = $this->Posted_item_variance_model->get_all($item_id);
		$hot_item = $this->Hot_item_model->get_from_posted_item_id($item->id);
		
		$this->load->model('views/admin/post_item_detail_view_model');
		$this->post_item_detail_view_model->get($item, $posted_item_variance, $id, $hot_item);
		$data['model'] = $this->post_item_detail_view_model;
		
		$this->load->view('admin/post_item_detail', $data);
	}
	
	public function search($page=1)
	{
		// Load Header
        $data_header['css_list'] = array('category');
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$keywords = $this->input->get('keywords');
		// $page = $this->input->get('page') ?? 1;
		
		$this->load->model('item_model');
		$promoted_items = $this->item_model->get_all_promoted_from_search($keywords);
		$items = $this->item_model->get_from_search($keywords, (($page - 1) * PAGINATION['type']['LIMIT_ITEM']));
		$item_count = $this->item_model->count_from_search($keywords);
		
		$categories = $this->category_model->get_all();
		
		$this->load->model('views/search_view_model');
		$this->search_view_model->get_search($categories, $promoted_items, $items, $keywords);
		$this->search_view_model->calculate_pagination($item_count, $page);
		
		$data['title'] = 'Hasil Pencarian';
		$data['model'] = $this->search_view_model;
		$this->load->view('search', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function category($category_id, $page=1)
	{
		// Load Header
        $data_header['css_list'] = array('category', 'item');
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$promoted_items = $this->item_model->get_all_promoted_from_category_id($category_id);
		$items = $this->item_model->get_all_from_category_id($category_id, (($page - 1) * PAGINATION['type']['LIMIT_CATEGORY']));
		$item_count = $this->item_model->count_from_category_id($category_id);
		
		// // $this->load->model('category_model');
		$categories = $this->category_model->get_all();
		$category = $this->category_model->get_from_id($category_id);
		
		$this->load->model('views/search_view_model');
		$this->search_view_model->get($categories, $promoted_items, $items, $category_id);
		$this->search_view_model->calculate_pagination($item_count, $page);
		
		$data['title'] = strtoupper($category->category_name);
		$data['model'] = $this->search_view_model;
		$this->load->view('search', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function brand($category_id, $brand_id, $page=1)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$promoted_items = $this->item_model->get_all_promoted_from_category_id_brand_id($category_id, $brand_id);
		$items = $this->item_model->get_all_from_category_id_brand_id($category_id, $brand_id, (($page - 1) * PAGINATION['type']['LIMIT_CATEGORY']));
		$item_count = $this->item_model->count_from_category_id_brand_id($category_id, $brand_id);
		
		$this->load->model('views/item_gallery_view_model');
		$this->item_gallery_view_model->get($items, 'item/hot_items/');
		$this->item_gallery_view_model->calculate_pagination($item_count, $page);
		
		$category = $this->category_model->get_from_id($category_id);
		$this->load->model('brand_model');
		$brand = $this->brand_model->get_from_id($brand_id);
		
		$data['title'] = strtoupper($category->category_name . " - " . $brand->brand_name);
		$data['model'] = $this->item_gallery_view_model;
		$this->load->view('item_gallery', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function hot_items($page=1)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$items = $this->item_model->get_all_hot_items(($page - 1) * PAGINATION['type']['LIMIT_HOT_ITEM']);
		$item_count = $this->item_model->count_all_hot_items();
		
		$this->load->model('views/item_gallery_view_model');
		$this->item_gallery_view_model->get($items, 'item/hot_items/');
		$this->item_gallery_view_model->calculate_pagination($item_count, $page);
		
		$data['title'] = "HOT ITEMS";
		$data['model'] = $this->item_gallery_view_model;
		$this->load->view('item_gallery', $data);
			
		// Load Footer
		$this->load->view('footer');
	}
	
	public function flash_items($page=1)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$items = $this->item_model->get_all_flash_items(($page - 1) * PAGINATION['type']['LIMIT_FLASH_ITEM']);
		$item_count = $this->item_model->count_all_flash_items();
		
		$this->load->model('views/item_gallery_view_model');
		$this->item_gallery_view_model->get($items, 'item/flash_items/');
		$this->item_gallery_view_model->calculate_pagination($item_count, $page);
		
		$data['title'] = "FLASH ITEMS";
		$data['model'] = $this->item_gallery_view_model;
		$this->load->view('item_gallery', $data);
			
		// Load Footer
		$this->load->view('footer');
	}
	
	public function tenant_items($page=1)
	{
		if ($this->session->type != TYPE['name']['CUSTOMER']) // check account type, kalau bukan customer, redirect ke login page
		{
			$return_url = $this->input->post_get('return_url') ?? "";
			redirect('login?return_url='.$return_url);
		}
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('following_tenant_model');
		$following_tenants = $this->following_tenant_model->get_all_from_customer_id($this->session->child_id, null);
		
		$this->load->model('item_model');
		$items = $this->item_model->get_all_from_following_tenants($following_tenants, ($page - 1) * PAGINATION['type']['LIMIT_TENANT_ITEM']);
		$item_count = $this->item_model->count_all_from_following_tenants($following_tenants);
		if (count($items) <= 0)
		{
			$items = $this->item_model->get_all_except_following_tenants($following_tenants, ($page - 1) * PAGINATION['type']['LIMIT_TENANT_ITEM']);
			$item_count = $this->item_model->count_all_except_following_tenants($following_tenants);
		}
		
		$this->load->model('views/item_gallery_view_model');
		$this->item_gallery_view_model->get($items, 'item/tenant_items/');
		$this->item_gallery_view_model->calculate_pagination($item_count, $page);
		
		$data['title'] = "TENANT ITEMS";
		$data['model'] = $this->item_gallery_view_model;
		$this->load->view('item_gallery', $data);
			
		// Load Footer
		$this->load->view('footer');
	}
	
	public function new_items($page=1)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('following_tenant_model');
		$following_tenants = $this->following_tenant_model->get_all_from_customer_id($this->session->child_id, null);
		
		$this->load->model('item_model');
		$items = $this->item_model->get_all_by_newest(($page - 1) * PAGINATION['type']['LIMIT_NEW_ITEM']);
		$item_count = $this->item_model->count_all_by_newest();
		
		$this->load->model('views/item_gallery_view_model');
		$this->item_gallery_view_model->get($items, 'item/new_items/');
		$this->item_gallery_view_model->calculate_pagination($item_count, $page);
		
		$data['title'] = "NEW ITEMS";
		$data['model'] = $this->item_gallery_view_model;
		$this->load->view('item_gallery', $data);
			
		// Load Footer
		$this->load->view('footer');
	}
	
	public function post_item_do()
	{
		$this->load->library('form_validation');

		if ($this->input->post('item_type') == "ORDER")
		{
			$this->form_validation->set_rules('posted_item_name', 'Nama', 'required');
			$this->form_validation->set_rules('price', 'Harga', 'required|integer');
			$this->form_validation->set_rules('quantity_avalaible', 'Jumlah Stok', 'integer');
			$this->form_validation->set_rules('unit_weight', 'Berat', 'integer');
			$this->form_validation->set_rules('posted_item_description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');
			$this->form_validation->set_rules('brand_id', 'Brand', 'required');
		} 
		else if ($this->input->post('item_type') == "REPAIR")
		{
			$this->form_validation->set_rules('posted_item_name', 'Nama', 'required');
			$this->form_validation->set_rules('posted_item_description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');
			$this->form_validation->set_rules('brand_id', 'Brand', 'required');
		}
		else // BID
		{
			$this->form_validation->set_rules('posted_item_name', 'Nama', 'required');
			$this->form_validation->set_rules('price', 'Harga', 'required|integer');
			$this->form_validation->set_rules('quantity_avalaible', 'Jumlah Stok', 'integer');
			$this->form_validation->set_rules('unit_weight', 'Berat', 'integer');
			$this->form_validation->set_rules('posted_item_description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');
			$this->form_validation->set_rules('brand_id', 'Brand', 'required');
			$this->form_validation->set_rules('posted_item_variance_name', 'Varian', 'required');
			$this->form_validation->set_rules('posted_item_variance_description', 'Deskripsi Varian', 'required');
			$this->form_validation->set_rules('date_expired', 'Tanggal Selesai Bidding', 'required');
			$this->form_validation->set_rules('bidding_max_range', 'Maksimum Kenaikan Harga', 'required');
		}
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Item_model');
			$this->load->model('Posted_item_variance_model');
			$this->load->model('Tag_model');
			$this->Item_model->insert_from_post();
			$this->Posted_item_variance_model->insert_from_post($this->Item_model->id);
			$this->Tag_model->insert_from_post($this->Item_model->id);
			
			if ($this->input->post('item_type') == "BID")
				redirect('bidding_live/bidding_live_list');
			else
				redirect('Item/post_item_list');
		}
	}
	
	public function item_edit_do()
	{
		$this->load->library('form_validation');

		if ($this->input->post('item_type') == "ORDER")
		{
			$this->form_validation->set_rules('item_name', 'Nama', 'required');
			$this->form_validation->set_rules('price', 'Harga', 'required|integer');
			$this->form_validation->set_rules('quantity_avalaible', 'Jumlah Stok', 'integer');
			$this->form_validation->set_rules('unit_weight', 'Berat', 'integer');
			$this->form_validation->set_rules('posted_item_description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');
			$this->form_validation->set_rules('brand_id', 'Brand', 'required');
		} 
		else if ($this->input->post('item_type') == "REPAIR")
		{
			$this->form_validation->set_rules('posted_item_description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');
			$this->form_validation->set_rules('brand_id', 'Brand', 'required');
		}
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Item_model');
			$this->load->model('Posted_item_variance_model');
			$this->load->model('Tag_model');
			$this->Item_model->update_from_post();
			$this->Posted_item_variance_model->update_from_post($this->Item_model->id);
			
			if ($this->input->post('item_type') == "ORDER")
				redirect('item/post_item_list');
			else if ($this->input->post('item_type') == "REPAIR")
				redirect('item/service');
		}
	}
	
	public function hot_item_do($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('promo_description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('date_expired_req', 'Permintaan waktu', 'required');
		$this->form_validation->set_rules('promo_price', 'Harga', 'required|integer');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Hot_item_model');
			$this->Hot_item_model->insert_from_post($id);
			
			redirect('Item/post_item_list');
		}
	}
		
	public function seo_item_do($id)
	{	
		$this->load->library('form_validation');

		$this->load->model('Tenant_bill_model');
		$this->Tenant_bill_model->insert_seo_item($id);
			
		redirect('Item/post_item_list');
	}
	
	public function upload_image($item_id, $index)
	{
		$data['error'] = array();
		$file_path = array();
		$this->load->config('upload');
		
		$config_upload_image = $this->config->item('upload_profpic');
		$config_upload_image['upload_path'] .= $this->session->account_id."/";
		$config_upload_image['file_name'] = $item_id."-".$index.".jpg";
		$this->load->library('upload', $config_upload_image);
		
		$config_compress_image = $this->config->item('compress_image_item');
		$this->load->library('image_lib');
		
		if ($_FILES['image_one_name']['name'])
		{
			if (!is_dir($config_upload_image['upload_path'])) {
				mkdir($config_upload_image['upload_path']);
			}
			if (!$this->upload->do_upload('image_one_name'))
			{
				$data['error'] = $this->upload->display_errors('', '');
			}
			else
			{
				$file_path['image_one_name'] = $config_upload_image['upload_path'].$this->upload->data('file_name');
				
				$config_compress_image['source_image'] = $file_path['image_one_name'];
				$this->image_lib->initialize($config_compress_image);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		if (count($data['error']) == 0)
		{
			$this->load->model('Item_model');
			$this->Item_model->update_image($this->session->id, $file_path['image_one_name']);
			
			$data['image_url'] = site_url($file_path['image_one_name']);
		}
			
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($data);
	}
	
	public function ajax_get_flash_time_left()
	{
		$result = array();
		// $posted_item_id = $this->input->post('bidding_item_id');
			
		$this->load->model('hot_item_model');
		$flash_item = $this->hot_item_model->get_first_flash();
		
		if ($flash_item != null)
		{
			$result["success"] = "1";
			// $result["item"] = $flash_item;
			
			$flash_time_left = $flash_item->get_flash_time_left();
			$result["flash_time_left"] = $flash_time_left;
		}
		else 
		{
			$result["success"] = "0";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
}