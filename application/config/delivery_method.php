<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['delivery_methods'] = array('CYBERKU', 'JNE', 'TIKI', 'POS');

$config['no_tracking_delivery_methods'] = array('cyberku');
$config['no_payment_delivery_methods'] = array('cyberku');

$config['order_delivery_methods'] = array('cyberku', 'jne', 'tiki', 'pos');
$config['repair_delivery_methods'] = array('cyberku');

$config['store_city_id'] = 55;

$config['ro_api_key'] = 'faa6d0498cfb47fe98d42a61023bfc4d';
$ro_api_key = 'faa6d0498cfb47fe98d42a61023bfc4d';
$config['ro_province_api_url'] = 'https://api.rajaongkir.com/starter/province?key='.$ro_api_key;
// parameters:
	// province=[province_id]
$config['ro_city_api_url'] = 'https://api.rajaongkir.com/starter/city?key='.$ro_api_key;
// parameters:
	// origin=[city_id]
	// destination=[city_id]
	// weight=[berat(gr)]
	// courier=[courier_ro_api_code]
$config['ro_fee_from_store_api_url'] = 'https://api.rajaongkir.com/starter/cost';//?key='.$ro_api_key;//.'&origin='.$store_city_id; 
$config['ro_fee_to_store_api_url'] = 'https://api.rajaongkir.com/starter/cost?key='.$ro_api_key;//.'&destination='.$store_city_id; 

$config['cyberku'] = array(
	'name'				=> 'cyberku',
	'description'		=> 'COD',
	'long_description'	=> '',
	'ro_api_code'		=> 'cyberku',
	'status_api_url'	=> '',
);

$config['jne'] = array(
	'name'				=> 'jne',
	'description'		=> 'JNE',
	'long_description'	=> '',
	'ro_api_code'		=> 'jne',
	'status_api_url'	=> '',
);

$config['tiki'] = array(
	'name'				=> 'tiki',
	'description'		=> 'TIKI',
	'long_description'	=> '',
	'ro_api_code'		=> 'tiki',
	'status_api_url'	=> '',
);

$config['pos'] = array(
	'name'				=> 'pos',
	'description'		=> 'POS INDONESIA',
	'long_description'	=> '',
	'ro_api_code'		=> 'pos',
	'status_api_url'	=> '',
);

$config['GOJEK'] = array(
	'name'				=> 'GOJEK',
	'description'		=> 'Go-Jek',
	'long_description'	=> '',
	'ro_api_code'		=> '',
	'status_api_url'	=> '',
);

?>