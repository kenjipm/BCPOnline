<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['delivery_methods'] = array('CYBERIA', 'JNE', 'TIKI', 'GOJEK');

$config['no_tracking_delivery_methods'] = array('CYBERIA');

$config['order_delivery_methods'] = array('JNE', 'TIKI', 'GOJEK');
$config['repair_delivery_methods'] = array('CYBERIA', 'JNE', 'TIKI', 'GOJEK');

$config['CYBERIA'] = array(
	'name'				=> 'CYBERIA',
	'description'		=> 'Cyberia Delivery',
	'long_description'	=> '',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

$config['JNE'] = array(
	'name'				=> 'JNE',
	'description'		=> 'JNE',
	'long_description'	=> '',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

$config['TIKI'] = array(
	'name'				=> 'TIKI',
	'description'		=> 'TIKI',
	'long_description'	=> '',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

$config['GOJEK'] = array(
	'name'				=> 'GOJEK',
	'description'		=> 'Go-Jek',
	'long_description'	=> '',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

?>