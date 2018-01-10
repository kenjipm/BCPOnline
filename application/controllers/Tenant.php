<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		
	}

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("tenant/dashboard");
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$this->load->model('Tenant_model');
		$this->load->model('Order_details_model');
		$tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		$items = $this->Item_model->get_all();
		$sold_items = $this->Order_details_model->get_all_sold_item();
		$orders = $this->Order_details_model->get_all_from_tenant_id();
		$this->load->model('views/tenant/dashboard_view_model');
		$this->dashboard_view_model->get_posted_item($items);
		$this->dashboard_view_model->get_tenant($tenant);
		$this->dashboard_view_model->get_transaction($orders);
		$this->dashboard_view_model->get_sold_item($sold_items);
		$data['model'] = $this->dashboard_view_model;
		$this->load->view('tenant/dashboard_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function profile($id)
	{
		if ($this->session->type != TYPE['name']['TENANT']) // check account type, kalau bukan tenant, liat public profile
		{
			redirect('tenant/public_profile/'.$id);
		}
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['echo'] = "Profile";
		$this->load->view('tenant/profile_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function public_profile($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('toggle_tenant_favorite');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('tenant_model');
		$cur_tenant = $this->tenant_model->get_from_id($id);
		
		$this->load->model('item_model');
		$items = $this->item_model->get_all_from_tenant_id($id, 6);
		
		$this->load->model('views/tenant_public_profile_main_view_model');
		$this->tenant_public_profile_main_view_model->get($cur_tenant, $items);
		
		$data['title'] = "Tenant";
		$data['model'] = $this->tenant_public_profile_main_view_model;
		$this->load->view('tenant_public_profile_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
