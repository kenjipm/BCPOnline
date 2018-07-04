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
        $data_header['js_list'] = array('tenant/dashboard', 'simpleUpload', 'photo_upload_simple');
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
	
	public function account()
	{
		if ($this->session->type != TYPE['name']['TENANT']) // check account type, kalau bukan tenant, liat public profile
		{
			redirect('tenant/public_profile/'.$id);
		}
		
		if ($this->input->method() == "post") $this->account_edit_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('account_model');
		$account = $this->account_model->get_from_id($this->session->id);
		
		$this->load->model('tenant_model');
		$tenant = $this->tenant_model->get_from_id($this->session->child_id);
		
		$this->load->model('views/tenant/account_view_model');
		$this->account_view_model->get($account, $tenant);
		
		$data['message'] = "";
		if ($this->input->get('err') !== null)
		{
			$data['message'] = $this->get_error_message($this->input->get('err'));
		}
		$data['model'] = $this->account_view_model;
		
		$this->load->view('tenant/account', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	private function get_error_message($error_code)
	{
		if ($error_code == 1)
		{
			return "Password lama salah";
		}
		else if ($error_code == 0)
		{
			return "Profil berhasil diubah";
		}
		else
		{
			return "Terjadi kesalahan";
		}
	}
	
	public function account_edit_do()
	{
		$this->load->model('Account_model');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('date_of_birth', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('phone_number', 'No HP', 'required');
		$this->form_validation->set_rules('identification_no', 'No Identitas', 'required');	
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		// $this->form_validation->set_rules('password', 'Password', 'required');
		// $this->form_validation->set_rules('passconf', 'Pengulangan Password', 'trim|required|matches[password]');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->Account_model->update_from_post();
			
			//redirect('customer/profile');
		}
		
		if ($this->input->post('old_password') != "")
		{
			if ($this->Account_model->check_old_password())
			{
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('passconf', 'Pengulangan Password', 'trim|required|matches[password]');
				if ($this->form_validation->run() == TRUE)
				{
					$result = $this->Account_model->update_new_password();
					if ($result <= 0)
					{
						redirect('tenant/account?err=2');
					}
					else
					{
						redirect('tenant/account?err=0');
					}
				}
			}
			else
			{
				redirect('tenant/account?err=1');
			}
		}
		
		redirect('tenant/account?err=0');
	}
	
	public function profile($id=0)
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
	
	public function reply_feedback()
	{
		$this->load->model('feedback_model');
		$order_detail_id = $this->input->post('order_detail_id');
		
		$feedback = $this->feedback_model->get_from_order_detail_id($order_detail_id);
		$feedback->feedback_reply = $this->input->post('reply_feedback_text');
		$feedback->order_detail_id = $this->input->post('order_detail_id');
		
		$result = $feedback->reply_feedback();
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function bayar_hot_item_dummy()
	{
		$hot_item_id = $this->input->post('hot_item_id');
		
		$this->load->model('tenant_bill_model');
		$this->tenant_bill_model->set_paid($hot_item_id);
		
		echo "1";
	}
	
	public function bayar_seo_item_dummy()
	{
		$posted_item_id = $this->input->post('posted_item_id');
		
		$this->load->model('tenant_bill_model');
		$this->tenant_bill_model->set_paid_seo($posted_item_id);
		
		echo "1";
	}
	
}
