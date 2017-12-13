<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id_Generator {

	public function generate($type, $id)
	{
		return TYPE['initial'][$type] . str_pad($id, TYPE['id_length'][$type], '0', STR_PAD_LEFT);
	}
}

?>