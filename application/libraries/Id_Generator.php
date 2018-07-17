<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id_generator {

	public function generate($type, $id)
	{
		return TYPE['initial'][$type] . str_pad($id, TYPE['id_length'][$type], '0', STR_PAD_LEFT);
	}
	
	public function generate_session($length)
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