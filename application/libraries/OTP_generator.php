<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OTP_Generator {
	
	public function generate($length=6)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters_length = strlen($characters);
		
		$result = '';
		for ($i = 0; $i < $length; $i++) {
			$result .= $characters[rand(0, $characters_length - 1)];
		}
		
		return $result;
	}
}

?>