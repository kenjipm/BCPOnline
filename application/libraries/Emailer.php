<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailer {
	
	protected $CI;
	
	public function __construct()
	{
			// Assign the CodeIgniter super-object
			$this->CI =& get_instance();
			$this->CI->load->library('email');
	}
	
	public function send_from_admin($dest, $subject, $content)
	{
		$is_email_sent = false;
		$i = 0;
		while (!$is_email_sent && ($i < count(ADMIN_EMAILS)))
		{
			$this->CI->email->from(ADMIN_EMAILS[$i], 'Admin Cyberku');
			$this->CI->email->to($dest);
			$this->CI->email->subject($subject);
			$this->CI->email->message($content);

			$is_email_sent = $this->CI->email->send();
			
			$i++;
		}
		return $is_email_sent;
	}
}

?>