<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['payment_methods'] = array('COD', 'CREDITCARD', 'MANDIRI_VA', 'DOKU', 'MANDIRI_CLICKPAY');

$config['no_wait_payment_methods'] = array('COD');

$config['mall_id'] = "6075";
$config['shared_key'] = "xgw322WPGb5B";
$config['idr_currency_code'] = "360";
$config['payment_request_api_url'] = "https://staging.doku.com/Suite/Receive";
$config['check_status_api_url'] = "https://staging.doku.com/Suite/CheckStatus";

$config['order_payment_methods'] = array('CREDITCARD', 'MANDIRI_VA', 'DOKU', 'MANDIRI_CLICKPAY');
$config['repair_payment_methods'] = array('CREDITCARD', 'MANDIRI_VA', 'DOKU', 'MANDIRI_CLICKPAY');

$config['channel_codes'] = array(
	'15'	=> 'CREDITCARD',
	'41'	=> 'MANDIRI_VA',
	'04'	=> 'DOKU',
	'02'	=> 'MANDIRI_CLICKPAY',
);

$config['COD'] = array(
	'name'				=> 'COD',
	'description'		=> 'Cash on Delivery',
	'long_description'	=> 'Pembayaran dilakukan saat kurir tiba di tujuan',
	'doku_channel_code'	=> '',
	'status_api_url'	=> '',
);

$config[''] = array(
	'name'				=> '',
	'description'		=> '-',
	'long_description'	=> '',
	'doku_channel_code'	=> '',
	'status_api_url'	=> '',
);

$config['CREDITCARD'] = array(
	'name'				=> 'CREDITCARD',
	'description'		=> 'Kartu Kredit',
	'long_description'	=> 'Pembayaran dilakukan dengan menggunakan kartu kredit',
	'doku_channel_code'	=> '15',
	'status_api_url'	=> '',
);

$config['MANDIRI_VA'] = array(
	'name'				=> 'MANDIRI_VA',
	'description'		=> 'Mandiri VA',
	'long_description'	=> 'Pembayaran dilakukan melalui transfer ke rekening virtual account Bank Mandiri',
	'doku_channel_code'	=> '41',
	'status_api_url'	=> '',
);

$config['DOKU'] = array(
	'name'				=> 'DOKU',
	'description'		=> 'Doku Wallet',
	'long_description'	=> 'Pembayaran dilakukan melalui Doku Wallet',
	'doku_channel_code'	=> '04',
	'status_api_url'	=> '',
);

$config['MANDIRI_CLICKPAY'] = array(
	'name'				=> 'MANDIRI_CLICKPAY',
	'description'		=> 'Mandiri Clickpay',
	'long_description'	=> 'Pembayaran dilakukan melalui Clickpay Bank Mandiri',
	'doku_channel_code'	=> '02',
	'status_api_url'	=> '',
);

?>