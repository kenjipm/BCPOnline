<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Tentang Cyberia";
		$this->load->view('about/about_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function rules()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Aturan Penggunaan";
		$this->load->view('about/rules', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function privacy()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Kebijakan Privasi";
		$this->load->view('about/privacy', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function news()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Berita & Pengumuman";
		$this->load->view('about/news', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function contact()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Hubungi Cyberia";
		$this->load->view('about/contact', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function complain()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Komplain";
		$this->load->view('about/complain', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function terms()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Syarat & Ketentuan";
		$this->load->view('about/terms', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function products()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Produk & Servis";
		$this->load->view('about/products', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function bidding()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Lelang";
		$this->load->view('about/bidding', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function hot_items()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Hot Items";
		$this->load->view('about/hot_items', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function transaction()
	{
		// Load Header
		$data_header['css_list'] = array();
		$data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['title'] = "Transaksi";
		$this->load->view('about/transaction', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
