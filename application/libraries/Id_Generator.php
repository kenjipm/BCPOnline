<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Id_generator {

	public function generate($type, $id, $pfx_rep="")
	{
		return (($pfx_rep=="")?TYPE['initial'][$type]:$pfx_rep) . str_pad($id, TYPE['id_length'][$type], '0', STR_PAD_LEFT);
	}
}

?>