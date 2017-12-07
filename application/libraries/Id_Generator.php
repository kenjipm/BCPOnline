<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id_Generator {

	// const INITIAL = array(
		// "CUSTOMER" => "CUS",
		// "TENANT" => "TNT",
		// "DELIVERER" => "DLV",
		// "ADMIN" => "ADM"
	// );

	// const ID_LENGTH = array(
		// "CUSTOMER" => 8,
		// "TENANT" => 5,
		// "DELIVERER" => 5,
		// "ADMIN" => 5
	// );

	public function generate($type, $id)
	{
		return TYPE[$type]['initial'] . str_pad($id, TYPE[$type]['id_length'], '0', STR_PAD_LEFT);
	}
}

?>