<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_Generator {
	
	public function generate($length=12)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$characters_length = strlen($characters);
		
		$result = '';
		for ($i = 0; $i < $length; $i++) {
			$result .= $characters[rand(0, $characters_length - 1)];
		}
		
		return $result;
	}
}

?>