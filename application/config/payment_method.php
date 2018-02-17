<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['payment_methods'] = array('COD', 'KLIKBCA', 'BNI', 'DOKU');

$config['no_wait_payment_methods'] = array('COD');

$config['order_payment_methods'] = array('DOKU');
$config['repair_payment_methods'] = array('DOKU');

$config['COD'] = array(
	'name'				=> 'COD',
	'description'		=> 'Cash on Delivery',
	'long_description'	=> 'Pembayaran dilakukan saat kurir tiba di tujuan',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

$config['KLIKBCA'] = array(
	'name'				=> 'KLIKBCA',
	'description'		=> 'KlikBCA',
	'long_description'	=> 'Pembayaran dilakukan melalui www.klikbca.com',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

$config['BNI'] = array(
	'name'				=> 'BNI',
	'description'		=> 'BNI e-Banking',
	'long_description'	=> 'Pembayaran dilakukan melalui ibank.bni.co.id',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

$config['DOKU'] = array(
	'name'				=> 'DOKU',
	'description'		=> 'Doku Wallet',
	'long_description'	=> 'Pembayaran dilakukan melalui Doku Wallet',
	'billing_api_url'	=> '',
	'status_api_url'	=> '',
);

?>