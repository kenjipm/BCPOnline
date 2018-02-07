<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['top_menu_customer'] = array(
	'left' => array(
		'FOLLOWED_TENANT' => array(
			'text'	=> "Tenant",
			'url'	=> "customer/followed_tenant",
			),
		'FAVORITE_ITEM' => array(
			'text'	=> "Favorit",
			'url'	=> "customer/favorite_item",
			),
		'REPAIR' => array(
			'text'	=> "Input OTP",
			'url'	=> "order/order_list",
			),
		'REWARD' => array(
			'text'	=> "Reward",
			'url'	=> "reward",
			),
		),
	'right' => array(
		'FOLLOWED_TENANT' => array(
			'text'	=> "Cart",
			'url'	=> "customer/cart",
			),
		'BILLING' => array(
			'text'	=> "Billing",
			'url'	=> "billing",
			),
		// 'ORDER_LIST' => array(
			// 'text'	=> "Orders",
			// 'url'	=> "customer/order_list",
			// ),
		'INBOX' => array(
			'text'	=> "Inbox",
			'url'	=> "message",
			),
		'DSIPUTE' => array(
			'text'	=> "Dispute",
			'url'	=> "dispute",
			),
		'PROFILE' => array(
			'text'	=> "Profile",
			'url'	=> "customer/profile",
			),
		),
	);

$config['top_menu_tenant'] = array(
	'left' => array(
		'ORDER' => array(
			'text'	=> "Input OTP",
			'url'	=> "order/order_list",
			),
		),
	'right' => array(
		'INBOX' => array(
			'text'	=> "Inbox",
			'url'	=> "message",
			),
		'PROFILE' => array(
			'text'	=> "Profile",
			'url'	=> "",
			),
		),
	);

$config['top_menu_deliverer'] = array(
	'left' => array(
		),
	'right' => array(
		'PROFILE' => array(
			'text'	=> "Profile",
			'url'	=> "",
			),
		),
	);

$config['top_menu_admin'] = array(
	'left' => array(
		'VOUCHER' => array(
			'text'	=> "Voucher",
			'url'	=> "voucher/voucher_list",
			),
		'REWARD' => array(
			'text'	=> "Reward",
			'url'	=> "reward/reward_list",
			),
		'BIDDING' => array(
			'text'	=> "Bidding",
			'url'	=> "bidding/bidding_list",
			),
		),
	'right' => array(
		'ORDER' => array(
			'text'	=> "Kirim Barang",
			'url'	=> "order/order_list",
			),
		'PAY_DEBT' => array(
			'text'	=> "Tenant",
			'url'	=> "admin/tenant_to_pay_list",
			),
		'ACCOUNT' => array(
			'text'	=> "Account",
			'url'	=> "account/account_list",
			),
		'BILLING' => array(
			'text'	=> "Billing",
			'url'	=> "billing",
			),
		'DISPUTE' => array(
			'text'	=> "Dispute",
			'url'	=> "dispute",
			),
		),
	);

?>