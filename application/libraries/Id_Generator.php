<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id_Generator {

	const INITIAL = array(
		"CUSTOMER" => "CUS",
		"TENANT" => "TNT",
		"DELIVERER" => "DLV",
		"ADMIN" => "ADM"
	);

	const ID_LENGTH = array(
		"CUSTOMER" => 8,
		"TENANT" => 5,
		"DELIVERER" => 5,
		"ADMIN" => 5
	);

	public function generate($type, $id)
	{
		return $this::INITIAL[$type] . str_pad($id, $this::ID_LENGTH[$type], '0', STR_PAD_LEFT);
	}
}

?>