<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->default_redirect($this->session->type);
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['message'] = "";
		if ($this->input->get('err') !== null)
		{
			$data['message'] = $this->get_error_message($this->input->get('err'));
		}
		$data['return_url'] = $this->input->get('return_url') ?? "";
		$data['model'] = new class{};
		$this->load->view('login_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}

	public function forgot_password()
	{
		$this->default_redirect($this->session->type);
		if ($this->input->method() == "post") $this->forgot_password_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['message'] = "";
		if ($this->input->get('err') !== null)
		{
			$data['message'] = $this->get_error_message($this->input->get('err'));
		}
		$this->load->view('forgot_password_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function validate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$return_url = $this->input->post('return_url');
		
		$this->load->model('Account_model');
		$user = $this->Account_model->get_from_login($email, $password);
		$id = "";
		$child_id = "";
		$account_id = "";
		$profile_pic = "";
		$type = $email; //""; dummy buat bypass kalo mau login type lain
		
		if ($user !== null)
		{
		
			if ($user->is_blocked())
			{
				redirect('login?err=6');
			}
			
			$id = $user->id;
			$child_id = $user->child_id;
			$account_id = $user->account_id;
			$profile_pic = $user->profile_pic;
			$type = $user->type;
		// }
		
		// if ($user !== null)
		// {
			$userdata = array(
				'id' => $id,
				'child_id' => $child_id,
				'account_id' => $account_id,
				'profile_pic' => $profile_pic,
				'type' => $type,
				'cart' => array()
			);
			
			$this->session->set_userdata($userdata);
			
			if ($return_url != "") redirect($return_url);
			
			$this->default_redirect($type);
		}
		
		$this->session->sess_destroy();
		redirect('login?err=1');
	}
	
	public function forgot_password_do()
	{
		$email = $this->input->post('email');
		$phone_number = $this->input->post('phone_number');
		
		$this->load->model('account_model');
		$account = $this->account_model->get_from_forgot_password($email, $phone_number);
		
		if ($account == null) redirect('login/forgot_password?err=2');
		else
		{
			$this->load->library('password_generator');
			$new_password = $this->password_generator->generate();
			
			$this->load->library('email');

			$is_email_sent = false;
			$i = 0;
			while (!$is_email_sent && ($i < count(ADMIN_EMAILS)))
			{
				$this->email->from(ADMIN_EMAILS[$i], 'Admin Cyberia');
				$this->email->to($email);

				$this->email->subject('Permintaan Reset Password');
				$this->email->message("Halo, berdasarkan permintaan atas nama email ini, kami telah mereset password akunmu pada situs Cyberku menjadi " . $new_password . ". Silakan login kembali menggunakan password baru.");

				$is_email_sent = $this->email->send();
				
				$i++;
			}
			
			if ($is_email_sent)
			{
				$account->forgot_password($new_password);
				redirect('login?err=8');
			}
			else
			{
				redirect('login/forgot_password?err=7');
			}
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
	
	private function get_error_message($error_code)
	{
		if ($error_code == 1)
		{
			return "Username / Password salah";
		}
		else if ($error_code == 2)
		{
			return "Email / No HP tidak cocok";
		}
		else if ($error_code == 6)
		{
			return "Akun Anda di blokir. Silakan hubungi admin untuk informasi lebih lanjut.";
		}
		else if ($error_code == 7)
		{
			return "Password gagal di reset, silakan coba beberapa saat lagi.";
		}
		else if ($error_code == 8)
		{
			return "Password telah di reset, silakan cek email.";
		}
		else
		{
			return "Unknown Error";
		}
	}
	
	public function default_redirect($type)
	{
		if ($type == TYPE['name']['CUSTOMER'])
		{
			redirect('');
		}
		else if ($type == TYPE['name']['TENANT'])
		{
			redirect('tenant');
		}
		else if ($type == TYPE['name']['ADMIN'])
		{
			redirect('');
		}
		else if ($type == TYPE['name']['DELIVERER'])
		{
			redirect('order/order_list');
		}
	}
}
