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
		'FAVORITE_ITEM' => array(
			'text'	=> "Billing",
			'url'	=> "billing",
			),
		'INBOX' => array(
			'text'	=> "Inbox",
			'url'	=> "message",
			),
		'PROFILE' => array(
			'text'	=> "Profile",
			'url'	=> "customer/profile",
			),
		),
	);

$config['top_menu_tenant'] = array(
	'left' => array(
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